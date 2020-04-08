<?php

namespace NFePHP\NFSeFiorilli\Common;

/**
 * Auxiar Tools Class for comunications with provider Fiorilli
 *
 * @category  library
 * @package   NFePHP\NFSeFiorilli
 * @copyright NFePHP Copyright (c) 2020
 * @license   http://www.gnu.org/licenses/lgpl.txt LGPLv3+
 * @license   https://opensource.org/licenses/MIT MIT
 * @license   http://www.gnu.org/licenses/gpl.txt GPLv3+
 * @author    Roberto L. Machado <linux.rlm at gmail dot com>
 * @link      http://github.com/nfephp-org/sped-nfse-fiorilli for the canonical source repository
 */
use NFePHP\Common\Certificate;
use NFePHP\Common\Strings;
use NFePHP\Common\DOMImproved as Dom;
use NFePHP\NFSeFiorilli\RpsInterface;
use NFePHP\NFSeFiorilli\Common\Signer;
use NFePHP\NFSeFiorilli\Common\Soap\SoapInterface;
use NFePHP\NFSeFiorilli\Common\Soap\SoapCurl;

class Tools
{

    public $lastRequest;
    protected $config;
    protected $remetente;
    protected $certificate;
    protected $wsobj;
    protected $soap;
    protected $environment;
    protected $cpfcnpjtag;
    protected $imtag;
    protected $prestador;
    protected $url;
    protected $xsdpath;

    /**
     * Constructor
     * @param string $config
     * @param Certificate $cert
     */
    public function __construct($config, Certificate $cert)
    {
        $this->config = json_decode($config);
        $this->certificate = $cert;
        $this->wsobj = $this->loadWsobj($this->config->cmun);
        $this->environment = 'homologacao';
        $this->url = $this->wsobj->homologacao;
        if ($this->config->tpamb === 1) {
            $this->environment = 'producao';
            $this->url = $this->wsobj->producao;
        }
        $this->buildPrestador();
    }
    
    protected function buildPrestador()
    {
        if (!empty($this->config->cpf)) {
            $this->cpfcnpjtag = "<CpfCnpj><Cpf>{$this->config->cpf}</Cpf></CpfCnpj>";
        } elseif (!empty($this->config->cnpj)) {
            $this->cpfcnpjtag = "<CpfCnpj><Cnpj>{$this->config->cnpj}</Cnpj></CpfCnpj>";
        }
        $this->imtag = "<InscricaoMunicipal>{$this->config->im}</InscricaoMunicipal>";
        $this->prestador = "<Prestador>"
            . $this->cpfcnpjtag
            . $this->imtag
            . "</Prestador>";
    }

    /**
     * load webservice parameters
     * @param string $cmun
     * @return object
     * @throws \Exception
     */
    protected function loadWsobj($cmun)
    {
        $path = realpath(__DIR__ . "/../../storage/urls_webservices.json");
        $urls = json_decode(file_get_contents($path), true);
        if (empty($urls[$cmun])) {
            throw new \Exception("Não localizado parâmetros para esse municipio.");
        }
        return (object) $urls[$cmun];
    }

    /**
     * SOAP communication dependency injection
     * @param SoapInterface $soap
     */
    public function loadSoapClass(SoapInterface $soap)
    {
        $this->soap = $soap;
    }

    /**
     * Sign XML passing in content
     * @param string $content
     * @param string $tagname
     * @param string $mark
     * @return string XML signed
     */
    public function sign($content, $tagname, $mark)
    {
        $xml = Signer::sign(
            $this->certificate,
            $content,
            $tagname,
            $mark
        );
        return $xml;
    }

    /**
     * Send message to webservice
     * @param string $message
     * @param string $operation
     * @return string XML response from webservice
     */
    public function send($message, $operation)
    {
        if (empty($this->url)) {
            throw new \Exception("Não está registrada a URL para o ambiente "
            . "de {$this->environment} desse municipio.");
        }
        $request = $this->createSoapRequest($message, $operation);
        $this->lastRequest = $request;

        if (empty($this->soap)) {
            $this->soap = new SoapCurl($this->certificate);
        }
        $msgSize = strlen($request);
        $action = "{$this->wsobj->soapns}$operation";
        $parameters = [
            //"Accept-Encoding: gzip,deflate",
            "Content-Type: text/xml;charset=UTF-8",
            "SOAPAction: {$action}",
            "Content-length: $msgSize"
        ];

        $response = (string) $this->soap->send(
            $operation,
            $this->url,
            $action,
            $request,
            $parameters
        );
        return $this->extractContentFromResponse($response, $operation);
    }

    /**
     * Extract xml response from CDATA outputXML tag
     * @param string $response Return from webservice
     * @return string XML extracted from response
     */
    protected function extractContentFromResponse($response, $operation)
    {
        //verifica se está em modo FAKE
        if (substr($response, 0, 1) == '{') {
            return $response;
        }
        $exceptOperations = ['ConsultaSituacaoLote', 'TesteEnvioLoteRPSAsync'];
        if (in_array($operation, $exceptOperations)) {
            $response = str_replace('&lt;?xml version="1.0" encoding="UTF-8"?&gt;', '', $response);
            $response = str_replace(['&lt;', '&gt;'], ['<', '>'], $response);
        }
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        $dom->loadXML($response);
        if (!empty($dom->getElementsByTagName('RetornoXML')->item(0))) {
            $node = $dom->getElementsByTagName('RetornoXML')->item(0);
            if (in_array($operation, $exceptOperations)) {
                return $response;
            }
            return $node->textContent;
        }
        return $response;
    }

    /**
     * Build SOAP request
     * @param string $message
     * @param string $operation
     * @return string XML SOAP request
     */
    protected function createSoapRequest($message, $operation)
    {
        $env = "<soapenv:Envelope "
            . "xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" "
            . "xmlns:ws=\"{$this->wsobj->soapns}\">"
            . "<soapenv:Header/>"
            . "<soapenv:Body>"
            . "<ws:{$operation}>"
            . "{$message}"
            . "<username>{$this->config->login}</username>"
            . "<password>{$this->config->senha}</password>"
            . "</ws:{$operation}>"
            . "</soapenv:Body>"
            . "</soapenv:Envelope>";

        return $env;
    }
    
    /**
     *
     * @return string
     */
    protected function numericUuid()
    {
        list($usec, $sec) = explode(" ", microtime());
        $num = round(((float)$usec + (float)$sec)*1000, 0);
        return substr($num, -15);
    }
}

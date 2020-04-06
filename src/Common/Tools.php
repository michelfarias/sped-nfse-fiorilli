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
        if ($this->config->tpamb === 1) {
            $this->environment = 'producao';
        }
        $this->buildRemetenteTag();
    }

    /**
     * Build tag Rementente
     */
    protected function buildRemetenteTag()
    {
        $this->remetente = "<CPFCNPJRemetente>";
        if (!empty($this->config->cnpj)) {
            $this->remetente .= "<CNPJ>{$this->config->cnpj}</CNPJ>";
        } else {
            $this->remetente .= "<CPF>{$this->config->cpf}</CPF>";
        }
        $this->remetente .= "</CPFCNPJRemetente>";
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
     * @param string $mode sincrono ou assincrono
     * @return string XML response from webservice
     */
    public function send($message, $operation, $mode)
    {
        switch ($operation) {
            case 'TesteEnvioLoteRPS':
                $action = "{$this->wsobj->soapns}/ws/testeenvio";
                break;
            case 'EnvioLoteRpsAsync':
                $action = "{$this->wsobj->soapns}/ws/envioLoteRPSAsync";
                break;
            case 'TesteEnvioLoteRpsAsync':
                $action = "{$this->wsobj->soapns}/ws/testeEnvioLoteRPSAsync";
                break;
            default:
                $action = "{$this->wsobj->soapns}/ws/". lcfirst($operation);
        }
        $modo = "{$mode}_homologacao";
        if ($this->environment === 'producao') {
            $modo = "{$mode}_producao";
        }
        $url = $this->wsobj->$modo;
        if (empty($url)) {
            throw new \Exception("Não está registrada a URL para o ambiente "
            . "de {$this->environment} desse municipio.");
        }
        $request = $this->createSoapRequest($message, $operation, $mode);
        $this->lastRequest = $request;

        if (empty($this->soap)) {
            $this->soap = new SoapCurl($this->certificate);
        }
        $msgSize = strlen($request);

        $parameters = [
            "Accept-Encoding: gzip,deflate",
            "Content-Type: application/soap+xml;charset=UTF-8;action=\"{$action}\"",
            "Content-length: $msgSize"
        ];
        if ($mode == 'assincrono') {
            $parameters = [
                "Accept-Encoding: gzip,deflate",
                "Content-Type: application/soap+xml;charset=UTF-8",
                "SOAPAction: \"{$action}\"",
                "Content-length: $msgSize"
            ];
        }
        $response = (string) $this->soap->send(
            $operation,
            $url,
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
     * @param string $mode
     * @return string XML SOAP request
     */
    protected function createSoapRequest($message, $operation, $mode)
    {
        //$operation = str_replace('Async', '', $operation);
        $versionText = "VersaoSchema";
        if ($mode == 'assincrono') {
            $versionText = "versaoSchema";
        }
        //$cdata = htmlspecialchars($message, ENT_NOQUOTES);
        $env = "<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" "
            . "xmlns:nfe=\"{$this->wsobj->soapns}\">"
            . "<soap:Header/>"
            . "<soap:Body>"
            . "<nfe:{$operation}Request>"
            . "<nfe:{$versionText}>{$this->wsobj->version}</nfe:{$versionText}>"
            . "<nfe:MensagemXML></nfe:MensagemXML>"
            . "</nfe:{$operation}Request>"
            . "</soap:Body>"
            . "</soap:Envelope>";

        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = false;
        $dom->preserveWhiteSpace = false;
        $dom->loadXML($env);
        $node = $dom->getElementsByTagName('MensagemXML')->item(0);
        $node->appendChild($dom->createCDATASection($message));
        $env = $dom->saveXML();

        //header("Content-type: text/xml");
        //echo $env;
        //die;
        return $env;
    }
}

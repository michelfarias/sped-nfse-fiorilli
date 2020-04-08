<?php

namespace NFePHP\NFSeFiorilli;

/**
 * Class for comunications with NFSe webserver provder Fiorilli
 *
 * @category  Library
 * @package   NFePHP\NFSeFiorilli
 * @copyright NFePHP Copyright (c) 2020
 * @license   http://www.gnu.org/licenses/lgpl.txt LGPLv3+
 * @license   https://opensource.org/licenses/MIT MIT
 * @license   http://www.gnu.org/licenses/gpl.txt GPLv3+
 * @author    Roberto L. Machado <linux.rlm at gmail dot com>
 * @link      http://github.com/nfephp-org/sped-nfse-fiorilli for the canonical source repository
 */

use NFePHP\NFSeFiorilli\Common\Tools as BaseTools;
use NFePHP\NFSeFiorilli\RpsInterface;
use NFePHP\NFSeFiorilli\Common\Signer;
use NFePHP\Common\Certificate;
use NFePHP\Common\Validator;

class Tools extends BaseTools
{

    /**
     * Constructor
     * @param string $config
     * @param Certificate $cert
     * @return void
     */
    public function __construct($config, Certificate $cert)
    {
        parent::__construct($config, $cert);
        $path = realpath(
            __DIR__ . '/../storage/schemes'
        );
        $this->xsdpath = "{$path}/nfse_v201.xsd";
    }
    
    /**
     * Pedido de Cancelamento de uma NFSe
     * @param int $numero do rps
     * @param int $codigo_cancelamento
     * @return string
     */
    public function cancelarNFSe($numero, $codigo_cancelamento = null)
    {
        $operation = 'cancelarNfse';
        
        $content = "<nfse:CancelarNfseEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . $this->pedidoCancelamento($numero, $codigo_cancelamento)
            . "</nfse:CancelarNfseEnvio>";
        
        $content = Signer::sign(
            $this->certificate,
            $content,
            'InfPedidoCancelamento',
            'Id',
            OPENSSL_ALGO_SHA1,
            [false, false, null, null],
            'Pedido'
        );
        //file_put_contents("/var/www/sped/sped-nfse-fiorilli/local/fixtures/{$operation}_send.xml", $content);
        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }

    /**
     * Consulta o NFSe pelo protocolo
     * @param string $protocolo
     * @return string
     */
    public function consultarLoteRps($protocolo)
    {
        $operation = 'consultarLoteRps';
        
        $content = "<nfse:ConsultarLoteRpsEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . $this->prestador
            . "<nfse:Protocolo>{$protocolo}</nfse:Protocolo>"
            . "</nfse:ConsultarLoteRpsEnvio>";
        
        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }

    /**
     * Consulta NFSes por faixa
     * NOTA: até 50 por página
     *
     * @param int $inicial NFSe inicial
     * @param int $final   NFSe final
     * @param int $pagina
     * @return string
     */
    public function consultarNfsePorFaixa($inicial, $final, $pagina = 1)
    {
        $operation = 'consultarNfsePorFaixa';
        
        $pagina = (int) (!empty($pagina) && is_numeric($pagina)) ? $pagina : 1;
        
        $content = "<nfse:ConsultarNfseFaixaEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . $this->prestador
            . "<nfse:Faixa>"
            . "<nfse:NumeroNfseInicial>{$inicial}</nfse:NumeroNfseInicial>"
            . "<nfse:NumeroNfseFinal>{$final}</nfse:NumeroNfseFinal>"
            . "</nfse:Faixa><nfse:Pagina>{$pagina}</nfse:Pagina>"
            . "</nfse:ConsultarNfseFaixaEnvio>";

        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }
    
    /**
     * Consulta de RPS por numero e série
     * @param int $numero
     * @param string $serie
     * @param int $tipo
     * @return string
     */
    public function consultarNfsePorRps($numero, $serie, $tipo)
    {
        $operation = 'consultarNfsePorRps';
        
        $content = "<nfse:ConsultarNfseRpsEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . "<nfse:IdentificacaoRps>"
            . "<nfse:Numero>{$numero}</nfse:Numero>"
            . "<nfse:Serie>{$serie}</nfse:Serie>"
            . "<nfse:Tipo>{$tipo}</nfse:Tipo>"
            . "</nfse:IdentificacaoRps>"
            . $this->prestador
            . "</nfse:ConsultarNfseRpsEnvio>";
            
        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }
    
    /**
     * Consulta NFSe por serviço prestado
     * @param \stdClass $parameters
     * @return string
     */
    public function consultarNfseServicoPrestado($parameters)
    {
        $operation = 'consultarNfseServicoPrestado';
        $tags = $this->tags($parameters);
        $content = "<nfse:ConsultarNfseServicoPrestadoEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . $this->prestador
            . $tags->numero
            . $tags->periodo
            . $tags->competencia
            . $tags->tomador
            . $tags->intermediario
            . $tags->pagina
            . "</nfse:ConsultarNfseServicoPrestadoEnvio>";
            
        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }
    

    /**
     * Consulta NFSe por serviço tomado
     * @param \stdClass $parameters
     * @return string
     */
    public function consultarNfseServicoTomado($parameters)
    {
        $operation = 'consultarNfseServicoTomado';
        $tags = $this->tags($parameters);
        $content = "<nfse:ConsultarNfseServicoTomadoEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . "<nfse:Consulente>"
            . $this->cpfcnpjtag
            . $this->imtag
            . "</nfse:Consulente>"
            . $tags->numero
            . $tags->periodo
            . $tags->competencia
            . $tags->prestador
            . $tags->tomador
            . $tags->intermediario
            . $tags->pagina
            . "</nfse:ConsultarNfseServicoTomadoEnvio>";
        
        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }
    
    /**
     * Gera uma NFSe em modo SINCRONO
     * @param \NFePHP\NFSeFiorilli\RpsInterface $rps
     * @return string
     */
    public function gerarNfse(RpsInterface $rps)
    {
        $operation = 'gerarNfse';
        if (!$rps->hasConfig()) {
            $rps->config($this->config);
        }
        $tagrps = $rps->render();
        $content = "<nfse:GerarNfseEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . $tagrps
            . "</nfse:GerarNfseEnvio>";
        
        $content = Signer::sign(
            $this->certificate,
            $content,
            'InfDeclaracaoPrestacaoServico',
            'Id',
            OPENSSL_ALGO_SHA1,
            [false, false, null, null],
            'Rps'
        );
        
        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }
    
    /**
     * Enviar RPS em lote ASSINCRONO
     * @param array $rpss
     * @return string
     */
    public function recepcionarLoteRps($rpss)
    {
        $operation = 'recepcionarLoteRps';
        $qtd = count($rpss);
        $tagrps = '';
        foreach ($rpss as $rps) {
            if (!$rps->hasConfig()) {
                $rps->config($this->config);
            }
            $xml = $rps->render();
            
            $xml = Signer::sign(
                $this->certificate,
                $xml,
                'InfDeclaracaoPrestacaoServico',
                'Id',
                OPENSSL_ALGO_SHA1,
                [false, false, null, null],
                'Rps'
            );
            
            $tagrps .= $xml;
        }
        //cria um id unico
        $id = $this->numericUuid();
        
        $content = "<nfse:EnviarLoteRpsEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . "<nfse:LoteRps Id=\"$id\" versao=\"{$this->wsobj->version}\">"
            . "<nfse:NumeroLote>$id</nfse:NumeroLote>"
            . $this->cpfcnpjtag
            . $this->imtag
            . "<nfse:QuantidadeRps>{$qtd}</nfse:QuantidadeRps>"
            . "<nfse:ListaRps>"
            . $tagrps
            . "</nfse:ListaRps>"
            . "</nfse:LoteRps>"
            . "</nfse:EnviarLoteRpsEnvio>";
        
            
        $content = Signer::sign(
            $this->certificate,
            $content,
            'LoteRps',
            'Id',
            OPENSSL_ALGO_SHA1,
            [false, false, null, null],
            'EnviarLoteRpsEnvio'
        );
        
        //file_put_contents("/var/www/sped/sped-nfse-fiorilli/local/fixtures/{$operation}_send.xml", $content);
        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }
    
    /**
     * Enviar RPS em lote SINCRONO
     * @param array $rpss
     * @return string
     */
    public function recepcionarLoteRpsSincrono($rpss)
    {
        $operation = 'recepcionarLoteRpsSincrono';
        $qtd = count($rpss);
        $tagrps = '';
        foreach ($rpss as $rps) {
            if (!$rps->hasConfig()) {
                $rps->config($this->config);
            }
            $xml = $rps->render();
            
            $xml = Signer::sign(
                $this->certificate,
                $xml,
                'InfDeclaracaoPrestacaoServico',
                'Id',
                OPENSSL_ALGO_SHA1,
                [false, false, null, null],
                'Rps'
            );
            
            $tagrps .= $xml;
        }
        //cria um id unico
        $id = $this->numericUuid();
        
        $content = "<nfse:EnviarLoteRpsSincronoEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . "<nfse:LoteRps Id=\"{$id}\" versao=\"{$this->wsobj->version}\">"
            . "<nfse:NumeroLote>{$id}</nfse:NumeroLote>"
            . $this->cpfcnpjtag
            . $this->imtag
            . "<nfse:QuantidadeRps>{$qtd}</nfse:QuantidadeRps>"
            . "<nfse:ListaRps>"
            . $tagrps
            . "</nfse:ListaRps>"
            . "</nfse:LoteRps>"
            . "</nfse:EnviarLoteRpsSincronoEnvio>";
            
        $content = Signer::sign(
            $this->certificate,
            $content,
            'LoteRps',
            'Id',
            OPENSSL_ALGO_SHA1,
            [false, false, null, null],
            'EnviarLoteRpsSincronoEnvio'
        );
        
        //file_put_contents("/var/www/sped/sped-nfse-fiorilli/local/fixtures/{$operation}_send.xml", $content);
        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }
    
    /**
     * Substituir NFse por outro
     * @param int $numero
     * @param int $codigo_cancelamento
     * @param \NFePHP\NFSeFiorilli\RpsInterface $rps
     */
    public function substituirNfse($numero, $codigo_cancelamento, RpsInterface $rps)
    {
        $operation = 'substituirNfse';
        
        //cria um id unico
        $id = $this->numericUuid();
        if (!$rps->hasConfig()) {
            $rps->config($this->config);
        }
        $tagrps = $rps->render();
         
        $content = "<nfse:SubstituirNfseEnvio xmlns:nfse=\"{$this->wsobj->msgns}\">"
            . "<nfse:SubstituicaoNfse Id=\"{$id}\">"
            . $this->pedidoCancelamento($numero, $codigo_cancelamento)
            . $tagrps
            . "</nfse:SubstituicaoNfse>"
            . "</nfse:SubstituirNfseEnvio>";
        
            
        $content = Signer::sign(
            $this->certificate,
            $content,
            'InfPedidoCancelamento',
            'Id',
            OPENSSL_ALGO_SHA1,
            [false, false, null, null],
            'Pedido'
        );
        
        $content = Signer::sign(
            $this->certificate,
            $content,
            'InfDeclaracaoPrestacaoServico',
            'Id',
            OPENSSL_ALGO_SHA1,
            [false, false, null, null],
            'Rps'
        );
        
        $content = Signer::sign(
            $this->certificate,
            $content,
            'SubstituicaoNfse',
            'Id',
            OPENSSL_ALGO_SHA1,
            [false, false, null, null],
            'SubstituirNfseEnvio'
        );
        
        //file_put_contents("/var/www/sped/sped-nfse-fiorilli/local/fixtures/{$operation}_send.xml", $content);
        Validator::isValid($content, $this->xsdpath);
        return $this->send($content, $operation);
    }
    
    /**
     * Monta a tag de Pedido de Cancelamento
     * @param int $numero
     * @param int $codigo_cancelamento
     * @return string
     */
    protected function pedidoCancelamento($numero, $codigo_cancelamento = null)
    {
        $cmun = $this->config->cmun;
        if ($this->environment == 'homologacao') {
            $cmun = '3504800'; //servidor de homologação está nesse municipio
        }
        $codigo_cancelamento = $codigo_cancelamento ?? 2;
        
        return "<nfse:Pedido>"
            . "<nfse:InfPedidoCancelamento Id=\"can{$numero}\">"
            . "<nfse:IdentificacaoNfse>"
            . "<nfse:Numero>{$numero}</nfse:Numero>"
            . $this->cpfcnpjtag
            . $this->imtag
            . "<nfse:CodigoMunicipio>{$cmun}</nfse:CodigoMunicipio>"
            . "</nfse:IdentificacaoNfse>"
            . "<nfse:CodigoCancelamento>{$codigo_cancelamento}</nfse:CodigoCancelamento>"
            . "</nfse:InfPedidoCancelamento>"
            . "</nfse:Pedido>";
    }
    
    /**
     * Monta as tags com os dados passados como parametro
     * @param \stdClass $parameters
     * @return \stdClass
     */
    protected function tags($parameters)
    {
        $resp = new \stdClass();
        $resp->numero = !empty($parameters->numero) ? "<nfse:NumeroNfse>{$parameters->numero}</nfse:NumeroNfse>" : '';
        
        $resp->periodo = '';
        if (!empty($parameters->periodo)) {
            $per = $parameters->periodo;
            $resp->periodo = "<nfse:PeriodoEmissao>"
            . "<nfse:DataInicial>{$per->inicial}</nfse:DataInicial>"
            . "<nfse:DataFinal>{$per->final}</nfse:DataFinal>"
            . "</nfse:PeriodoEmissao>";
        }
        
        $resp->competencia = '';
        if (empty($resp->periodo)) {
            if (!empty($parameters->competencia)) {
                $per = $parameters->competencia;
                $resp->competencia = "<nfse:PeriodoCompetencia>"
                    . "<nfse:DataInicial>{$per->inicial}</nfse:DataInicial>"
                    . "<nfse:DataFinal>{$per->final}</nfse:DataFinal>"
                    . "</nfse:PeriodoCompetencia>";
            }
        }
        
        $resp->tomador = '';
        if (!empty($parameters->tomador)) {
            $tom = $parameters->tomador;
            $resp->tomador = "<nfse:Tomador>";
            if (!empty($tom->cnpj)) {
                $resp->tomador .= "<nfse:CpfCnpj><nfse:Cnpj>{$tom->cnpj}</nfse:Cnpj></nfse:CpfCnpj>";
            } elseif (!empty($tom->cpf)) {
                $resp->tomador .= "<nfse:CpfCnpj><nfse:Cpf>{$tom->cpf}</nfse:Cpf></nfse:CpfCnpj>";
            }
            $resp->tomador .= !empty($tom->im) ? "<nfse:InscricaoMunicipal>{$tom->im}</nfse:InscricaoMunicipal>" : '';
            $resp->tomador .= "</nfse:Tomador>";
        }
        
        $resp->intermediario = '';
        if (!empty($parameters->intermediario)) {
            $int = $parameters->intermediario;
            $resp->intermediario = "<nfse:Intermediario>";
            if (!empty($int->cnpj)) {
                $resp->intermediario .= "<nfse:CpfCnpj><nfse:Cnpj>{$int->cnpj}</nfse:Cnpj></nfse:CpfCnpj>";
            } elseif (!empty($int->cpf)) {
                $resp->intermediario .= "<nfse:CpfCnpj><nfse:Cpf>{$int->cpf}</nfse:Cpf></nfse:CpfCnpj>";
            }
            $resp->intermediario .= !empty($int->im)
                ? "<nfse:InscricaoMunicipal>{$int->im}</nfse:InscricaoMunicipal>"
                : '';
            $resp->intermediario .= "</nfse:Intermediario>";
        }
        
        $resp->prestador = '';
        if (!empty($parameters->prestador)) {
            $pres = $parameters->prestador;
            $resp->prestador = "<nfse:Prestador>";
            if (!empty($pres->cnpj)) {
                $resp->prestador .= "<nfse:CpfCnpj><nfse:Cnpj>{$pres->cnpj}</nfse:Cnpj></nfse:CpfCnpj>";
            } elseif (!empty($pres->cpf)) {
                $resp->prestador .= "<nfse:CpfCnpj><nfse:Cpf>{$pres->cpf}</nfse:Cpf></nfse:CpfCnpj>";
            }
            $resp->prestador .= !empty($pres->im)
                ? "<nfse:InscricaoMunicipal>{$pres->im}</nfse:InscricaoMunicipal>"
                : '';
            $resp->prestador .= "</nfse:Prestador>";
        }
        
        $pagina = (int) (!empty($parameters->pagina) && is_numeric($parameters->pagina)) ? $parameters->pagina : 1;
        $resp->pagina = "<nfse:Pagina>{$pagina}</nfse:Pagina>";
        
        return $resp;
    }
}

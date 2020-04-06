<?php

namespace NFePHP\NFSeFiorilli\Common;

/**
 * Class for RPS XML convertion
 *
 * @category  NFePHP
 * @package   NFePHP\NFSeFiorilli
 * @copyright NFePHP Copyright (c) 2020
 * @license   http://www.gnu.org/licenses/lgpl.txt LGPLv3+
 * @license   https://opensource.org/licenses/MIT MIT
 * @license   http://www.gnu.org/licenses/gpl.txt GPLv3+
 * @author    Roberto L. Machado <linux.rlm at gmail dot com>
 * @link      http://github.com/nfephp-org/sped-nfse-fiorilli for the canonical source repository
 */
use stdClass;
use NFePHP\Common\DOMImproved as Dom;
use NFePHP\Common\Certificate;
use DOMNode;
use DOMElement;

class Factory
{
    /**
     * @var stdClass
     */
    protected $std;
    /**
     * @var Dom
     */
    protected $dom;
    /**
     * @var DOMNode
     */
    protected $rps;
    /**
     * @var \stdClass
     */
    protected $config;
    /**
     * @var Certificate
     */
    protected $certificate;

    /**
     * Constructor
     * @param stdClass $std
     */
    public function __construct(stdClass $std)
    {
        $this->std = $std;

        $this->dom = new Dom('1.0', 'UTF-8');
        $this->dom->preserveWhiteSpace = false;
        $this->dom->formatOutput = false;
        $this->rps = $this->dom->createElement('RPS');
        $att = $this->dom->createAttribute('xmlns');
        $att->value = "";
        $this->rps->appendChild($att);
    }

    /**
     * Add config
     * @param \stdClass $config
     */
    public function addConfig($config)
    {
        $this->config = $config;
    }
    
    public function addCertificate(Certificate $cert)
    {
        $this->certificate = $cert;
    }

    /**
     * Builder, converts sdtClass Rps in XML Rps
     * @return string RPS in XML string format
     */
    public function render()
    {
        if (!empty($this->certificate) && !empty($this->config)) {
            $ass = $this->signstr();
            $this->dom->addChild(
                $this->rps,
                "Assinatura",
                $ass,
                true
            );
        }
        $chave = $this->dom->createElement('ChaveRPS');
        $this->dom->addChild(
            $chave,
            "InscricaoPrestador",
            !empty($this->config->im) ? $this->config->im : null,
            false
        );
        $this->dom->addChild(
            $chave,
            "SerieRPS",
            !empty($this->std->serie) ? $this->std->serie : null,
            false
        );
        $this->dom->addChild(
            $chave,
            "NumeroRPS",
            $this->std->numero,
            true
        );
        $this->rps->appendChild($chave);
        $this->dom->addChild(
            $this->rps,
            "TipoRPS",
            $this->std->tipo,
            true
        );
        $this->dom->addChild(
            $this->rps,
            "DataEmissao",
            $this->std->dataemissao,
            true
        );
        $this->dom->addChild(
            $this->rps,
            "StatusRPS",
            $this->std->status,
            true
        );
        $this->dom->addChild(
            $this->rps,
            "TributacaoRPS",
            $this->std->tributacao,
            true
        );
        $this->dom->addChild(
            $this->rps,
            "ValorServicos",
            $this->std->valorservicos,
            true
        );
        $this->dom->addChild(
            $this->rps,
            "ValorDeducoes",
            $this->std->valordeducoes,
            false
        );
        $this->dom->addChild(
            $this->rps,
            "ValorPIS",
            $this->std->valorpis,
            false
        );
        $this->dom->addChild(
            $this->rps,
            "ValorCOFINS",
            $this->std->valorcofins,
            false
        );
        $this->dom->addChild(
            $this->rps,
            "ValorINSS",
            $this->std->valorinss,
            false
        );
        $this->dom->addChild(
            $this->rps,
            "ValorIR",
            $this->std->valorir,
            false
        );
        $this->dom->addChild(
            $this->rps,
            "ValorCSLL",
            $this->std->valorcsll,
            false
        );
        $this->dom->addChild(
            $this->rps,
            "CodigoServico",
            $this->std->codigoservico,
            true
        );
        $this->dom->addChild(
            $this->rps,
            "AliquotaServicos",
            $this->std->aliquota,
            true
        );
        $this->dom->addChild(
            $this->rps,
            "ISSRetido",
            $this->std->issretido == false ? "false" : "true",
            true
        );
        
        $tom = $this->std->tomador;
        if (!empty($tom->cnpj) || !empty($tom->cpf)) {
            $node = $this->dom->createElement('CPFCNPJTomador');
            if (!empty($tom->cnpj)) {
                $this->dom->addChild(
                    $node,
                    "CNPJ",
                    !empty($tom->cnpj) ? $tom->cnpj : null,
                    false
                );
            } elseif (!empty($tom->cpf)) {
                $this->dom->addChild(
                    $node,
                    "CPF",
                    !empty($tom->cpf) ? $tom->cpf : null,
                    false
                );
            }
            $this->rps->appendChild($node);
        }
        $this->dom->addChild(
            $this->rps,
            "InscricaoMunicipalTomador",
            !empty($tom->im) ? str_pad($tom->im, 8, '0', STR_PAD_LEFT) : null,
            false
        );
        $this->dom->addChild(
            $this->rps,
            "InscricaoEstadualTomador",
            !empty($tom->ie) ? $tom->ie : null,
            false
        );
        $this->dom->addChild(
            $this->rps,
            "RazaoSocialTomador",
            !empty($tom->nome) ? $tom->nome : null,
            false
        );
        $te = $tom->endereco;
        $end = $this->dom->createElement('EnderecoTomador');
        $this->dom->addChild(
            $end,
            "TipoLogradouro",
            !empty($te->tipologradouro) ? $te->tipologradouro : null,
            false
        );
        $this->dom->addChild(
            $end,
            "Logradouro",
            !empty($te->logradouro) ? $te->logradouro : null,
            false
        );
        $this->dom->addChild(
            $end,
            "NumeroEndereco",
            !empty($te->numero) ? $te->numero : null,
            false
        );
        $this->dom->addChild(
            $end,
            "ComplementoEndereco",
            !empty($te->complemento) ? $te->complemento : null,
            false
        );
        $this->dom->addChild(
            $end,
            "Bairro",
            !empty($te->bairro) ? $te->bairro : null,
            false
        );
        $this->dom->addChild(
            $end,
            "Cidade",
            !empty($te->codigoibge) ? $te->codigoibge : null,
            false
        );
        $this->dom->addChild(
            $end,
            "UF",
            !empty($te->uf) ? $te->uf : null,
            false
        );
        $this->dom->addChild(
            $end,
            "CEP",
            !empty($te->cep) ? $te->cep : null,
            false
        );
        $this->rps->appendChild($end);
        $this->dom->addChild(
            $this->rps,
            "EmailTomador",
            !empty($tom->email) ? $tom->email : null,
            false
        );
        
        if (!empty($this->std->intermediario)) {
            $int = $this->std->intermediario;
            if (!empty($int->cnpj) || !empty($int->cpf)) {
                $node = $this->dom->createElement('CPFCNPJIntermediario');
                if (!empty($int->cnpj)) {
                    $this->dom->addChild(
                        $node,
                        "CNPJ",
                        !empty($int->cnpj) ? $int->cnpj : null,
                        false
                    );
                } else {
                    $this->dom->addChild(
                        $node,
                        "CPF",
                        !empty($int->cpf) ? $int->cpf : null,
                        false
                    );
                }
                $this->rps->appendChild($node);
            }
            $this->dom->addChild(
                $this->rps,
                "InscricaoMunicipalIntermediario",
                !empty($int->im) ? $int->im : null,
                false
            );
            $iss = null;
            if (isset($int->issretido)) {
                $iss = ($int->issretido == false) ? "false" : "true";
            }
            $this->dom->addChild(
                $this->rps,
                "ISSRetidoIntermediario",
                $iss,
                false
            );
            $this->dom->addChild(
                $this->rps,
                "EmailIntermediario",
                !empty($int->email) ? $int->email : null,
                false
            );
        }
        
        $this->dom->addChild(
            $this->rps,
            "Discriminacao",
            $this->std->discriminacao,
            true
        );
        
        if (!empty($this->std->construcaocivil)) {
            $this->dom->addChild(
                $this->rps,
                "CodigoCEI",
                $this->std->construcaocivil->codigoobra,
                false
            );
            $this->dom->addChild(
                $this->rps,
                "MatriculaObra",
                $this->std->construcaocivil->matricula,
                false
            );
            $this->dom->addChild(
                $this->rps,
                "MunicipioPrestacao",
                $this->std->construcaocivil->municipioprestacao,
                false
            );
            $this->dom->addChild(
                $this->rps,
                "NumeroEncapsulamento",
                $this->std->construcaocivil->numeroencapsulamento,
                false
            );
        }
        
        $this->dom->addChild(
            $this->rps,
            "ValorTotalRecebido",
            $this->std->valortotalrecebido,
            false
        );
        
        $this->dom->appendChild($this->rps);
        return str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $this->dom->saveXML());
    }

    /**
     * Cria o valor da assinatura do RPS
     * @param Rps $rps
     * @return string
     */
    private function signstr()
    {
        $tomtipodoc = 3;
        $tomdoc = '';
        if (!empty($this->std->tomador->cnpj)) {
            $tomtipodoc = 2;
            $tomdoc = $this->std->tomador->cnpj;
        } elseif (!empty($this->std->tomador->cpf)) {
            $tomtipodoc = 1;
            $tomdoc = $this->std->tomador->cpf;
        }
        $inttipodoc = 3;
        $intdoc = '';
        if (!empty($this->std->intermediario->cnpj)) {
            $inttipodoc = 2;
            $intdoc = $this->std->intermediario->cnpj;
        } elseif (!empty($this->std->intermediario->cpf)) {
            $inttipodoc = 1;
            $intdoc = $this->std->intermediario->cpf;
        }
        $content = str_pad($this->config->im, 8, '0', STR_PAD_LEFT);
        $content .= str_pad($this->std->serie, 5, ' ', STR_PAD_RIGHT);
        $content .= str_pad($this->std->numero, 12, '0', STR_PAD_LEFT);
        $content .= str_replace("-", "", $this->std->dataemissao);
        $content .= $this->std->tributacao;
        $content .= $this->std->status;
        $content .= ($this->std->issretido) ? 'S' : 'N';
        $content .= $this->formatValor($this->std->valorservicos, 2, 15);
        $content .= $this->formatValor($this->std->valordeducoes, 2, 15);
        $content .= str_pad($this->std->codigoservico, 5, '0', STR_PAD_LEFT);
        $content .= $tomtipodoc;
        $content .= str_pad($tomdoc, 14, '0', STR_PAD_LEFT);
        if ($inttipodoc != '3') {
            $content .= $inttipodoc;
            $content .= str_pad($intdoc, 14, '0', STR_PAD_LEFT);
            $content .= ($this->std->intermediario->issretido) ? 'S' : 'N';
        }
        $signature = base64_encode($this->certificate->sign($content, OPENSSL_ALGO_SHA1));
        return $signature;
    }
    
    private function formatValor($value, $dec, $length)
    {
        return str_pad(
            str_replace(['.', ','], '', number_format($value, $dec)),
            $length,
            '0',
            STR_PAD_LEFT
        );
    }
}

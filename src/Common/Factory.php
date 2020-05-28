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
     * Constructor
     * @param stdClass $std
     */
    public function __construct(stdClass $std)
    {
        $this->std = $std;

        $this->dom = new Dom('1.0', 'UTF-8');
        $this->dom->preserveWhiteSpace = false;
        $this->dom->formatOutput = false;
        $this->rps = $this->dom->createElement('Rps');
    }

    /**
     * Add config
     * @param \stdClass $config
     */
    public function addConfig($config)
    {
        $this->config = $config;
    }

    /**
     * Builder, converts sdtClass Rps in XML Rps
     * NOTE: without Prestador Tag
     * @return string RPS in XML string format
     */
    public function render()
    {
        $num = '';
        if (!empty($this->std->identificacaorps->numero)) {
            $num = $this->std->identificacaorps->numero;
        }
        $infRps = $this->dom->createElement('InfDeclaracaoPrestacaoServico');
        $att = $this->dom->createAttribute('Id');
        $att->value = "rps{$num}";
        $infRps->appendChild($att);

        $this->addIdentificacao($infRps);

        $this->dom->addChild(
            $infRps,
            "Competencia",
            $this->std->competencia,
            true
        );

        $this->addServico($infRps);
        $this->addPrestador($infRps);
        $this->addTomador($infRps);
        $this->addIntermediario($infRps);
        $this->addConstrucao($infRps);

        $this->dom->addChild(
            $infRps,
            "RegimeEspecialTributacao",
            $this->std->regimeespecialtributacao ?? null,
            false
        );
        $this->dom->addChild(
            $infRps,
            "OptanteSimplesNacional",
            $this->std->optantesimplesnacional,
            true
        );
        $this->dom->addChild(
            $infRps,
            "IncentivoFiscal",
            $this->std->incentivofiscal,
            true
        );
        $this->rps->appendChild($infRps);
        $this->dom->appendChild($this->rps);
        return str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $this->dom->saveXML());
    }

    /**
     * Includes Identificacao TAG in parent NODE
     * @param DOMNode $parent
     */
    protected function addIdentificacao(&$parent)
    {
        if (empty($this->std->identificacaorps)) {
            return;
        }
        $id = $this->std->identificacaorps;
        $rps = $this->dom->createElement('Rps');
        $node = $this->dom->createElement('IdentificacaoRps');
        $this->dom->addChild(
            $node,
            "Numero",
            $id->numero,
            true
        );
        $this->dom->addChild(
            $node,
            "Serie",
            $id->serie,
            true
        );
        $this->dom->addChild(
            $node,
            "Tipo",
            $id->tipo,
            true
        );
        $rps->appendChild($node);
        $this->dom->addChild(
            $rps,
            "DataEmissao",
            $this->std->dataemissao,
            true
        );
        $this->dom->addChild(
            $rps,
            "Status",
            $this->std->status,
            true
        );
        $parent->appendChild($rps);
    }

    /**
     * Includes prestador
     * @param DOMNode $parent
     * @return void
     */
    protected function addPrestador(&$parent)
    {
        if (!isset($this->config)) {
            return;
        }
        $node = $this->dom->createElement('Prestador');
        $cpfcnpj = $this->dom->createElement('CpfCnpj');
        $this->dom->addChild(
            $cpfcnpj,
            "Cnpj",
            $this->config->cnpj ?? null,
            false
        );
        $this->dom->addChild(
            $cpfcnpj,
            "Cpf",
            $this->config->cpf ?? null,
            false
        );
        $node->appendChild($cpfcnpj);
        $this->dom->addChild(
            $node,
            "InscricaoMunicipal",
            $this->config->im,
            true
        );
        $parent->appendChild($node);
    }

    /**
     * Includes Servico TAG in parent NODE
     * @param DOMNode $parent
     */
    protected function addServico(&$parent)
    {
        $serv = $this->std->servico;
        $val = $this->std->servico->valores;
        $node = $this->dom->createElement('Servico');
        $valnode = $this->dom->createElement('Valores');
        $this->dom->addChild(
            $valnode,
            "ValorServicos",
            number_format($val->valorservicos, 2, '.', ''),
            true
        );
        $this->dom->addChild(
            $valnode,
            "ValorDeducoes",
            isset($val->valordeducoes) ? number_format($val->valordeducoes, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "ValorPis",
            isset($val->valorpis) ? number_format($val->valorpis, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "ValorCofins",
            isset($val->valorcofins) ? number_format($val->valorcofins, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "ValorInss",
            isset($val->valorinss) ? number_format($val->valorinss, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "ValorIr",
            isset($val->valorir) ? number_format($val->valorir, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "ValorCsll",
            isset($val->valorcsll) ? number_format($val->valorcsll, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "OutrasRetencoes",
            isset($val->outrasretencoes) ? number_format($val->outrasretencoes, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "ValorIss",
            isset($val->valoriss) ? number_format($val->valoriss, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "Aliquota",
            isset($val->aliquota) ? $val->aliquota : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "DescontoIncondicionado",
            isset($val->descontoincondicionado) ? number_format($val->descontoincondicionado, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "DescontoCondicionado",
            isset($val->descontocondicionado) ? number_format($val->descontocondicionado, 2, '.', '') : null,
            false
        );
        $node->appendChild($valnode);
        $this->dom->addChild(
            $node,
            "IssRetido",
            $serv->issretido,
            true
        );
        $this->dom->addChild(
            $node,
            "ResponsavelRetencao",
            isset($serv->responsavelretencao) ? $serv->responsavelretencao : null,
            false
        );
        $this->dom->addChild(
            $node,
            "ItemListaServico",
            $serv->itemlistaservico,
            true
        );
        //se for passado um codigo CNAE começando com ZERO irá dar erro de assinatura
        //portanto esse codigo (opcional) não será usado
        $this->dom->addChild(
            $node,
            "CodigoCnae",
            null, //isset($serv->codigocnae) ? $serv->codigocnae : null,
            false
        );
        $this->dom->addChild(
            $node,
            "CodigoTributacaoMunicipio",
            $serv->codigotributacaomunicipio ?? null,
            false
        );
        $this->dom->addChild(
            $node,
            "Discriminacao",
            $serv->discriminacao,
            true
        );
        $this->dom->addChild(
            $node,
            "CodigoMunicipio",
            $serv->codigomunicipio,
            true
        );
        $this->dom->addChild(
            $node,
            "CodigoPais",
            $serv->codigopais ?? null,
            false
        );
        $this->dom->addChild(
            $node,
            "ExigibilidadeISS",
            $serv->exigibilidadeiss,
            true
        );
        $this->dom->addChild(
            $node,
            "MunicipioIncidencia",
            $serv->municipioincidencia ?? null,
            false
        );
        $this->dom->addChild(
            $node,
            "NumeroProcesso",
            $serv->numeroprocesso ?? null,
            false
        );
        $parent->appendChild($node);
    }

    /**
     * Includes Tomador TAG in parent NODE
     * @param DOMNode $parent
     */
    protected function addTomador(&$parent)
    {
        if (!isset($this->std->tomador)) {
            return;
        }
        $tom = $this->std->tomador;


        $node = $this->dom->createElement('Tomador');
        $ide = $this->dom->createElement('IdentificacaoTomador');
        $cpfcnpj = $this->dom->createElement('CpfCnpj');
        if (isset($tom->cnpj)) {
            $this->dom->addChild(
                $cpfcnpj,
                "Cnpj",
                $tom->cnpj,
                true
            );
        } else {
            $this->dom->addChild(
                $cpfcnpj,
                "Cpf",
                $tom->cpf,
                true
            );
        }
        $ide->appendChild($cpfcnpj);
        $this->dom->addChild(
            $ide,
            "InscricaoMunicipal",
            $tom->inscricaomunicipal ?? null,
            false
        );
        $node->appendChild($ide);
        $this->dom->addChild(
            $node,
            "RazaoSocial",
            $tom->razaosocial,
            true
        );
        if (!empty($this->std->tomador->endereco)) {
            $end = $this->std->tomador->endereco;
            $endereco = $this->dom->createElement('Endereco');
            $this->dom->addChild(
                $endereco,
                "Endereco",
                $end->endereco,
                true
            );
            $this->dom->addChild(
                $endereco,
                "Numero",
                $end->numero,
                true
            );
            $this->dom->addChild(
                $endereco,
                "Complemento",
                $end->complemento ?? null,
                false
            );
            $this->dom->addChild(
                $endereco,
                "Bairro",
                $end->bairro,
                true
            );
            $this->dom->addChild(
                $endereco,
                "CodigoMunicipio",
                $end->codigomunicipio,
                true
            );
            $this->dom->addChild(
                $endereco,
                "Uf",
                $end->uf,
                true
            );
            $this->dom->addChild(
                $endereco,
                "CodigoPais",
                $end->codigopais ?? null,
                false
            );
            $this->dom->addChild(
                $endereco,
                "Cep",
                $end->cep,
                true
            );
            $node->appendChild($endereco);
        }
        if (!empty($tom->telefone) || !empty($tom->email)) {
            $contato = $this->dom->createElement('Contato');
            $this->dom->addChild(
                $contato,
                "Telefone",
                $tom->telefone ?? null,
                false
            );
            $this->dom->addChild(
                $contato,
                "Email",
                $tom->email ?? null,
                false
            );
            $node->appendChild($contato);
        }
        $parent->appendChild($node);
    }

    /**
     * Includes Intermediario TAG in parent NODE
     * @param DOMNode $parent
     */
    protected function addIntermediario(&$parent)
    {
        if (!isset($this->std->intermediarioservico)) {
            return;
        }
        $int = $this->std->intermediarioservico;
        $node = $this->dom->createElement('Intermediario');
        $ide = $this->dom->createElement('IdentificacaoIntermediario');
        $cpfcnpj = $this->dom->createElement('CpfCnpj');
        if (isset($int->cnpj)) {
            $this->dom->addChild(
                $cpfcnpj,
                "Cnpj",
                $int->cnpj,
                true
            );
        } else {
            $this->dom->addChild(
                $cpfcnpj,
                "Cpf",
                $int->cpf,
                true
            );
        }
        $ide->appendChild($cpfcnpj);
        $this->dom->addChild(
            $ide,
            "InscricaoMunicipal",
            $int->inscricaomunicipal ?? null,
            false
        );
        $node->appendChild($ide);
        $this->dom->addChild(
            $node,
            "RazaoSocial",
            $int->razaosocial,
            true
        );

        $parent->appendChild($node);
    }

    /**
     * Includes Construcao TAG in parent NODE
     * @param DOMNode $parent
     */
    protected function addConstrucao(&$parent)
    {
        if (!isset($this->std->construcaocivil)) {
            return;
        }
        $obra = $this->std->construcaocivil;
        $node = $this->dom->createElement('ConstrucaoCivil');
        $this->dom->addChild(
            $node,
            "CodigoObra",
            $obra->codigoobra ?? null,
            false
        );
        $this->dom->addChild(
            $node,
            "Art",
            $obra->art,
            true
        );
        $parent->appendChild($node);
    }
}

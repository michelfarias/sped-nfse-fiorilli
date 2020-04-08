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
        $this->rps = $this->dom->createElementNS('http://www.abrasf.org.br/nfse.xsd', 'nfse:Rps');
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
        $infRps = $this->dom->createElement('nfse:InfDeclaracaoPrestacaoServico');
        $att = $this->dom->createAttribute('Id');
        $att->value = "rps{$num}";
        $infRps->appendChild($att);

        $this->addIdentificacao($infRps);

        $this->dom->addChild(
            $infRps,
            "nfse:Competencia",
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
            "nfse:RegimeEspecialTributacao",
            $this->std->regimeespecialtributacao,
            true
        );
        $this->dom->addChild(
            $infRps,
            "nfse:OptanteSimplesNacional",
            $this->std->optantesimplesnacional,
            true
        );
        $this->dom->addChild(
            $infRps,
            "nfse:IncentivoFiscal",
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
        $rps = $this->dom->createElement('nfse:Rps');
        $node = $this->dom->createElement('nfse:IdentificacaoRps');
        $this->dom->addChild(
            $node,
            "nfse:Numero",
            $id->numero,
            true
        );
        $this->dom->addChild(
            $node,
            "nfse:Serie",
            $id->serie,
            true
        );
        $this->dom->addChild(
            $node,
            "nfse:Tipo",
            $id->tipo,
            true
        );
        $rps->appendChild($node);
        $this->dom->addChild(
            $rps,
            "nfse:DataEmissao",
            $this->std->dataemissao,
            true
        );
        $this->dom->addChild(
            $rps,
            "nfse:Status",
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
        $node = $this->dom->createElement('nfse:Prestador');
        $cpfcnpj = $this->dom->createElement('nfse:CpfCnpj');
        $this->dom->addChild(
            $cpfcnpj,
            "nfse:Cnpj",
            !empty($this->config->cnpj) ? $this->config->cnpj : null,
            false
        );
        $this->dom->addChild(
            $cpfcnpj,
            "nfse:Cpf",
            !empty($this->config->cpf) ? $this->config->cpf : null,
            false
        );
        $node->appendChild($cpfcnpj);
        $this->dom->addChild(
            $node,
            "nfse:InscricaoMunicipal",
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
        $node = $this->dom->createElement('nfse:Servico');
        $valnode = $this->dom->createElement('nfse:Valores');
        $this->dom->addChild(
            $valnode,
            "nfse:ValorServicos",
            number_format($val->valorservicos, 2, '.', ''),
            true
        );
        $this->dom->addChild(
            $valnode,
            "nfse:ValorDeducoes",
            isset($val->valordeducoes) ? number_format($val->valordeducoes, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:ValorPis",
            isset($val->valorpis) ? number_format($val->valorpis, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:ValorCofins",
            isset($val->valorcofins) ? number_format($val->valorcofins, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:ValorInss",
            isset($val->valorinss) ? number_format($val->valorinss, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:ValorIr",
            isset($val->valorir) ? number_format($val->valorir, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:ValorCsll",
            isset($val->valorcsll) ? number_format($val->valorcsll, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:OutrasRetencoes",
            isset($val->outrasretencoes) ? number_format($val->outrasretencoes, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:ValorIss",
            isset($val->valoriss) ? number_format($val->valoriss, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:Aliquota",
            isset($val->aliquota) ? $val->aliquota : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:DescontoIncondicionado",
            isset($val->descontoincondicionado) ? number_format($val->descontoincondicionado, 2, '.', '') : null,
            false
        );
        $this->dom->addChild(
            $valnode,
            "nfse:DescontoCondicionado",
            isset($val->descontocondicionado) ? number_format($val->descontocondicionado, 2, '.', '') : null,
            false
        );
        $node->appendChild($valnode);
        $this->dom->addChild(
            $node,
            "nfse:IssRetido",
            $serv->issretido,
            true
        );
        $this->dom->addChild(
            $node,
            "nfse:ResponsavelRetencao",
            isset($serv->responsavelretencao) ? $serv->responsavelretencao : null,
            false
        );
        $this->dom->addChild(
            $node,
            "nfse:ItemListaServico",
            $serv->itemlistaservico,
            true
        );
        $this->dom->addChild(
            $node,
            "nfse:CodigoCnae",
            isset($serv->codigocnae) ? $serv->codigocnae : null,
            false
        );
        $this->dom->addChild(
            $node,
            "nfse:CodigoTributacaoMunicipio",
            isset($serv->codigotributacaomunicipio) ? $serv->codigotributacaomunicipio : null,
            false
        );
        $this->dom->addChild(
            $node,
            "nfse:Discriminacao",
            $serv->discriminacao,
            true
        );
        $this->dom->addChild(
            $node,
            "nfse:CodigoMunicipio",
            $serv->codigomunicipio,
            true
        );
        $this->dom->addChild(
            $node,
            "nfse:CodigoPais",
            isset($serv->codigopais) ? $serv->codigopais : null,
            false
        );
        $this->dom->addChild(
            $node,
            "nfse:ExigibilidadeISS",
            $serv->exigibilidadeiss,
            true
        );
        $this->dom->addChild(
            $node,
            "nfse:MunicipioIncidencia",
            isset($serv->municipioincidencia) ? $serv->municipioincidencia : null,
            false
        );
        $this->dom->addChild(
            $node,
            "nfse:NumeroProcesso",
            isset($serv->numeroprocesso) ? $serv->numeroprocesso : null,
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


        $node = $this->dom->createElement('nfse:Tomador');
        $ide = $this->dom->createElement('nfse:IdentificacaoTomador');
        $cpfcnpj = $this->dom->createElement('nfse:CpfCnpj');
        if (isset($tom->cnpj)) {
            $this->dom->addChild(
                $cpfcnpj,
                "nfse:Cnpj",
                $tom->cnpj,
                true
            );
        } else {
            $this->dom->addChild(
                $cpfcnpj,
                "nfse:Cpf",
                $tom->cpf,
                true
            );
        }
        $ide->appendChild($cpfcnpj);
        $this->dom->addChild(
            $ide,
            "nfse:InscricaoMunicipal",
            isset($tom->inscricaomunicipal) ? $tom->inscricaomunicipal : null,
            false
        );
        $node->appendChild($ide);
        $this->dom->addChild(
            $node,
            "nfse:RazaoSocial",
            $tom->razaosocial,
            true
        );
        if (!empty($this->std->tomador->endereco)) {
            $end = $this->std->tomador->endereco;
            $endereco = $this->dom->createElement('nfse:Endereco');
            $this->dom->addChild(
                $endereco,
                "nfse:Endereco",
                $end->endereco,
                true
            );
            $this->dom->addChild(
                $endereco,
                "nfse:Numero",
                $end->numero,
                true
            );
            $this->dom->addChild(
                $endereco,
                "nfse:Complemento",
                isset($end->complemento) ? $end->complemento : null,
                false
            );
            $this->dom->addChild(
                $endereco,
                "nfse:Bairro",
                $end->bairro,
                true
            );
            $this->dom->addChild(
                $endereco,
                "nfse:CodigoMunicipio",
                $end->codigomunicipio,
                true
            );
            $this->dom->addChild(
                $endereco,
                "nfse:Uf",
                $end->uf,
                true
            );
            $this->dom->addChild(
                $endereco,
                "nfse:CodigoPais",
                isset($end->codigopais) ? $end->codigopais : null,
                false
            );
            $this->dom->addChild(
                $endereco,
                "nfse:Cep",
                $end->cep,
                true
            );
            $node->appendChild($endereco);
        }
        if (!empty($tom->telefone) || !empty($tom->email)) {
            $contato = $this->dom->createElement('nfse:Contato');
            $this->dom->addChild(
                $contato,
                "nfse:Telefone",
                isset($tom->telefone) ? $tom->telefone : null,
                false
            );
            $this->dom->addChild(
                $contato,
                "nfse:Email",
                isset($tom->email) ? $tom->email : null,
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
        $node = $this->dom->createElement('nfse:Intermediario');
        $ide = $this->dom->createElement('nfse:IdentificacaoIntermediario');
        $cpfcnpj = $this->dom->createElement('nfse:CpfCnpj');
        if (isset($int->cnpj)) {
            $this->dom->addChild(
                $cpfcnpj,
                "nfse:Cnpj",
                $int->cnpj,
                true
            );
        } else {
            $this->dom->addChild(
                $cpfcnpj,
                "nfse:Cpf",
                $int->cpf,
                true
            );
        }
        $ide->appendChild($cpfcnpj);
        $this->dom->addChild(
            $ide,
            "nfse:InscricaoMunicipal",
            $int->inscricaomunicipal,
            false
        );
        $node->appendChild($ide);
        $this->dom->addChild(
            $node,
            "nfse:RazaoSocial",
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
        $node = $this->dom->createElement('nfse:ConstrucaoCivil');
        $this->dom->addChild(
            $node,
            "nfse:CodigoObra",
            isset($obra->codigoobra) ? $obra->codigoobra : null,
            false
        );
        $this->dom->addChild(
            $node,
            "nfse:Art",
            $obra->art,
            true
        );
        $parent->appendChild($node);
    }
}

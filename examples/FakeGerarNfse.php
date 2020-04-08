<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Common\Certificate;
use NFePHP\NFSeFiorilli\Tools;
use NFePHP\NFSeFiorilli\Common\Soap\SoapFake;
use NFePHP\NFSeFiorilli\Common\FakePretty;
use NFePHP\NFSeFiorilli\Rps;

try {

    $config = [
        'cnpj'     => '01001001000113',
        'cpf'      => null,
        'im'       => '15000',
        'cmun'     => '3504800', //ira determinar as urls e outros dados
        'razao'    => 'Empresa Test Ltda',
        'tpamb'    => 2, //1-producao, 2-homologacao
        'login'    => '01001001000113',
        'password' => '123456'
    ];
    $configJson = json_encode($config);

    $content = file_get_contents('expired_certificate.pfx');
    $password = 'associacao';
    $cert = Certificate::readPfx($content, $password);

    $soap = new SoapFake();
    $soap->disableCertValidation(true);

    $tools = new Tools($configJson, $cert);
    $tools->loadSoapClass($soap);

    $std = new \stdClass();
    $std->version = '2.01'; //
    $std->dataemissao = '2020-04-08'; //
    $std->status = 1;  //
    $std->competencia = '2020-04-08'; //
    $std->regimeespecialtributacao = null;
    $std->optantesimplesnacional = 2; // 
    $std->incentivofiscal = 2; // 

    $std->identificacaorps = new \stdClass(); //
    $std->identificacaorps->numero = 1211;
    $std->identificacaorps->serie = '1';
    $std->identificacaorps->tipo = 1;

    $std->servico = new \stdClass(); //
    $std->servico->issretido = 2; //
    $std->servico->responsavelretencao = null; //
    $std->servico->itemlistaservico = '01.05'; //
    //$std->servico->codigocnae = '8599603'; // nunca será usado 
    $std->servico->codigoTributacaomunicipio = null; //
    $std->servico->discriminacao = 'Teste de RPS'; //
    $std->servico->codigomunicipio = '3504800'; //
    //$std->servico->codigopais = null; //
    $std->servico->exigibilidadeiss = 1; //
    //$std->servico->municipioincidencia = '3504800'; //
    //$std->servico->numeroprocesso = null; //

    $std->servico->valores = new \stdClass(); //
    $std->servico->valores->valorservicos = 100.00; //
    //$std->servico->valores->valordeducoes = 10.00; //
    //$std->servico->valores->valorpis = 10.00; //
    //$std->servico->valores->valorcofins = 10.00; //
    //$std->servico->valores->valorinss = 10.00; //
    //$std->servico->valores->valorir = 10.00; //
    //$std->servico->valores->valorcsll = 10.00; //
    //$std->servico->valores->outrasretencoes = 10.00; //
    $std->servico->valores->valoriss = 2.00; //
    $std->servico->valores->aliquota = 2; //
    //$std->servico->valores->descontoincondicionado = 10.00; //
    //$std->servico->valores->descontocondicionado = 10.00; //

    $std->tomador = new \stdClass(); //
    $std->tomador->cnpj = "04604742000187"; //
    //$std->tomador->cpf = "12345678901"; //
    $std->tomador->razaosocial = "Fulano de Tal"; // 
    $std->tomador->telefone = '123456789'; //
    $std->tomador->email = 'fulano@mail.com'; //

    $std->tomador->endereco = new \stdClass(); //
    $std->tomador->endereco->endereco = 'Rua das Rosas'; //
    $std->tomador->endereco->numero = '111'; //
    $std->tomador->endereco->complemento = 'Sobre Loja'; //
    $std->tomador->endereco->bairro = 'Centro'; //
    $std->tomador->endereco->codigomunicipio = '3504800'; //
    $std->tomador->endereco->uf = 'SP'; //
    $std->tomador->endereco->codigopais = null; //
    $std->tomador->endereco->cep = '76900011'; //

    //$std->intermediarioservico = new \stdClass(); //
    //$std->intermediarioservico->cnpj = '99999999000191'; // 
    //$std->intermediarioservico->cpf = null; //
    //$std->intermediarioservico->inscricaomunicipal = '8041700010';
    //$std->intermediarioservico->razaosocial = "Beltrano da Silva";

    //$std->construcaocivil = new \stdClass(); //
    //$std->construcaocivil->codigoobra = '1234'; //
    //$std->construcaocivil->art = '1234'; //


    $rps = new Rps($std);
    //$rps->config((object) $config);

    $response = $tools->gerarNfse($rps);

    echo FakePretty::prettyPrint($response, '');
} catch (\Exception $e) {
    echo $e->getMessage();
}
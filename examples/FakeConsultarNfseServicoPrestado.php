<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Common\Certificate;
use NFePHP\NFSeFiorilli\Tools;
use NFePHP\NFSeFiorilli\Common\Soap\SoapFake;
use NFePHP\NFSeFiorilli\Common\FakePretty;

try {
    
    $config = [
        'cnpj' => '01001001000113',
        'cpf' => null,
        'im' => '15000',
        'cmun' => '3504800', //ira determinar as urls e outros dados
        'razao' => 'Empresa Test Ltda',
        'tpamb' => 2, //1-producao, 2-homologacao
        'login' => '01001001000113',
        'senha' => '123456'
    ];
    $configJson = json_encode($config);

    $content = file_get_contents('expired_certificate.pfx');
    $password = 'associacao';
    $cert = Certificate::readPfx($content, $password);

    $soap = new SoapFake();
    $soap->disableCertValidation(true);
    
    $tools = new Tools($configJson, $cert);
    $tools->loadSoapClass($soap);

    $parameters = new \stdClass();
    
    //opcional
    $parameters->numero = 1234;
    
    //opcional
    $parameters->periodo = new \stdClass();
    $parameters->periodo->inicial = '2010-01-01';
    $parameters->periodo->final = '2010-02-01'; //deve ser maior que o inicial
    
    //opcional
    $parameters->competencia = new \stdClass();
    $parameters->competencia->inicial = '2010-01-01';
    $parameters->competencia->final = '2010-02-01'; //deve ser maior que o inicial
    
    //opcional
    $parameters->tomador = new \stdClass();
    $parameters->tomador->cnpj = '12345678901234'; 
    $parameters->tomador->cpf = '12345678901'; //deve declarar apenas se não for cnpj
    $parameters->tomador->im = '12345677'; //opcional
    
    //opcional
    $parameters->intermediario = new \stdClass();
    $parameters->intermediario->cnpj = '12345678901234'; 
    $parameters->intermediario->cpf = '12345678901'; //deve declarar apenas se não for cnpj
    $parameters->intermediario->im = '12345677'; //opcional
    
    $response = $tools->consultarNfseServicoPrestado($parameters);

    echo FakePretty::prettyPrint($response, '');
 
} catch (\Exception $e) {
    echo $e->getMessage();
}
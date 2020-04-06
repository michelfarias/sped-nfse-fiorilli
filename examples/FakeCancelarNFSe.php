<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Common\Certificate;
use NFePHP\NFSeBetha\Tools;
use NFePHP\NFSeBetha\Common\Soap\SoapFake;
use NFePHP\NFSeBetha\Common\FakePretty;

try {
    
    $config = [
        'cnpj' => '01001001000113',
        'im' => '15000',
        'cmun' => '3504800', //ira determinar as urls e outros dados
        'razao' => 'Empresa Test Ltda',
        'tpamb' => 2, //1-producao, 2-homologacao
        'login' => '01001001000113',
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

    $id = '1';
    $numero = '1';
    $cod_cancelamento = 2;
    $cmum = null; //se não informado será usado automaticamente o do emitente
    
    $response = $tools->cancelarNfse($id, $numero, $cod_cancelamento, $cmun);

    echo FakePretty::prettyPrint($response, '');
 
} catch (\Exception $e) {
    echo $e->getMessage();
}
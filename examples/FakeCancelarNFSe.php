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

    /*
     * Códigos de Cancelamento
     * 1 – Erro na emissão
     * 2 – Serviço não prestado
     * 3 – Erro de assinatura
     * 4 – Duplicidade da nota
     * 5 – Erro de processamento 4
     * Importante: Os códigos 3 (Erro de assinatura) e
     * 5 (Erro de processamento) são de uso restrito da
     * Administração Tributária Municipal
     */
    
    $numero = 12457;
    $cod_cancelamento = 2;
    
    $response = $tools->cancelarNfse($numero, $cod_cancelamento);

    echo FakePretty::prettyPrint($response, '');
 
} catch (\Exception $e) {
    echo $e->getMessage();
}
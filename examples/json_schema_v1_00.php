<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use JsonSchema\Constraints\Constraint;
use JsonSchema\Constraints\Factory;
use JsonSchema\SchemaStorage;
use JsonSchema\Validator;

$version = '1';

$jsonSchema = '{
    "title": "RPS",
    "type": "object",
    "properties": {
        "version": {
            "required": false,
            "type": ["string", "null"]
        },
        "numero": {
            "required": true,
            "type": "integer",
            "minumum": 1,
            "maximum": 999999999999
        },
        "serie": {
            "required": false,
            "type": ["string", "null"],
            "pattern": "^.{1,5}$"
        },
        "tipo": {
            "required": false,
            "type": ["string", "null"],
            "pattern": "^(RPS|RPS-M|RPS-C)$"
        },
        "dataemissao": {
            "required": true,
            "type": "string",
            "pattern": "^([0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]))$"
        },
        "status": {
            "required": true,
            "type": "string",
            "pattern": "^(N|C)$"
        },
        "tributacao": {
            "required": true,
            "type": "string",
            "pattern": "^(T|F|A|B|D|M|N|R|S|x|V|P|C)$"
        },
        "codigoservico": {
            "required": true,
            "type": "string",
            "pattern": "^[0-9]{4,5}$"
        },
        "discriminacao": {
            "required": true,
            "type": "string",
            "pattern": "^.{1,2000}$"
        },
        "valorservicos": {
            "required": true,
            "type": "number"
        },
        "valordeducoes": {
            "required": false,
            "type": ["number","null"]
        },
        "valorpis": {
            "required": false,
            "type": ["number","null"]
        },
        "valorcofins": {
            "required": false,
            "type": ["number","null"]
        },
        "valorinss": {
            "required": false,
            "type": ["number","null"]
        },
        "valorir": {
            "required": false,
            "type": ["number","null"]
        },
        "valorcsll": {
            "required": false,
            "type": ["number","null"]
        },
        "aliquota": {
            "required": true,
            "type": "number"
        },
        "issretido": {
            "required": true,
            "type": "boolean"
        },
        "valortotalrecebido": {
            "required": false,
            "type": ["number","null"]
        },
        "valorcargatributaria": {
            "required": false,
            "type": ["number","null"]
        },
        "percentualcargatributaria": {
            "required": false,
            "type": ["number","null"]
        },
        "fontecargatributaria": {
            "required": false,
            "type": ["string", "null"],
            "pattern": "^.{1,10}$"
        },
        "tomador": {
            "required": false,
            "type": ["object","null"],
            "properties": {
                "cnpj": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{14}$"
                },
                "cpf": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{11}$"
                },
                "im": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{4,8}$"
                },
                "ie": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{1,19}$"
                },
                "nome": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^.{1,75}$"
                },
                "email": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^.{5,75}$"
                },
                "endereco": {
                    "required": false,
                    "type": ["object","null"],
                    "properties": {
                        "tipologradouro": {
                            "required": false,
                            "type": ["string", "null"],
                            "pattern": "^.{0,3}$"
                        },
                        "logradouro": {
                            "required": false,
                            "type": ["string", "null"],
                            "pattern": "^.{1,50}$"
                        },
                        "numero": {
                            "required": false,
                            "type": ["string", "null"],
                            "pattern": "^.{1,10}$"
                        },
                        "complemento": {
                            "required": false,
                            "type": ["string", "null"],
                            "pattern": "^.{1,30}$"
                        },
                        "bairro": {
                            "required": false,
                            "type": ["string", "null"],
                            "pattern": "^.{1,30}$"
                        },
                        "codigoibge": {
                            "required": false,
                            "type": ["string", "null"],
                            "pattern": "^[0-9]{7}$"
                        },
                        "uf": {
                            "required": false,
                            "type": ["string", "null"],
                            "pattern": "^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)$"
                        },
                        "cep": {
                            "required": false,
                            "type": ["string", "null"],
                            "pattern": "^[0-9]{8}$"
                        }
                    }
                }
            }
        },
        "intermediario": {
            "required": false,
            "type": ["object","null"],
            "properties": {
                "cnpj": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{14}$"
                },
                "cpf": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{11}$"
                },
                "im": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{4,8}$"
                },
                "issretido": {
                    "required": true,
                    "type": "boolean"
                },
                "email": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^.{5,75}$"
                }
            }    
        },
        "construcaocivil": {
            "required": false,
            "type": ["object","null"],
            "properties": {
                "codigoobra": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{1,12}$"
                },
                "matricula": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{1,12}$"
                },
                "municipioprestacao": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{7}$"
                },
                "numeroencapsulamento": {
                    "required": false,
                    "type": ["string", "null"],
                    "pattern": "^[0-9]{1,12}$"
                }
            }
        }
    }    
}';


$std = new \stdClass();
$std = new \stdClass();
$std->version = '1'; //opcional
$std->numero = 11; //obrigatorio
$std->serie = '1'; //obrigatorio
$std->tipo = 'RPS'; //obrigatorio //RPS RPS-C RPS-M 
$std->dataemissao = '2018-10-31'; //obrigatorio
$std->status = 'N'; //N - normal C- cancelado obrigatorio
$std->tributacao = 'T'; //T – Tributado em São Paulo
                        //F – Tributado Fora de São Paulo
                        //A – Tributado em São Paulo, porém Isento
                        //B – Tributado Fora de São Paulo, porém Isento
                        //D – Tributado em São Paulo com isenção parcial
                        //M - Tributado em São Paulo, porém com indicação de imunidade subjetiva
                        //N - Tributado fora de São Paulo, porém com indicação de imunidade subjetiva
                        //R - Tributado em São Paulo, porém com indicação de imunidade objetiva
                        //S - Tributado fora de São Paulo, porém com indicação de imunidade objetiva
                        //X –Tributado em São Paulo, porém Exigibilidade Suspensa
                        //V –Tributado Fora de São Paulo, porém Exigibilidade Suspensa
                        //P – Exportação de Serviços
                        //C – Cancelado

$std->codigoservico = '2658';
$std->discriminacao = 'Detalhes do serviço';
$std->valorservicos = 100.00;
$std->valordeducoes = 0.00;
$std->valorpis = 10.00;
$std->valorcofins = 10.00;
$std->valorinss = 10.00;
$std->valorir = 10.00;
$std->valorcsll = 10.00;
$std->aliquota = 0.05;
$std->issretido = false;
$std->valortotalrecebido = null;

$std->valorcargatributaria = 5.00;
$std->percentualcargatributaria = 0.05;
$std->fontecargatributaria = 'IBPT';

$std->tomador = new \stdClass();
$std->tomador->cnpj = '12345678901234'; //opcional
$std->tomador->cpf = '39521777176'; //opcional
$std->tomador->im = '123456';
$std->tomador->ie = '12345678909';
$std->tomador->nome = 'TOMADOR PF';
$std->tomador->email = 'tomador@uol.com.br';

$std->tomador->endereco = new \stdClass();
$std->tomador->endereco->tipologradouro = 'Av';
$std->tomador->endereco->logradouro = 'Paulista';
$std->tomador->endereco->numero = '100';
$std->tomador->endereco->complemento = 'Cj 35';
$std->tomador->endereco->bairro = 'Bela Vista';
$std->tomador->endereco->codigoibge ='3550308';
$std->tomador->endereco->uf = 'SP';
$std->tomador->endereco->cep = '01310100';

$std->intermediario = new \stdClass(); //false
$std->intermediario->cnpj = '99999999000191'; //false 
$std->intermediario->cpf = null; //false
$std->intermediario->im = '80417010';
$std->intermediario->issretido = false;
$std->intermediario->email = "fulano@mail.com";

$std->construcaocivil = new \stdClass(); 
$std->construcaocivil->codigoobra = '1234';
$std->construcaocivil->matricula = '1234'; 
$std->construcaocivil->municipioprestacao = '3550308';
$std->construcaocivil->numeroencapsulamento = '1234';


// Schema must be decoded before it can be used for validation
$jsonSchemaObject = json_decode($jsonSchema);
if (empty($jsonSchemaObject)) {
    echo "<h2>Erro de digitação no schema ! Revise</h2>";
    echo "<pre>";
    print_r($jsonSchema);
    echo "</pre>";
    die();
}
// The SchemaStorage can resolve references, loading additional schemas from file as needed, etc.
$schemaStorage = new SchemaStorage();
// This does two things:
// 1) Mutates $jsonSchemaObject to normalize the references (to file://mySchema#/definitions/integerData, etc)
// 2) Tells $schemaStorage that references to file://mySchema... should be resolved by looking in $jsonSchemaObject
$schemaStorage->addSchema('file://mySchema', $jsonSchemaObject);
// Provide $schemaStorage to the Validator so that references can be resolved during validation
$jsonValidator = new Validator(new Factory($schemaStorage));
// Do validation (use isValid() and getErrors() to check the result)
$jsonValidator->validate(
    $std,
    $jsonSchemaObject,
    Constraint::CHECK_MODE_COERCE_TYPES  //tenta converter o dado no tipo indicado no schema
);

if ($jsonValidator->isValid()) {
    echo "The supplied JSON validates against the schema.<br/>";
} else {
    echo "Dados não validados. Violações:<br/>";
    foreach ($jsonValidator->getErrors() as $error) {
        echo sprintf("[%s] %s<br/>", $error['property'], $error['message']);
    }
    die;
}
//salva se sucesso
file_put_contents("../storage/jsonSchemes/v$version/rps.schema", $jsonSchema);

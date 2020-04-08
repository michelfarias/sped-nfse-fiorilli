<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use JsonSchema\Constraints\Constraint;
use JsonSchema\Constraints\Factory;
use JsonSchema\SchemaStorage;
use JsonSchema\Validator;

$version = '2_01';

$jsonSchema = '{
    "title": "RPS",
    "type": "object",
    "properties": {
        "version": {
            "required": false,
            "type": ["string", "null"]
        },
        "identificacaorps": {
            "required": false,
            "type": ["object","null"],
            "properties": {
                "numero": {
                    "required": true,
                    "type": "integer",
                    "pattern": "^[0-9]{1,15}$"
                },
                "serie": {
                    "required": true,
                    "type": "string",
                    "maxLength": 5,
                    "pattern": "^[0-9A-Za-z]{1,5}$"
                },
                "tipo": {
                    "required": true,
                    "type": "integer",
                    "pattern": "^[1-3]{1}$"
                }
            }
        },
        "dataemissao": {
            "required": false,
            "type": ["string","null"],
            "pattern": "^([0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]))$"
        },
        "status": {
            "required": false,
            "type": ["integer","null"],
            "pattern": "^[1-2]{1}$"
        },
        "competencia": {
            "required": true,
            "type": "string",
            "pattern": "^([0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]))$"
        },
        "regimeespecialtributacao": {
            "required": false,
            "type": ["integer","null"],
            "pattern": "^[1-6]{1}$"
        },
        "optantesimplesnacional": {
            "required": true,
            "type": "integer",
            "pattern": "^[1-2]{1}$"
        },
        "incentivofiscal": {
            "required": true,
            "type": "integer",
            "pattern": "^[1-2]{1}$"
        },
        "servico": {
            "required": true,
            "type": "object",
            "properties": {
                "issretido": {
                    "required": true,
                    "type": "integer",
                    "pattern": "^[1-2]{1}$"
                },
                "responsavelretencao": {
                    "required": false,
                    "type": ["string","null"]
                },
                "itemlistaservico": {
                    "required": true,
                    "type": "string",
                    "minLength": 1,
                    "maxLength": 5
                },
                "codigocnae": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^[0-9]{7}$"
                },
                "codigotributacaomunicipio": {
                    "required": false,
                    "type": ["string","null"],
                    "minLength": 1,
                    "maxLength": 20
                },
                "discriminacao": {
                    "required": true,
                    "type": "string",
                    "minLength": 1,
                    "maxLength": 2000
                },
                "codigomunicipio": {
                    "required": true,
                    "type": "string",
                    "pattern": "^[0-9]{7}$"
                },
                "codigopais": {
                    "required": false,
                    "type": ["integer","null"],
                    "pattern": "^[0-9]{7}$"
                },
                "exigibilidadeiss": {
                    "required": true,
                    "type": "integer",
                    "pattern": "^[1-2]{1}#"
                },
                "municipioincidencia": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^[0-9]{7}$"
                },
                "numeroprocesso": {
                    "required": false,
                    "type": ["string","null"],
                   "pattern": "^.{1,30}$"
                },
                "valores": {
                    "required": true,
                    "type": "object",
                    "properties": {
                        "valorservicos": {
                            "required": true,
                            "type": "number"
                        },
                        "valordeducoes": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "valorpis": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "valorcofins": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "valorinss": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "valorir": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "valorcsll": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "outrasretencoes": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "valoriss": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "aliquota": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "descontoincondicionado": {
                            "required": false,
                            "type": ["number", "null"]
                        },
                        "descontocondicionado": {
                            "required": false,
                            "type": ["number", "null"]
                        }
                    }
                }
            }
        },
        "tomador": {
            "required": false,
            "type": ["object","null"],
            "properties": {
                "cnpj": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^[0-9]{14}$"
                },
                "cpf": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^[0-9]{11}$"
                },
                "razaosocial": {
                    "required": true,
                    "type": "string",
                    "pattern": "^.{1,150}$"
                },
                "inscricaomunicipal": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^.{1,15}$"
                },
                "telefone": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^.{1,20}$"
                },
                "email": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^.{1,80}$"
                },
                "endereco": {
                    "required": false,
                    "type": ["object","null"],
                    "properties": {
                        "endereco": {
                            "required": false,
                            "type": ["string","null"],
                            "pattern": "^.{1,125}$"
                        },
                        "numero": {
                            "required": false,
                            "type": ["string","null"],
                            "pattern": "^.{1,10}$"
                        },
                        "complemento": {
                            "required": false,
                            "type": ["string","null"],
                            "pattern": "^.{1,60}$"
                        },
                        "bairro": {
                            "required": false,
                            "type": ["string","null"],
                            "pattern": "^.{1,60}$"
                        },
                        "codigomunicipio": {
                            "required": false,
                            "type": ["string","null"],
                            "pattern": "^[0-9]{7}$"
                        },
                        "uf": {
                            "required": false,
                            "type": ["string","null"],
                            "maxLength": 2
                        },
                        "codigopais": {
                            "required": false,
                            "type": ["string","null"],
                            "pattern": "^[0-9]{4}$"
                        },
                        "cep": {
                            "required": true,
                            "type": "string",
                            "pattern": "^[0-9]{8}$"
                        }
                    }
                }
            }
        },
        "intermediarioservico": {
            "required": false,
            "type": ["object","null"],
            "properties": {
                "cnpj": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^[0-9]{14}$"
                },
                "cpf": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^[0-9]{11}$"
                },
                "inscricaomunicipal": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^.{1,15}$"
                },
                "razaosocial": {
                    "required": true,
                    "type": ["string","null"],
                    "pattern": "^.{1,150}$"
                }
            }
        },
        "construcaocivil": {
            "required": false,
            "type": ["object","null"],
            "properties": {
                "codigoobra": {
                    "required": false,
                    "type": ["string","null"],
                    "pattern": "^.{1,15}$"
                },
                "art": {
                    "required": true,
                    "type": "string",
                    "pattern": "^.{1,15}$"
                }
            }
        }
    }
}';


$std = new \stdClass();
$std->version = '2.02'; //false
$std->identificacaorps = new \stdClass(); //false
    $std->identificacaorps->numero = 11; //limite 15 digitos
    $std->identificacaorps->serie = '1'; //BH deve ser string numerico
    $std->identificacaorps->tipo = 1; //1 - RPS 2-Nota Fiscal Conjugada (Mista) 3-Cupom
$std->dataemissao = '2018-10-31'; //false
$std->status = 1;  // true 1 – Normal  2 – Cancelado
$std->competencia = '2018-10-01'; //true
$std->regimeespecialtributacao = null; 
$std->optantesimplesnacional = 1; // true 1 - SIM 2 - Não
$std->incentivofiscal = 2; // true 1 - SIM 2 - Não

$std->servico = new \stdClass(); //true
$std->servico->issretido = 2;
$std->servico->responsavelretencao = null; //false
$std->servico->itemlistaservico = '11.01'; //true
$std->servico->codigocnae = '8599603'; //false
$std->servico->codigoTributacaomunicipio = null; //false
$std->servico->discriminacao = 'Teste de RPS'; //true
$std->servico->codigomunicipio = '3106200'; // true
$std->servico->codigopais = null; //false
$std->servico->exigibilidadeiss  = 1; //true
$std->servico->municipioincidencia  = '3106200'; // false
$std->servico->numeroprocesso = null; //false

$std->servico->valores = new \stdClass(); //true
$std->servico->valores->valorservicos = 100.00; //true
$std->servico->valores->valordeducoes = 10.00; //false
$std->servico->valores->valorpis = 10.00; //false
$std->servico->valores->valorcofins = 10.00; //false
$std->servico->valores->valorinss = 10.00; //false
$std->servico->valores->valorir = 10.00; //false
$std->servico->valores->valorcsll = 10.00; //false
$std->servico->valores->outrasretencoes = 10.00; //false
$std->servico->valores->valoriss = 10.00; //false
$std->servico->valores->aliquota = 5; //false
$std->servico->valores->descontoincondicionado = 10.00; //false
$std->servico->valores->descontocondicionado = 10.00; //false

$std->tomador = new \stdClass(); //false
$std->tomador->cnpj = "99999999000191"; //false
$std->tomador->cpf = "12345678901"; //false
$std->tomador->razaosocial = "Fulano de Tal"; //false 
$std->tomador->telefone = '123456789'; //false
$std->tomador->email = 'fulano@mail.com'; //false

$std->tomador->endereco = new \stdClass(); //false
$std->tomador->endereco->endereco = 'Rua das Rosas'; //false
$std->tomador->endereco->numero = '111'; //false
$std->tomador->endereco->complemento = 'Sobre Loja'; //false
$std->tomador->endereco->bairro = 'Centro'; //false
$std->tomador->endereco->codigomunicipio = '3106200'; //false
$std->tomador->endereco->uf = 'MG'; //false
$std->tomador->endereco->codigopais = null; //false
$std->tomador->endereco->cep = '30160010'; //false

$std->intermediarioservico = new \stdClass(); //false
$std->intermediarioservico->cnpj = '99999999000191'; //false 
$std->intermediarioservico->cpf = null; //false
$std->intermediarioservico->inscricaomunicipal = '8041700010';
$std->intermediarioservico->razaosocial = "Beltrano da Silva";

$std->construcaocivil = new \stdClass(); //false
$std->construcaocivil->codigoobra = '1234'; //false
$std->construcaocivil->art = '1234'; //true

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
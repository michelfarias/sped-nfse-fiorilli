<?php

namespace NFePHP\NFSeFiorilli\Common\Soap;

/**
 * Soap fake class used for development only
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
use NFePHP\NFSeFiorilli\Common\Soap\SoapBase;
use NFePHP\NFSeFiorilli\Common\Soap\SoapInterface;
use NFePHP\Common\Exception\SoapException;
use NFePHP\Common\Certificate;
use Psr\Log\LoggerInterface;

class SoapFake extends SoapBase implements SoapInterface
{
    /**
     * Constructor
     * @param Certificate $certificate
     * @param LoggerInterface $logger
     */
    public function __construct(Certificate $certificate = null, LoggerInterface $logger = null)
    {
        parent::__construct($certificate, $logger);
    }
    
    public function send(
        $operation,
        $url,
        $action,
        $envelope,
        $parameters
    ) {
        $requestHead = implode("\n", $parameters);
        $requestBody = $envelope;
        
        return json_encode([
            'url' => $url,
            'operation' => $operation,
            'action' => $action,
            'soapver' => '1.2',
            'parameters' => $parameters,
            'header' => $requestHead,
            'namespaces' => [],
            'body' => $requestBody
        ], JSON_PRETTY_PRINT);
    }
}

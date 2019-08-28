<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request;

use Pronko\LiqPayGateway\Gateway\Config;

/**
 * Class SignatureFactory
 */
class SignatureFactory
{
    /**
     * @var Encoder
     */
    private $encoder;

    /**
     * @var Config
     */
    private $config;

    /**
     * SignatureFactory constructor.
     * @param Encoder $encoder
     * @param Config $config
     */
    public function __construct(
        Encoder $encoder,
        Config $config
    ) {
        $this->encoder = $encoder;
        $this->config = $config;
    }

    /**
     * @param string $encryptedData
     * @return string
     */
    public function create(string $encryptedData)
    {
        $privateKey = $this->config->getPrivateKey();
        return $this->encoder->encode(sha1($privateKey . $encryptedData . $privateKey, true));
    }
}

<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request;

use Magento\Framework\Serialize\SerializerInterface;
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
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var Config
     */
    private $config;

    /**
     * SignatureFactory constructor.
     * @param Encoder $encoder
     * @param SerializerInterface $serializer
     * @param Config $config
     */
    public function __construct(
        Encoder $encoder,
        SerializerInterface $serializer,
        Config $config
    ) {
        $this->encoder = $encoder;
        $this->serializer = $serializer;
        $this->config = $config;
    }

    /**
     * @param array $data
     * @return string
     */
    public function create(array $data)
    {
        $data = base64_encode(json_encode($data)); //$this->encoder->encode($this->serializer->serialize($data));

        $privateKey = $this->config->getPrivateKey();

        return base64_encode(sha1($privateKey . $data . $privateKey, true));
//        return $this->encoder->encode(sha1($privateKey . $data . $privateKey, true));
    }
}

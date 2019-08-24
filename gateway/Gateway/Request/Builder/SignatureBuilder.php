<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request\Builder;

use Magento\Framework\Serialize\SerializerInterface;
use Magento\Payment\Gateway\Request\BuilderInterface;
use Pronko\LiqPayGateway\Gateway\Config;
use Pronko\LiqPayGateway\Gateway\Request\Encoder;

/**
 * Class SignatureBuilder
 */
class SignatureBuilder implements BuilderInterface
{
    /**
     * @var BuilderInterface
     */
    private $builder;

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
     * SignatureBuilder constructor.
     * @param Encoder $encoder
     * @param BuilderInterface $builder
     * @param SerializerInterface $serializer
     * @param Config $config
     */
    public function __construct(
        Encoder $encoder,
        BuilderInterface $builder,
        SerializerInterface $serializer,
        Config $config
    ) {
        $this->encoder = $encoder;
        $this->builder = $builder;
        $this->serializer = $serializer;
        $this->config = $config;
    }

    /**
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        $requestParams = $this->builder->build($buildSubject);

        $data = $this->encoder->encode($this->serializer->serialize($requestParams));

        $privateKey = $this->config->getPrivateKey();

        $signature = $this->encoder->encode(sha1($privateKey . $data . $privateKey, 1));

        return [
            'signature' => $signature
        ];
    }
}

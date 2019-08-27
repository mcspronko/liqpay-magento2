<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Http;

use Magento\Payment\Gateway\Http\ConverterInterface;
use Magento\Payment\Gateway\Http\TransferBuilder;
use Magento\Payment\Gateway\Http\TransferFactoryInterface;
use Magento\Payment\Gateway\Http\TransferInterface;
use Magento\Payment\Gateway\Http\ConverterException;
use Pronko\LiqPayGateway\Gateway\Config;
use Pronko\LiqPaySdk\Api\ApiUrlInterface;

/**
 * Class TransferFactory
 */
class TransferFactory implements TransferFactoryInterface
{
    /**
     * @var TransferBuilder
     */
    private $transferBuilder;

    /**
     * @var ConverterInterface
     */
    private $converter;

    /**
     * @var Config
     */
    private $config;

    /**
     * TransferFactory constructor.
     * @param TransferBuilder $transferBuilder
     * @param ConverterInterface $converter
     * @param Config $config
     */
    public function __construct(
        TransferBuilder $transferBuilder,
        ConverterInterface $converter,
        Config $config
    ) {
        $this->transferBuilder = $transferBuilder;
        $this->converter = $converter;
        $this->config = $config;
    }

    /**
     * @param array $request
     * @return TransferInterface
     * @throws ConverterException
     */
    public function create(array $request)
    {
        return $this->transferBuilder
            ->setUri($this->config->getGatewayUrl() . ApiUrlInterface::REQUEST_ENDPOINT_PATH)
            ->setMethod('POST')
            ->setBody(http_build_query($request))
            ->setHeaders($this->config->getGatewayHeaders())
            ->build();
    }
}

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
use Magento\Payment\Model\Method\Logger;
use Pronko\LiqPayGateway\Gateway\Config;
use Pronko\LiqPaySdk\Api\ApiUrlInterface;

/**
 * Class TransferFactory
 */
class TransferFactory implements TransferFactoryInterface
{
    const REQUEST_TIMEOUT = 30;

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
     * @var Logger
     */
    private $logger;

    /**
     * TransferFactory constructor.
     * @param TransferBuilder $transferBuilder
     * @param ConverterInterface $converter
     * @param Config $config
     * @param Logger $logger
     */
    public function __construct(
        TransferBuilder $transferBuilder,
        ConverterInterface $converter,
        Config $config,
        Logger $logger
    ) {
        $this->transferBuilder = $transferBuilder;
        $this->converter = $converter;
        $this->config = $config;
        $this->logger = $logger;
    }

    /**
     * @param array $request
     * @return TransferInterface
     * @throws ConverterException
     */
    public function create(array $request)
    {
        $this->logger->debug([
            'request_raw' => $request
        ]);

        return $this->transferBuilder
            ->setUri($this->config->getGatewayUrl() . ApiUrlInterface::REQUEST_ENDPOINT_PATH)
            ->setMethod('POST')
            ->setClientConfig([
                'timeout' => self::REQUEST_TIMEOUT,
                'verifypeer' => true
            ])
            ->setBody($this->converter->convert($request))
            ->setHeaders($this->config->getGatewayHeaders())
            ->build();
    }
}

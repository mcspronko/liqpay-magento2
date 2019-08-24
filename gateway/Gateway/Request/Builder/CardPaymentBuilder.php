<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request\Builder;

use Magento\Payment\Gateway\Request\BuilderInterface;
use Pronko\LiqPayGateway\Gateway\Config;
use Pronko\LiqPaySdk\Api\RequestFieldsInterface as RequestFields;
use Pronko\LiqPaySdk\Api\VersionInterface;

/**
 * Class CardPaymentBuilder
 */
class CardPaymentBuilder implements BuilderInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * CardPaymentBuilder constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        return [
            'data' => [
                RequestFields::VERSION => VersionInterface::VERSION,
                RequestFields::PUBLIC_KEY => $this->config->getPublicKey(),
                RequestFields::ACTION => 'pay',
                RequestFields::AMOUNT => 5,
                RequestFields::CARD => '4731195301524634',
                RequestFields::CARD_CVV => 123,
                RequestFields::CARD_EXP_MONTH => 12,
                RequestFields::CARD_EXP_YEAR => 22,
                RequestFields::CURRENCY => 'USD',
                RequestFields::DESCRIPTION => 'LiqPay for Magento 2'
            ]
        ];
    }
}

<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request\Builder;

use Magento\Payment\Gateway\Request\BuilderInterface;
use Pronko\LiqPaySdk\Api\RequestFieldsInterface as RequestFields;
use Pronko\LiqPaySdk\Api\VersionInterface;
use Pronko\LiqPayGateway\Gateway\Config;
use Pronko\LiqPayGateway\Gateway\Request\PaymentActionProvider;

/**
 * Class GeneralBuilder
 */
class GeneralBuilder implements BuilderInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var PaymentActionProvider
     */
    private $actionProvider;

    /**
     * GeneralBuilder constructor.
     * @param Config $config
     * @param PaymentActionProvider $actionProvider
     */
    public function __construct(
        Config $config,
        PaymentActionProvider $actionProvider
    ) {

        $this->config = $config;
        $this->actionProvider = $actionProvider;
    }

    /**
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        return [
            RequestFields::VERSION => VersionInterface::VERSION,
            RequestFields::PUBLIC_KEY => $this->config->getPublicKey(),
            RequestFields::ACTION => $this->actionProvider->getPaymentAction(),
            RequestFields::DESCRIPTION => 'LiqPay for Magento 2',
        ];
    }
}

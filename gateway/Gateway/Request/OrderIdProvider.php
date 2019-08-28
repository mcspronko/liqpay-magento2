<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request;

use Magento\Payment\Gateway\Data\OrderAdapterInterface;
use Pronko\LiqPayGateway\Gateway\Config;

/**
 * Class OrderIdProvider
 */
class OrderIdProvider
{
    /**
     * @var Config
     */
    private $config;

    /**
     * OrderIdProvider constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param OrderAdapterInterface $order
     * @return string
     */
    public function get(OrderAdapterInterface $order)
    {
        return $this->config->getOrderPrefix() . $order->getOrderIncrementId() . $this->config->getOrderSuffix();
    }
}

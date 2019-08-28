<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayCheckout\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Payment\Model\Method\Adapter;
use Pronko\LiqPayApi\Api\Data\PaymentMethodCodeInterface;

/**
 * Class DefaultConfigProvider
 */
class DefaultConfigProvider implements ConfigProviderInterface
{
    /**
     * @var Adapter
     */
    private $paymentMethodAdapter;

    /**
     * DefaultConfigProvider constructor.
     * @param Adapter $paymentAdapter
     */
    public function __construct(
        Adapter $paymentAdapter
    ) {
        $this->paymentMethodAdapter = $paymentAdapter;
    }

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return [
            'payment' => [
                PaymentMethodCodeInterface::CODE => [
                    'connection_type' => $this->paymentMethodAdapter->getConfigData('connection_type')
                ]
            ]
        ];
    }
}

<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request;

use Magento\Payment\Gateway\ConfigInterface;

/**
 * Class PaymentActionProvider
 */
class PaymentActionProvider
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @var array
     */
    private $actionMapping;

    /**
     * PaymentActionProvider constructor.
     * @param ConfigInterface $config
     * @param array $actionMapping
     */
    public function __construct(ConfigInterface $config, array $actionMapping = [])
    {
        $this->config = $config;
        $this->actionMapping = $actionMapping;
    }

    /**
     * @return string
     */
    public function getPaymentAction(): string
    {
        $paymentAction = (string) $this->config->getValue('payment_action');
        if (true === array_key_exists($paymentAction, $this->actionMapping)) {
            return (string) $this->actionMapping[$paymentAction];
        }
        return $paymentAction;
    }
}

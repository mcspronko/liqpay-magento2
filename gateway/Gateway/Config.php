<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway;

use Magento\Payment\Gateway\ConfigInterface;
use Pronko\LiqPayApi\Api\Data\EnvironmentStatusInterface;

/**
 * Class Config
 */
class Config
{
    /**#@+
     * Configuration keys
     */
    const PRODUCTION_PUBLIC_KEY = 'production_public_key';
    const PRODUCTION_PRIVATE_KEY = 'production_private_key';
    const SANDBOX_PUBLIC_KEY = 'sandbox_public_key';
    const SANDBOX_PRIVATE_KEY = 'sandbox_private_key';
    const ENVIRONMENT_MODE = 'mode';
    const ORDER_PREFIX = 'order_prefix';
    const ORDER_SUFFIX = 'order_suffix';
    /**#@-*/

    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @var string
     */
    private $gatewayUrl;

    /**
     * Config constructor.
     * @param ConfigInterface $config
     * @param string $gatewayUrl
     */
    public function __construct(
        ConfigInterface $config,
        $gatewayUrl
    ) {
        $this->config = $config;
        $this->gatewayUrl = (string) $gatewayUrl;
    }

    /**
     * @param int|null $storeId
     * @return string
     */
    public function getPrivateKey($storeId = null): string
    {
        return (string) $this->config->getValue(
            $this->isSandbox($storeId) ? self::SANDBOX_PRIVATE_KEY : self::PRODUCTION_PRIVATE_KEY,
            $storeId
        );
    }

    /**
     * @param int|null $storeId
     * @return string
     */
    public function getPublicKey($storeId = null): string
    {
        return (string) $this->config->getValue(
            $this->isSandbox($storeId) ? self::SANDBOX_PUBLIC_KEY : self::PRODUCTION_PUBLIC_KEY,
            $storeId
        );
    }

    /**
     * @return string
     */
    public function getGatewayUrl(): string
    {
        return $this->gatewayUrl;
    }

    /**
     * @return array
     */
    public function getGatewayHeaders(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getOrderPrefix(): string
    {
        return (string) $this->config->getValue(self::ORDER_PREFIX);
    }

    /**
     * @return string
     */
    public function getOrderSuffix(): string
    {
        return (string) $this->config->getValue(self::ORDER_SUFFIX);
    }

    /**
     * @param int|null $storeId
     * @return bool
     */
    public function isSandbox($storeId = null): bool
    {
        return EnvironmentStatusInterface::SANDBOX === $this->config->getValue(
            self::ENVIRONMENT_MODE,
            $storeId
        );
    }
}

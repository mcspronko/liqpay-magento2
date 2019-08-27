<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway;

use Magento\Payment\Gateway\ConfigInterface;
use Magento\Tests\NamingConvention\true\bool;
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
    /**#@-*/

    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * Config constructor.
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @param int|null $storeId
     * @return string
     */
    public function getPrivateKey($storeId = null): string
    {
        return (string) $this->config->getValue(
            $this->isSandbox($storeId) ?
                self::SANDBOX_PRIVATE_KEY :
                self::PRODUCTION_PRIVATE_KEY,
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
            $this->isSandbox($storeId) ?
                self::SANDBOX_PUBLIC_KEY :
                self::PRODUCTION_PUBLIC_KEY,
            $storeId
        );
    }

    /**
     * @param int|null $storeId
     * @return bool
     */
    public function isSandbox($storeId = null): bool
    {
        return (bool) $this->config->getValue(
            EnvironmentStatusInterface::SANDBOX,
            $storeId
        );
    }
}

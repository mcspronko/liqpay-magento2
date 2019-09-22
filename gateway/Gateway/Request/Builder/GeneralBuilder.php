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
     * GeneralBuilder constructor.
     * @param Config $config
     */
    public function __construct(
        Config $config
    ) {
        $this->config = $config;
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
        ];
    }
}

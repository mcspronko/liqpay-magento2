<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request;

use Magento\Payment\Gateway\Request\BuilderInterface;

/**
 * Class RequestBuilder
 */
class RequestBuilder implements BuilderInterface
{
    /**
     * @var BuilderInterface
     */
    private $builder;

    /**
     * RequestBuilder constructor.
     * @param BuilderInterface $builder
     */
    public function __construct(
        BuilderInterface $builder
    ) {
        $this->builder = $builder;
    }

    /**
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        return [
            'data' => $this->builder->build($buildSubject),
            'signature' => '',
        ];
    }
}

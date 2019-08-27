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
     * @var SignatureFactory
     */
    private $signatureFactory;

    /**
     * RequestBuilder constructor.
     * @param BuilderInterface $builder
     * @param SignatureFactory $signatureFactory
     */
    public function __construct(
        BuilderInterface $builder,
        SignatureFactory $signatureFactory
    ) {
        $this->builder = $builder;
        $this->signatureFactory = $signatureFactory;
    }

    /**
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        $data = $this->builder->build($buildSubject);

        return [
            'data' => $data,
            'signature' => $this->signatureFactory->create($data),
        ];
    }
}

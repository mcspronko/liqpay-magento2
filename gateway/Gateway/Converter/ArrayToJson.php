<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Converter;

use Magento\Framework\Serialize\SerializerInterface;

/**
 * Class ArrayToJson
 */
class ArrayToJson
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * ArrayToJson constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param array $data
     * @return bool|string
     */
    public function convert(array $data)
    {
        return $this->serializer->serialize($data);
    }
}

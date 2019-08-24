<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Converter;

use Magento\Framework\Serialize\SerializerInterface;

/**
 * Class JsonToArray
 */
class JsonToArray
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
     * @param string $data
     * @return array
     */
    public function convert(string $data): array
    {
        return $this->serializer->unserialize($data);
    }
}

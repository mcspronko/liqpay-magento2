<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request;

use Magento\Framework\Url\EncoderInterface;

/**
 * Class Encoder
 */
class Encoder
{
    /**
     * @var EncoderInterface
     */
    private $urlEncoder;

    /**
     * Encoder constructor.
     * @param EncoderInterface $encoder
     */
    public function __construct(
        EncoderInterface $encoder
    ) {
        $this->urlEncoder = $encoder;
    }

    /**
     * @param string $data
     * @return string
     */
    public function encode(string $data): string
    {
        return $this->urlEncoder->encode($data);
    }
}

<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway;

/**
 * Class Config
 */
class Config
{
    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return '';
    }
}

<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayCardGateway\Gateway\Request;

/**
 * To formats payment data according to LiqPay api requirements
 * Class PaymentDataFormatter
 */
class CardPaymentDataFormatter
{
    /**
     * @param string $value
     * @return string
     */
    public function getFormattedYear($value)
    {
        return substr($value, -2);
    }

    /**
     * @param string $value
     * @return string
     */
    public function getFormattedMonth($value)
    {
        return strlen($value) < 2 ? '0' . $value : $value;
    }
}

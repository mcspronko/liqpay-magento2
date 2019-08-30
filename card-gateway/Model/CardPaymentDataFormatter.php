<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayCardGateway\Model;

use Pronko\LiqPayCardGateway\Api\Data\CardPaymentInterface;

/**
 * To formats payment data according to LiqPay api requirements
 * Class PaymentDataFormatter
 */
class CardPaymentDataFormatter
{
    /**
     * @param string $value
     * @param string $cardField
     * @return string
     */
    public function format($value, $cardField)
    {
        switch ($cardField) {
            case CardPaymentInterface::EXPIRATION_YEAR:
                return $this->getFormattedYear($value);
            case CardPaymentInterface::EXPIRATION_MONTH:
                return $this->getFormattedMonth($value);
        }

        return $value;
    }

    /**
     * @param string $value
     * @return string
     */
    private function getFormattedYear($value)
    {
        return substr($value, -2);
    }

    /**
     * @param string $value
     * @return string
     */
    private function getFormattedMonth($value)
    {
        return strlen ($value) < 2 ? '0'. $value : $value;
    }
}

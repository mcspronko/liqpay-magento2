<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPaySdk\Api;

/**
 * Interface RequestFieldsInterface
 * @api
 */
interface RequestFieldsInterface
{
    /**
     * Required request parameter field names
     * @see https://www.liqpay.ua/documentation/en/api/aquiring/pay/doc
     */
    const VERSION = 'version';
    const PUBLIC_KEY = 'public_key';
    const ACTION = 'action';
    const AMOUNT = 'amount';
    const CARD_CVV = 'card_cvv';
    const CARD_EXP_MONTH = 'card_exp_month';
    const CARD_EXP_YEAR = 'card_exp_year';
    const CURRENCY = 'currency';
    const DESCRIPTION = 'description';
    const PHONE = 'phone';
}


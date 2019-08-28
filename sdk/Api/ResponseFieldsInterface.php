<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */

namespace Pronko\LiqPaySdk\Api;

/**
 * Interface ResponseFieldsInterface
 */
interface ResponseFieldsInterface
{
    const ACQUIRER_ID = 'acq_id';
    const ACTION = 'action';
    const PAYMENT_ID = 'payment_id';
    const VERSION = 'version';
    const PAY_TYPE = 'paytype';
    const ORDER_ID = 'order_id';
    const LIQPAY_ORDER_ID = 'liqpay_order_id';
    const PUBLIC_KEY = 'public_key';
    const CARD_TOKEN = 'card_token';
    const TRANSACTION_ID = 'transaction_id';
    const CREATE_DATE = 'create_date';
    const END_DATE = 'end_date';
    const SENDER_CARD_MASK = 'sender_card_mask2';
    const SENDER_CARD_BANK = 'sender_card_bank';
    const SENDER_CARD_TYPE = 'sender_card_type';
}

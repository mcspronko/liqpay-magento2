<?php
declare(strict_types=1);

namespace Pronko\LiqPayApi\Api\Data;

/**
 * Interface PaymentActionInterface
 * @api
 */
interface PaymentActionInterface
{
    const AUTHORIZE = 'authorize';
    const AUTHORIZE_CAPTURE = 'authorize_capture';
    const REFUND = 'refund';
}

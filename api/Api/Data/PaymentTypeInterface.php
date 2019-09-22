<?php
declare(strict_types=1);

namespace Pronko\LiqPayApi\Api\Data;

/**
 * Interface PaymentTypeInterface
 * @api
 */
interface PaymentTypeInterface
{
    const AUTHORIZE = 'authorize';
    const AUTHORIZE_CAPTURE = 'authorize_capture';
}

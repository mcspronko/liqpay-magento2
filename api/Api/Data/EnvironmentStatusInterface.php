<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayApi\Api\Data;

/**
 * Interface EnvironmentStatusInterface
 * @api
 */
interface EnvironmentStatusInterface
{
    const PRODUCTION = 'production';
    const SANDBOX = 'sandbox';
}

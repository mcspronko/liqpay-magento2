<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayApi\Api\Data;

/**
 * Interface ConnectionTypeInterface
 * @api
 */
interface ConnectionTypeInterface
{
    const BUILT_IN_FORM = 'built_in_form';
    const WIDGET = 'Widget';
    const REDIRECT = 'Redirect';
}

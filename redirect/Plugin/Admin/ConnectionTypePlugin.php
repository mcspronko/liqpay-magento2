<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayRedirect\Plugin\Admin;

use Pronko\LiqPayAdmin\Source\ConnectionType;
use Pronko\LiqPayApi\Api\Data\ConnectionTypeInterface;

/**
 * Class ConnectionTypePlugin
 */
class ConnectionTypePlugin
{
    /**
     * @param ConnectionType $subject
     * @param array $result
     * @return array
     */
    public function afterToOptionArray(
        ConnectionType $subject,
        $result
    ) {
        return array_merge($result, [['value' => ConnectionTypeInterface::REDIRECT, 'label' => __('Iframe/Redirect')]]);
    }
}

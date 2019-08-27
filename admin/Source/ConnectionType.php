<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayAdmin\Source;

use Magento\Framework\Option\ArrayInterface;
use Pronko\LiqPayApi\Api\Data\ConnectionTypeInterface;

/**
 * Class ConnectionType
 */
class ConnectionType implements ArrayInterface
{
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => ConnectionTypeInterface::BUILT_IN_FORM, 'label' => __('Built-in form')],
            ['value' => ConnectionTypeInterface::WIDGET, 'label' => __('Widget')],
            ['value' => ConnectionTypeInterface::REDIRECT, 'label' => __('Iframe/Redirect')],
        ];
    }
}

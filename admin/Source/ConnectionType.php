<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayAdmin\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Pronko\LiqPayApi\Api\Data\ConnectionTypeInterface;

/**
 * Class ConnectionType
 * @api
 */
class ConnectionType implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => ConnectionTypeInterface::BUILT_IN_FORM, 'label' => __('Built-in form')],
        ];
    }
}

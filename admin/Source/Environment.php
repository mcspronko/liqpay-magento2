<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types = 1);

namespace Pronko\LiqPayAdmin\Source;

use Magento\Framework\Option\ArrayInterface;
use Pronko\LiqPayApi\Api\Data\EnvironmentStatusInterface;

/**
 * Class Environment
 */
class Environment implements ArrayInterface
{
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => EnvironmentStatusInterface::PRODUCTION, 'label' => __('Production')],
            ['value' => EnvironmentStatusInterface::SANDBOX, 'label' => __('Sandbox')],
        ];
    }
}

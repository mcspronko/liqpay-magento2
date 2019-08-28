<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types = 1);

namespace Pronko\LiqPayAdmin\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Pronko\LiqPayApi\Api\Data\EnvironmentStatusInterface;

/**
 * Class Environment
 */
class Environment implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => EnvironmentStatusInterface::PRODUCTION, 'label' => __('Production')],
            ['value' => EnvironmentStatusInterface::SANDBOX, 'label' => __('Sandbox')],
        ];
    }
}

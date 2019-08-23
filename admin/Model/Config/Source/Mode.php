<?php

namespace Pronko\LiqPayAdmin\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Pronko\LiqPayAdmin\Model\ModeStatusInterface;

class Mode implements ArrayInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => ModeStatusInterface::PRODUCTION, 'label' => __('Production')],
            ['value' => ModeStatusInterface::SANDBOX, 'label' => __('Sandbox')],
        ];
    }
}
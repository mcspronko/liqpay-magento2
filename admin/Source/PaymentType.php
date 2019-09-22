<?php
declare(strict_types=1);

namespace Pronko\LiqPayAdmin\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Pronko\LiqPayApi\Api\Data\PaymentTypeInterface;

/**
 * Class PaymentType
 * @package Pronko\LiqPayAdmin\Source
 */
class PaymentType implements OptionSourceInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => PaymentTypeInterface::AUTHORIZE, 'label' => __('Authorize Only')],
            ['value' => PaymentTypeInterface::AUTHORIZE_CAPTURE, 'label' => __('Authorize and Capture')],
        ];
    }
}
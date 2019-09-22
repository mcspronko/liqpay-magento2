<?php
declare(strict_types=1);

namespace Pronko\LiqPayAdmin\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Pronko\LiqPayApi\Api\Data\PaymentActionInterface;

/**
 * Class PaymentAction
 * @package Pronko\LiqPayAdmin\Source
 */
class PaymentAction implements OptionSourceInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => PaymentActionInterface::AUTHORIZE, 'label' => __('Authorize Only')],
            ['value' => PaymentActionInterface::AUTHORIZE_CAPTURE, 'label' => __('Authorize and Capture')],
        ];
    }
}
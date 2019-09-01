<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayCustomer\Plugin\Payment\Block;

use Pronko\LiqPayApi\Api\Data\PaymentMethodCodeInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Payment\Block\Info as BlockInfo;
use Pronko\LiqPaySdk\Api\ResponseFieldsInterface;

/**
 * Class Info
 */
class Info
{
    /**
     * @var array
     */
    private $labels = [
        ResponseFieldsInterface::SENDER_CARD_MASK => 'Card Number',
        ResponseFieldsInterface::SENDER_CARD_TYPE => 'Type',
    ];

    /**
     * @var array
     */
    private $values = [];

    /**
     * @param BlockInfo $subject
     * @param $result
     * @return array
     * @throws LocalizedException
     */
    public function afterGetSpecificInformation(
        BlockInfo $subject,
        $result
    ) {
        if (PaymentMethodCodeInterface::CODE === $subject->getData('methodCode')) {
            $payment = $subject->getInfo();
            $additionalData = $payment->getAdditionalInformation();
            foreach ($this->labels as $key => $label) {
                if (array_key_exists($key, $additionalData)) {
                    $value = $additionalData[$key];
                    if (isset($this->values[$key][$value])) {
                        $value = $this->values[$key][$value];
                    }
                    $result[$label] = $value;
                }
            }
        }

        return $result;
    }
}

<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayCheckout\Observer;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;

/**
 * Class DataAssignObserver
 */
class DataAssignObserver extends AbstractDataAssignObserver
{
    /**
     * @var array
     */
    private $ccKeys = [
        'cc_type',
        'cc_exp_year',
        'cc_exp_month',
        'cc_number'
    ];

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $data = $this->readDataArgument($observer);
        $additionalData = $data->getData('additional_data');
        $paymentInfo = $this->readPaymentModelArgument($observer);

        foreach ($this->ccKeys as $ccKey) {
            if (isset($additionalData[$ccKey])) {
                $paymentInfo->setAdditionalInformation(
                    $ccKey,
                    $additionalData[$ccKey]
                );
            }
        }

        $paymentInfo->getAdditionalInformation();
    }
}

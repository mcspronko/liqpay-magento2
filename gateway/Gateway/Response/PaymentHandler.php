<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Response;

use Magento\Payment\Gateway\Response\HandlerInterface;
use Magento\Payment\Model\InfoInterface;
use Pronko\LiqPaySdk\Api\ResponseFieldsInterface;

/**
 * Class PaymentHandler
 */
class PaymentHandler implements HandlerInterface
{
    /**
     * @var array
     */
    private $additionalInformation = [
        ResponseFieldsInterface::ACQUIRER_ID,
        ResponseFieldsInterface::ACTION,
        ResponseFieldsInterface::PAYMENT_ID,
        ResponseFieldsInterface::PAY_TYPE,
        ResponseFieldsInterface::ORDER_ID,
        ResponseFieldsInterface::LIQPAY_ORDER_ID,
        ResponseFieldsInterface::TRANSACTION_ID,
    ];

    /**
     * @inheritdoc
     */
    public function handle(array $handlingSubject, array $response)
    {
        /** @var InfoInterface $payment */
        $payment = $handlingSubject['payment']->getPayment();

        foreach ($this->additionalInformation as $responseKey) {
            if (!empty($response[$responseKey])) {
                $payment->setAdditionalInformation($responseKey, $response[$responseKey]);
            }
        }
    }
}

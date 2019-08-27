<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Response;

use Magento\Payment\Gateway\Response\HandlerInterface;
use Magento\Payment\Model\InfoInterface;
use Magento\Sales\Model\Order\Payment;
use Pronko\LiqPaySdk\Api\ResponseFieldsInterface;

/**
 * Class TransactionHandler
 */
class TransactionHandler implements HandlerInterface
{
    /**
     * @var array
     */
    private $additionalInformation = [
        ResponseFieldsInterface::ACQUIRER_ID,
        ResponseFieldsInterface::ACTION,
        ResponseFieldsInterface::PAYMENT_ID,
        ResponseFieldsInterface::VERSION,
        ResponseFieldsInterface::PAY_TYPE,
        ResponseFieldsInterface::ORDER_ID,
        ResponseFieldsInterface::LIQPAY_ORDER_ID,
        ResponseFieldsInterface::PUBLIC_KEY,
        ResponseFieldsInterface::CARD_TOKEN,
        ResponseFieldsInterface::TRANSACTION_ID,
    ];

    /**
     * @inheritdoc
     */
    public function handle(array $handlingSubject, array $response)
    {
        /** @var InfoInterface|Payment $payment */
        $payment = $handlingSubject['payment']->getPayment();

        $transactionId = $response[ResponseFieldsInterface::TRANSACTION_ID];
        $rawDetails = [];
        $payment->setCcTransId($transactionId);
        $payment->setLastTransId($transactionId);
        $payment->setTransactionId($transactionId);

        foreach ($this->additionalInformation as $responseKey) {
            if (isset($response[$responseKey])) {
                $payment->setTransactionAdditionalInfo($responseKey, $response[$responseKey]);
                $rawDetails[$responseKey] = $responseKey[$responseKey];
            }
        }

        $payment->setTransactionAdditionalInfo('raw_details_info', $rawDetails);
    }
}

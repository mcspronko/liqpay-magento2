<?php

declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Response;

use Magento\Payment\Gateway\Response\HandlerInterface;
use Magento\Payment\Model\InfoInterface;
use Pronko\LiqPaySdk\Api\ResponseFieldsInterface;

/**
 * Class PaymentHandler
 */
class RefundHandler implements HandlerInterface
{
    /**
     * @var array
     */
    private $additionalInformation = [
        ResponseFieldsInterface::ACTION,
        ResponseFieldsInterface::PAYMENT_ID,
        ResponseFieldsInterface::STATUS,
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

<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayCardGateway\Gateway\Request\Builder;

use Magento\Payment\Gateway\Data\OrderAdapterInterface;
use Magento\Payment\Gateway\Request\BuilderInterface;
use Magento\Sales\Model\Order\Payment;
use Pronko\LiqPaySdk\Api\RequestFieldsInterface as RequestFields;
use Pronko\LiqPayCardGateway\Api\Data\CardPaymentInterface;
use Pronko\LiqPayCardGateway\Gateway\Request\CardPaymentDataFormatter;

/**
 * Class CardPaymentBuilder
 */
class CardPaymentBuilder implements BuilderInterface
{
    /**
     * @var CardPaymentDataFormatter
     */
    private $cardPaymentDataFormatter;

    /**
     * @param CardPaymentDataFormatter $cardPaymentDataFormatter
     */
    public function __construct(
        CardPaymentDataFormatter $cardPaymentDataFormatter
    ) {
        $this->cardPaymentDataFormatter = $cardPaymentDataFormatter;
    }

    /**
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        /** @var OrderAdapterInterface $order */
        $order = $buildSubject['payment']->getOrder();
        /** @var Payment $order */
        $payment = $buildSubject['payment']->getPayment();
        return [
            RequestFields::CARD => $payment->getData(CardPaymentInterface::NUMBER),
            RequestFields::CARD_CVV => $payment->getData(CardPaymentInterface::CVV),
            RequestFields::CARD_EXP_MONTH => $this->cardPaymentDataFormatter
                ->getFormattedMonth($payment->getData(CardPaymentInterface::EXPIRATION_MONTH)),
            RequestFields::CARD_EXP_YEAR => $this->cardPaymentDataFormatter
                ->getFormattedYear($payment->getData(CardPaymentInterface::EXPIRATION_YEAR)),
            RequestFields::AMOUNT => $order->getGrandTotalAmount(),
            RequestFields::CURRENCY => $order->getCurrencyCode(),
            RequestFields::PHONE => $this->getPhone($order),
        ];
    }

    /**
     * @param OrderAdapterInterface $orderAdapter
     * @return string
     */
    private function getPhone(OrderAdapterInterface $orderAdapter): string
    {
        return (string)$orderAdapter->getBillingAddress()->getTelephone();
    }
}

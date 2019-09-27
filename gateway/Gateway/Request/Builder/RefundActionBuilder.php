<?php

declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request\Builder;

use Magento\Payment\Gateway\Request\BuilderInterface;
use Pronko\LiqPayApi\Api\Data\PaymentActionInterface;
use Pronko\LiqPaySdk\Api\RequestFieldsInterface as RequestFields;

/**
 * Class RefundActionBuilder
 */
class RefundActionBuilder implements BuilderInterface
{

    /**
     * Builds ENV request
     *
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        return [
            RequestFields::ACTION => PaymentActionInterface::REFUND,
        ];
    }
}

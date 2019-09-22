<?php
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Request\Builder;

use Magento\Payment\Gateway\Request\BuilderInterface;
use Pronko\LiqPayGateway\Gateway\Request\PaymentActionProvider;
use Pronko\LiqPaySdk\Api\RequestFieldsInterface as RequestFields;

/**
 * Class PaymentActionBuilder
 * @package Pronko\LiqPayGateway\Gateway\Request\Builder
 */
class PaymentActionBuilder implements BuilderInterface
{

    /**
     * @var PaymentActionProvider
     */
    private $actionProvider;

    /**
     * PaymentActionBuilder constructor.
     * @param PaymentActionProvider $actionProvider
     */
    public function __construct(PaymentActionProvider $actionProvider)
    {
        $this->actionProvider = $actionProvider;
    }

    /**
     * Builds ENV request
     *
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        return [
            RequestFields::ACTION => $this->actionProvider->getPaymentAction(),
        ];
    }
}
<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Validator;

use Magento\Payment\Gateway\Validator\AbstractValidator;
use Magento\Payment\Gateway\Validator\ResultInterfaceFactory;
use Magento\Payment\Gateway\ConfigInterface;
use Magento\Payment\Gateway\Validator\ResultInterface;

/**
 * Class CurrencyValidator.
 */
class CurrencyValidator extends AbstractValidator
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * CurrencyValidator constructor.
     * @param ResultInterfaceFactory $resultFactory
     * @param ConfigInterface $config
     */
    public function __construct(ResultInterfaceFactory $resultFactory, ConfigInterface $config)
    {
        $this->config = $config;
        parent::__construct($resultFactory);
    }

    /**
     * @param array $validationSubject
     * @return ResultInterface
     */
    public function validate(array $validationSubject)
    {
        if (!isset($validationSubject['currency'])) {
            return $this->createResult(true);
        }
        $currencyCode = $validationSubject['currency'];

        $allowedCurrencies = explode(',', $this->config->getValue('allowed_currencies'));

        if (!$currencyCode || !in_array($currencyCode, $allowedCurrencies)) {
            return $this->createResult(false);
        }

        return $this->createResult(true);
    }
}

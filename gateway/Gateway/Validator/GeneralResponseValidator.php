<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Gateway\Validator;

use Magento\Payment\Gateway\Validator\AbstractValidator;

/**
 * Class GeneralResponseValidator
 */
class GeneralResponseValidator extends AbstractValidator
{
    /**
     * @inheritdoc
     */
    public function validate(array $validationSubject)
    {
        $response = $validationSubject['response'];

        $isValid = true;
        $errorMessages = [];

        foreach ($this->getResponseValidators() as $validator) {
            $validationResult = $validator($response);

            if (!$validationResult[0]) {
                $isValid = $validationResult[0];
                $this->addErrorMessages($errorMessages, $validationResult);
            }
        }

        return $this->createResult($isValid, $errorMessages);
    }

    /**
     * @param array $errorMessages
     * @param array $validationResult
     */
    private function addErrorMessages(array &$errorMessages, $validationResult)
    {
        $errorMessages = array_merge($errorMessages, $validationResult[1]);
    }

    /**
     * @return array
     */
    private function getResponseValidators()
    {
        return [
            function ($response) {
                return [
                    isset($response['transaction_id']),
                    [__('LiqPay Transaction ID is missing in the response')]
                ];
            },
            function ($response) {
                return [
                    isset($response['public_key']),
                    [__('LiqPay Public Key is missing in the response')]
                ];
            },
            function ($response) {
                return [
                    isset($response['status']) && in_array($response['status'], ['success', 'reserved']),
                    [__('LiqPay server returned an error in the response')]
                ];
            },
        ];
    }
}

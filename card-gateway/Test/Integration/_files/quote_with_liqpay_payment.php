<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

require __DIR__ . '/quote_with_address.php';

use Magento\Quote\Model\Quote;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Quote\Model\Quote\Address\Rate;
use Magento\Quote\Model\QuoteIdMaskFactory;
use Magento\Quote\Model\QuoteIdMask;

/** @var Quote $quote */

/** @var $rate Rate */
$rate = Bootstrap::getObjectManager()->create(Rate::class);
$rate->setCode('freeshipping_freeshipping');
$rate->getPrice(1);

$quote->getShippingAddress()->setShippingMethod('freeshipping_freeshipping');
$quote->getShippingAddress()->addShippingRate($rate);
$quote->getPayment()->setMethod('pronko_liqpay');
$quote->getPayment()->setAdditionalInformation('cc_number', '4242424242424242');
$quote->getPayment()->setAdditionalInformation('cc_exp_year', '30');
$quote->getPayment()->setAdditionalInformation('cc_exp_month', '11');
$quote->getPayment()->setAdditionalInformation('cc_type', 'VI');

$quote->collectTotals();
$quote->save();
$quote->getPayment()->setMethod('pronko_liqpay');

/** @var QuoteIdMask $quoteIdMask */
$quoteIdMask = Bootstrap::getObjectManager()
    ->create(QuoteIdMaskFactory::class)
    ->create();
$quoteIdMask->setQuoteId($quote->getId());
$quoteIdMask->setDataChanges(true);
$quoteIdMask->save();

<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayGateway\Test\Integration\Gateway;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Quote\Api\GuestCartManagementInterface;
use Magento\Quote\Model\Quote;
use Magento\Quote\Model\QuoteIdMask;
use Magento\Quote\Model\QuoteIdMaskFactory;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\OrderRepository;
use PHPUnit\Framework\TestCase;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Checkout\Model\Session as CheckoutSession;
use Pronko\LiqPayApi\Api\Data\PaymentMethodCodeInterface;
use Pronko\LiqPaySdk\Api\ResponseFieldsInterface;
use Pronko\LiqPayGateway\Gateway\Config;

/**
 * Class RequestTest
 */
class RequestTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @var CartRepositoryInterface
     */
    private $quoteRepository;

    /**
     * @var QuoteIdMaskFactory
     */
    private $quoteIdMaskFactory;

    protected function setUp()
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->quoteRepository = $this->objectManager->create(CartRepositoryInterface::class);
        $this->quoteIdMaskFactory = $this->objectManager->create(QuoteIdMaskFactory::class);
    }

    /**
     * @magentoAppArea frontend
     * @magentoAppIsolation enabled
     */
    public function testConfig()
    {
        /** @var Config $config */
        $config = $this->objectManager->create(Config::class);

        $this->assertNotEmpty($config->getPublicKey());
        $this->assertNotEmpty($config->getPrivateKey());
    }

    /**
     * @magentoAppArea frontend
     * @magentoAppIsolation enabled
     * @magentoConfigFixture current_store payment/pronko_liqpay/title LiqPay payment method under test
     * @magentoConfigFixture current_store payment/pronko_liqpay/mode sandbox
     * @magentoConfigFixture current_store payment/pronko_liqpay/payment_action authorize_capture
     * @magentoDataFixture ../../../../app/code/Pronko/LiqPayCardGateway/Test/Integration/_files/quote_with_liqpay_payment.php
     */
    public function testExecutePay()
    {
        $customerEmail = 'testliqpaycustomer@example.com';

        $cartId = $this->getCartId($customerEmail);

        /** @var GuestCartManagementInterface $cartManagement */
        $cartManagement = $this->objectManager->get(GuestCartManagementInterface::class);
        $orderId = $cartManagement->placeOrder($cartId);
        /** @var OrderInterface $order */
        $order = $this->objectManager->get(OrderRepository::class)->get($orderId);

        $payment = $order->getPayment();

        $this->assertEquals(Order::STATE_PROCESSING, $order->getStatus());
        $this->assertEquals(Order::STATE_PROCESSING, $order->getState());

        $this->assertEquals(PaymentMethodCodeInterface::CODE, $payment->getMethod());

        $paymentInfo = $payment->getAdditionalInformation();

        $this->assertArrayHasKey(ResponseFieldsInterface::ACQUIRER_ID, $paymentInfo);
        $this->assertArrayHasKey(ResponseFieldsInterface::ORDER_ID, $paymentInfo);
        $this->assertArrayHasKey(ResponseFieldsInterface::LIQPAY_ORDER_ID, $paymentInfo);
        $this->assertArrayHasKey(ResponseFieldsInterface::ACTION, $paymentInfo);
        $this->assertEquals("LiqPay payment method under test", $paymentInfo['method_title']);
    }

    /**
     * @magentoAppArea frontend
     * @magentoAppIsolation enabled
     * @magentoConfigFixture current_store payment/pronko_liqpay/title LiqPay payment method under test
     * @magentoConfigFixture current_store payment/pronko_liqpay/mode sandbox
     * @magentoConfigFixture current_store payment/pronko_liqpay/payment_action authorize
     * @magentoDataFixture ../../../../app/code/Pronko/LiqPayCardGateway/Test/Integration/_files/quote_with_liqpay_payment.php
     */
    public function testExecuteAuth()
    {
        $customerEmail = 'testliqpaycustomer@example.com';

        $cartId = $this->getCartId($customerEmail);

        /** @var GuestCartManagementInterface $cartManagement */
        $cartManagement = $this->objectManager->get(GuestCartManagementInterface::class);
        $orderId = $cartManagement->placeOrder($cartId);
        /** @var OrderInterface $order */
        $order = $this->objectManager->get(OrderRepository::class)->get($orderId);

        $payment = $order->getPayment();

        $this->assertEquals(Order::STATE_PROCESSING, $order->getStatus());
        $this->assertEquals(Order::STATE_PROCESSING, $order->getState());

        $this->assertEquals(PaymentMethodCodeInterface::CODE, $payment->getMethod());

        $paymentInfo = $payment->getAdditionalInformation();

        $this->assertArrayHasKey(ResponseFieldsInterface::ACQUIRER_ID, $paymentInfo);
        $this->assertArrayHasKey(ResponseFieldsInterface::ORDER_ID, $paymentInfo);
        $this->assertArrayHasKey(ResponseFieldsInterface::LIQPAY_ORDER_ID, $paymentInfo);
        $this->assertArrayHasKey(ResponseFieldsInterface::ACTION, $paymentInfo);
        $this->assertEquals("LiqPay payment method under test", $paymentInfo['method_title']);
    }

    /**
     * @param string $customerEmail
     * @return string
     */
    private function getCartId(string $customerEmail): string
    {
        $quote = $this->getQuote($customerEmail);

        /** @var $session CheckoutSession */
        $checkoutSession = $this->objectManager->get(CheckoutSession::class);
        $checkoutSession->setQuoteId($quote->getId());

        /** @var QuoteIdMask $quoteIdMask */
        $quoteIdMask = $this->quoteIdMaskFactory->create();
        $quoteIdMask->load($quote->getId(), 'quote_id');
        return $quoteIdMask->getMaskedId();
    }

    /**
     * @param string $customerEmail
     * @return Quote
     */
    private function getQuote(string $customerEmail): Quote
    {
        /** @var SearchCriteriaBuilder $searchCriteriaBuilder */
        $searchCriteriaBuilder = $this->objectManager->get(SearchCriteriaBuilder::class);
        $searchCriteria = $searchCriteriaBuilder
            ->addFilter('customer_email', $customerEmail)
            ->create();

        $items = $this->quoteRepository->getList($searchCriteria)->getItems();

        return array_pop($items);
    }
}

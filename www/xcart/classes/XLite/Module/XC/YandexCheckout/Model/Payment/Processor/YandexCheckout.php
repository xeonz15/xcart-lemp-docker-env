<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\Model\Payment\Processor;

use XLite\Core\Cache\ExecuteCachedTrait;
use XLite\Core\Exception\PaymentProcessing\CallbackNotReady;
use XLite\Core\Request;
use XLite\Core\TopMessage;
use XLite\Model\Cart;
use XLite\Model\Payment\BackendTransaction;
use XLite\Model\Payment\Method;
use XLite\Model\Payment\Transaction;
use XLite\Module\XC\YandexCheckout\Core\APIException;
use XLite\Module\XC\YandexCheckout\Core\MWSAPI;
use XLite\Module\XC\YandexCheckout\Model\TaxClass;
use YandexCheckout\Client;
use YandexCheckout\Model\Confirmation\ConfirmationRedirect;
use YandexCheckout\Model\PaymentInterface;

/**
 * YandexMoney payment processor
 */
class YandexCheckout extends \XLite\Model\Payment\Base\Online
{
    use ExecuteCachedTrait;

    const OPERATION_SALE = 'sale';
    const OPERATION_AUTH = 'auth';

    /**
     * Allowed currencies codes
     *
     * @var array
     */
    protected $allowedCurrencies = ['RUB'];

    /**
     * Get settings widget or template
     *
     * @return string Widget class name or template path
     */
    public function getSettingsWidget()
    {
        return '\XLite\Module\XC\YandexCheckout\View\Config';
    }

    /**
     * @return boolean
     */
    public function useDefaultSettingsFormButton()
    {
        return false;
    }

    /**
     * Returns the list of settings available for this payment processor
     *
     * @return array
     */
    public function getAvailableSettings()
    {
        return [
            'type',
            'scid',
            'shopId',
            'sendReceiptData',
            'prefix',
            'defaultVATRate'
        ];
    }

    /**
     * Get payment method admin zone icon URL
     *
     * @param Method $method Payment method
     *
     * @return string
     */
    public function getAdminIconURL(Method $method)
    {
        return true;
    }

    /**
     * Get URL if check order succeed
     *
     * @return string
     */
    protected function getYandexMoneyCallbackUrl()
    {
        return \XLite::getInstance()->getShopURL(
            \XLite\Core\Converter::buildURL('callback', '', [], \XLite::getCustomerScript()),
            \XLite\Core\Config::getInstance()->Security->customer_security
        );
    }

    /**
     * Get allowed backend transactions
     *
     * @return string[] Status code
     */
    public function getAllowedTransactions()
    {
        return [
            BackendTransaction::TRAN_TYPE_REFUND,
            BackendTransaction::TRAN_TYPE_CAPTURE,
            BackendTransaction::TRAN_TYPE_VOID
        ];
    }

    /**
     * Get initial transaction type (used when customer places order)
     *
     * @param Method $method Payment method object OPTIONAL
     *
     * @return string
     */
    public function getInitialTransactionType($method = null)
    {
        return self::OPERATION_AUTH === ($method ? $method->getSetting('type') : $this->getSetting('type'))
            ? BackendTransaction::TRAN_TYPE_AUTH
            : BackendTransaction::TRAN_TYPE_SALE;
    }

    /**
     * @return array
     */
    public static function getMethodNames()
    {
        return [
            'YandexCheckout'                => '',
            'YandexCheckout.bank_card'      => 'bank_card',
            'YandexCheckout.yandex_money'   => 'yandex_money',
            'YandexCheckout.mobile_balance' => 'mobile_balance',
            'YandexCheckout.cash'           => 'cash',
            'YandexCheckout.webmoney'       => 'webmoney',
            'YandexCheckout.sberbank'       => 'sberbank',
            'YandexCheckout.qiwi'           => 'qiwi',
            'YandexCheckout.alfabank'       => 'alfabank'
        ];
    }

    /**
     * @return array
     */
    public static function getExternalConfirmationMethods()
    {
        return [
            'YandexCheckout.mobile_balance',
            'YandexCheckout.sberbank',
            'YandexCheckout.alfabank'
        ];
    }

    /**
     * @return array
     */
    public static function getRefundableMethods()
    {
        return [
            'YandexCheckout.bank_card',
            'YandexCheckout.yandex_money',
            'YandexCheckout.webmoney',
            'YandexCheckout.qiwi',
            'YandexCheckout.sberbank',
            'YandexCheckout.alfabank'
        ];
    }

    /**
     * Check - payment method is configured or not
     *
     * @param Method $method Payment method
     *
     * @return boolean
     */
    public function isConfigured(Method $method)
    {
        return parent::isConfigured($method)
            && $method->getSetting('shopId')
            && $method->getSetting('scid');
    }

    /**
     * Do initial payment
     *
     * @return string Status code
     */
    protected function doInitialPayment()
    {
        $result = static::FAILED;

        try {
            $client = $this->getApiClient();
            $data = $this->getInitialPaymentData();

            $payment = $client->createPayment(
                $data
            );

            self::log([
                'message' => 'Creating initial payment',
                'request' => $data,
                'response' => $payment->jsonSerialize()
            ]);

            if ($payment->getId() && $payment->getConfirmation()) {
                $result = static::PROLONGATION;

                if ($this->transaction) {
                    $this->transaction->setDataCell('yandex_payment_id', $payment->getId(), 'Yandex.Checkout payment id', 'C');
                    $this->transaction->createBackendTransaction($this->getInitialTransactionType());
                }

                if ($payment->getConfirmation()->getType() === 'redirect') {
                    /** @var ConfirmationRedirect $confirmation */
                    $confirmation = $payment->getConfirmation();
                    $this->redirectToYandex($confirmation->getConfirmationUrl());

                    self::log([
                        'message' => 'Redirecting to Yandex',
                        'url'     => $confirmation->getConfirmationUrl()
                    ]);
                }
            }

        } catch (\Exception $e) {
            $this->transaction->setNote($e->getMessage());
            $this->transaction->setDataCell('status', $e->getMessage());
        }

        return $result;
    }

    /**
     * @return array
     */
    protected function getInitialPaymentData()
    {
        $result = [
            'description'  => (string) $this->getPaymentDescription(),
            'amount'       => [
                'value'    => $this->transaction->getValue(),
                'currency' => $this->transaction->getCurrency()->getCode()
            ],
            'confirmation' => $this->getConfirmation()
        ];

        if ($this->getSetting('type') === static::OPERATION_SALE) {
            $result['capture'] = true;
        }

        $methodName = $this->transaction->getPaymentMethod()->getServiceName();

        if ($methodName !== 'YandexCheckout' && array_key_exists($methodName, static::getMethodNames())) {
            $type = static::getMethodNames()[$methodName];
            $result['payment_method_data'] = [
                'type' => $type
            ];

            $address = $this->getProfile()->getBillingAddress();
            if (in_array($type, ['mobile_balance', 'sberbank', 'cash', 'qiwi'], true)) {
                $result['payment_method_data']['phone'] = $address && $address->getPhone()
                ? $address->getPhone() : '';
            }
        }

        if ($this->getSetting('sendReceiptData')) {
            $data = $this->getReceiptData($this->transaction->getOrder(), $this->transaction->getValue());

            $result['receipt'] = $data['receipt'];
            $result['amount']['value'] = $data['correctedSum'];
        }

        return $result;
    }

    /**
     * @return string
     */
    protected function getPaymentDescription()
    {
        $shopName = \XLite\Core\Config::getInstance()->Company->company_name;
        return static::t('Order payment [id] for [store]', ['id' => $this->transaction->getPublicId(), 'store' => $shopName]);
    }

    /**
     * @return array
     */
    protected function getConfirmation()
    {
        $methodName = $this->transaction->getPaymentMethod()->getServiceName();

        if (in_array($methodName, static::getExternalConfirmationMethods(), true)) {
            return [
                'type' => 'external'
            ];
        }

        return [
            'type'       => 'redirect',
            'return_url' => $this->getReturnURL(static::RETURN_TXN_ID, true)
        ];
    }

    /**
     * Process return
     *
     * @param Transaction $transaction Return-owner transaction
     *
     * @return void
     * @throws \Exception
     */
    public function processReturn(Transaction $transaction)
    {
        parent::processReturn($transaction);

        $this->tryProcessTransaction($transaction, $this->getPaymentIdByTransaction($transaction));
    }

    /**
     * @param Transaction $transaction
     * @return string
     */
    protected function getPaymentIdByTransaction(Transaction $transaction)
    {
        $cell = $transaction->getDataCell('yandex_payment_id');

        return $cell ? $cell->getValue() : null;
    }

    /**
     * Get callback owner transaction
     *
     * @return \XLite\Model\Payment\Transaction
     */
    public function getCallbackOwnerTransaction()
    {
        $transaction = null;
        $requestData = json_decode(file_get_contents('php://input'));

        if ($requestData->object) {
            $transaction = \XLite\Core\Database::getRepo('XLite\Model\Payment\Transaction')
                ->findOneByCell('yandex_payment_id', $requestData->object->id);
        }

        return $transaction;
    }

    /**
     * Process return
     *
     * @param Transaction $transaction Return-owner transaction
     *
     * @return void
     * @throws CallbackNotReady
     * @throws \Exception
     */
    public function processCallback(Transaction $transaction)
    {
        parent::processCallback($transaction);

        if ($this->canProcessCallback($transaction)) {
            $this->tryProcessTransaction($transaction, $this->getPaymentIdByTransaction($transaction));

            // Remove ttl for IPN requests
            if ($transaction->isEntityLocked(\XLite\Model\Payment\Transaction::LOCK_TYPE_IPN)) {
                $transaction->unsetEntityLock(\XLite\Model\Payment\Transaction::LOCK_TYPE_IPN);
            }
        } else {
            throw new \XLite\Core\Exception\PaymentProcessing\CallbackNotReady();
        }
    }

    /**
     * Check if we can process IPN right now or should receive it later
     *
     * @param \XLite\Model\Payment\Transaction $transaction Callback-owner transaction
     *
     * @return boolean
     */
    protected function canProcessCallback(\XLite\Model\Payment\Transaction $transaction)
    {
        $locked = $transaction->isEntityLocked(\XLite\Model\Payment\Transaction::LOCK_TYPE_IPN);
        $result = $transaction->isEntityLockExpired(\XLite\Model\Payment\Transaction::LOCK_TYPE_IPN)
            || !$locked;

        // Set ttl once when no payment return happened yet
        if (!$locked && !$this->isOrderProcessed($transaction)) {
            $transaction->setEntityLock(\XLite\Model\Payment\Transaction::LOCK_TYPE_IPN);
            $result = false;
        }

        return $result;
    }

    /**
     * Checks if the order of transaction is already processed and is available for IPN receiving
     *
     * @param \XLite\Model\Payment\Transaction $transaction
     * @return bool
     */
    protected function isOrderProcessed(\XLite\Model\Payment\Transaction $transaction)
    {
        return !($transaction->getOrder() instanceof Cart);
    }

    /**
     * @inheritdoc
     */
    public function processCallbackNotReady(\XLite\Model\Payment\Transaction $transaction)
    {
        parent::processCallbackNotReady($transaction);

        header('HTTP/1.1 409 Conflict', true, 409);
        header('Status: 409 Conflict');
        header('X-Robots-Tag: noindex, nofollow');
    }

    /**
     * Log callback
     *
     * @param array $list Callback data
     */
    protected function logCallback(array $list)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        parent::logCallback($data);
    }

    /**
     * @param Transaction $transaction
     * @param string $paymentId
     * @throws \Exception
     */
    protected function tryProcessTransaction(Transaction $transaction, $paymentId)
    {
        $client = $this->getApiClient();

        try {
            $object = $client->getPaymentInfo($paymentId);
            $isProcessed = $transaction->getDataCell('transaction_processed');

            if ($this->isPaymentCanceled($object)) {
                self::log([
                    'message'     => 'Payment has been canceled by Yandex or customer',
                    'transaction' => $transaction->getPublicId(),
                    'paymentId'   => $paymentId,
                    'state'       => $object->jsonSerialize()
                ]);
                $transaction->setDataCell('transaction_processed', true, 'Is processed', 'A');
                $transaction->setStatus(Transaction::STATUS_FAILED);
                $backendTransaction = $transaction->getInitialBackendTransaction();

                if ($backendTransaction) {
                    $backendTransaction->setStatus($backendTransaction::STATUS_FAILED);
                }

            } elseif (!$isProcessed && $this->isPaymentSuccessful($object)) {
                self::log([
                    'message'     => 'Processing Yandex payment',
                    'transaction' => $transaction->getPublicId(),
                    'paymentId'   => $paymentId,
                    'state'       => $object->jsonSerialize()
                ]);

                $transaction->setValue($object->getAmount()->getValue());
                $transaction->setStatus(Transaction::STATUS_SUCCESS);
                $transaction->setDataCell('transaction_processed', true, 'Is processed', 'A');

                $backendTransaction = $transaction->getInitialBackendTransaction();
                if ($backendTransaction) {
                    $backendTransaction->setStatus($backendTransaction::STATUS_SUCCESS);
                }
            }
        } catch (\Exception $e) {
            $transaction->setStatus(Transaction::STATUS_FAILED);

            self::log([
                'message'          => 'Yandex notification processing failed',
                'exceptionMessage' => $e->getMessage(),
            ]);
        }

        $transaction->registerTransactionInOrderHistory('callback');

        \XLite\Core\Database::getEM()->flush();
    }

    /**
     * @param PaymentInterface $object
     * @return mixed
     */
    protected function isPaymentCanceled($object)
    {
        return $object->getStatus() === 'canceled';
    }

    /**
     * @param PaymentInterface $object
     * @return mixed
     */
    protected function isPaymentSuccessful($object)
    {
        return $object->getStatus() === 'waiting_for_capture' || $object->getStatus() === 'succeeded';
    }

    /**
     * @param Transaction $transaction
     *
     * @return boolean
     */
    protected function isRefundTransactionAllowed(Transaction $transaction)
    {
        $paymentMethod = $transaction->getPaymentMethod();

        return $paymentMethod
            && $transaction->isRefundTransactionAllowed()
            && $transaction->getDetail('yandex_payment_id')
            && in_array($paymentMethod->getServiceName(), static::getRefundableMethods(), true);
    }

    /**
     * @param BackendTransaction $transaction Transaction
     *
     * @return boolean
     */
    protected function doRefund(BackendTransaction $transaction)
    {
        $result = false;
        $paymentTransaction = $transaction->getPaymentTransaction();
        $paymentId = $this->getPaymentIdByTransaction($paymentTransaction);

        $client = $this->getApiClient();

        try {
            $response = $client->createRefund([
                'amount'     => [
                    'value'    => $transaction->getValue(),
                    'currency' => $paymentTransaction->getCurrency()->getCode()
                ],
                'payment_id' => $paymentId
            ]);

            // TODO: Separate succeeded and pending refunds when Yandex.Checkout will start sending proper notifications
            if ($response) {
                $transaction->setStatus(BackendTransaction::STATUS_SUCCESS);
                TopMessage::getInstance()->addInfo('Payment has been refunded successfully');

                self::log([
                    'message'   => 'Payment has been refunded',
                    'paymentId' => $paymentId,
                    'response'  => $response->jsonSerialize()
                ]);

                $result = true;
            }
        } catch (\Exception $e) {
            static::log([
                'message'      => 'Failed to refund the payment',
                'errorMessage' => $e->getMessage(),
                'paymentId'    => $paymentId
            ]);
        }

        return $result;
    }


    /**
     * @param Transaction $transaction
     *
     * @return boolean
     */
    protected function isCaptureTransactionAllowed(Transaction $transaction)
    {
        $paymentMethod = $transaction->getPaymentMethod();

        return $paymentMethod
            && $transaction->isCaptureTransactionAllowed()
            && $transaction->getDetail('yandex_payment_id');
    }

    /**
     * @param BackendTransaction $transaction Transaction
     *
     * @return boolean
     */
    protected function doCapture(BackendTransaction $transaction)
    {
        $result = false;
        $paymentTransaction = $transaction->getPaymentTransaction();
        $paymentId = $this->getPaymentIdByTransaction($paymentTransaction);

        $client = $this->getApiClient();

        try {
            $response = $client->capturePayment([
                'amount' => [
                    'value'    => $transaction->getValue(),
                    'currency' => $paymentTransaction->getCurrency()->getCode()
                ]
            ], $paymentId);

            if ($response && $response->getStatus() === 'succeeded') {
                $transaction->setStatus(BackendTransaction::STATUS_SUCCESS);
                TopMessage::getInstance()->addInfo('Payment has been captured successfully');

                static::log([
                    'message'   => 'Payment has been captured',
                    'paymentId' => $paymentId,
                    'response'  => $response->jsonSerialize()
                ]);

                $result = true;
            }
        } catch (\Exception $e) {
            TopMessage::getInstance()->addInfo('Failed to capture the payment');

            static::log([
                'message'      => 'Failed to capture the payment',
                'errorMessage' => $e->getMessage(),
                'paymentId'    => $paymentId
            ]);
        }

        return $result;
    }

    /**
     * @param Transaction $transaction
     *
     * @return boolean
     */
    protected function isVoidTransactionAllowed(Transaction $transaction)
    {
        $paymentMethod = $transaction->getPaymentMethod();

        return $paymentMethod
            && $transaction->isVoidTransactionAllowed()
            && $transaction->getDetail('yandex_payment_id');
    }

    /**
     * @param BackendTransaction $transaction Transaction
     *
     * @return boolean
     */
    protected function doVoid(BackendTransaction $transaction)
    {
        $result = false;
        $paymentTransaction = $transaction->getPaymentTransaction();
        $paymentId = $this->getPaymentIdByTransaction($paymentTransaction);

        $client = $this->getApiClient();

        try {
            $response = $client->cancelPayment($paymentId);

            // TODO: Separate succeeded and pending voids when Yandex.Checkout will start sending proper notifications
            if ($response) {
                $transaction->setStatus(BackendTransaction::STATUS_SUCCESS);
                $paymentTransaction->setStatus(Transaction::STATUS_VOID);
                TopMessage::getInstance()->addInfo('Payment has been canceled');

                static::log([
                    'message'   => 'Payment has been canceled',
                    'paymentId' => $paymentId,
                    'response'  => $response->jsonSerialize()
                ]);

                $result = true;
            }
        } catch (\Exception $e) {
            TopMessage::getInstance()->addInfo('Failed to cancel the payment');

            static::log([
                'message'      => 'Failed to cancel the payment',
                'errorMessage' => $e->getMessage(),
                'paymentId'    => $paymentId
            ]);
        }

        return $result;
    }

    /**
     * Return formatted price.
     *
     * @param float $price Price value
     *
     * @return string
     */
    protected function getFormattedPrice($price)
    {
        return sprintf('%.2f', round((double)($price) + 0.00000000001, 2));
    }

    /**
     * @param \XLite\Model\Order $order
     * @param float $transactionValue
     *
     * @return array
     */
    protected function getReceiptData($order, $transactionValue)
    {
        $result = [];
        $currency = $order->getCurrency();

        $profile = $order->getProfile();
        $email = $profile->getEmail();

        if ($email) {
            $result['email'] = $email;
        }

        $shouldUsePhone = $this->getCustomerContactMode() === 'phone'
            && $profile->getBillingAddress()
            && $profile->getBillingAddress()->getPhone();
        if ($shouldUsePhone || !$email) {
            $phone = $profile->getBillingAddress()->getPhone();
            $result['phone'] = preg_replace('/[^0-9]+/', '', $phone) ?: $phone;
            unset($result['email']);
        }

        $sum = 0;

        $items = [];

        foreach ($order->getItems() as $item) {
            $taxClass = $item->getProduct()->getTaxClass();

            $tax = $taxClass && $taxClass->getYandexMoneyVATRate()
                ? $taxClass->getYandexMoneyVATRate()
                : (int)$this->getSetting('defaultVATRate');

            $discount = $item->getNetPrice() * $item->getAmount() - $item->getDiscountedSubtotal();
            $price = $this->getFormattedPrice(($item->getSubtotal() - $discount) / $item->getAmount());

            $sum += (float)$price * $item->getAmount();

            if ($price > 0.001) {
                $items[] = [
                    'quantity'    => (float)$item->getAmount(),
                    'amount'      => [
                        'value'    => $this->getFormattedPrice($price),
                        'currency' => $currency->getCode()
                    ],
                    'vat_code'    => $tax,
                    'description' => $item->getName(),
                    'payment_mode' => 'full_payment',
                    'payment_subject' => $item->getProduct()->getYMPaymentSubject() ?: \XLite\Model\Product::YM_DEFAULT_SUBJECT,
                ];
            }
        }

        $excludedSurcharges = $this->getExcludedFromReceiptSurcharges();

        foreach ($this->getOrder()->getSurchargeTotals() as $surcharge) {
            if ((isset($surcharge['object']) && $surcharge['object']->getType() === \XLite\Model\Base\Surcharge::TYPE_DISCOUNT)
                || in_array($surcharge['code'], $excludedSurcharges, true)
            ) {
                continue;
            }

            $amount = $this->getFormattedPrice($surcharge['cost']);
            $sum += (float)$amount;

            $tax = TaxClass::VAT_NONE;

            if ($surcharge['code'] === 'SHIPPING') {
                $method = $order->getModifier(\XLite\Model\Base\Surcharge::TYPE_SHIPPING, 'SHIPPING')->getMethod();
                $taxClass = $method->getTaxClass();
                $tax = $taxClass && $taxClass->getYandexMoneyVATRate()
                    ? $taxClass->getYandexMoneyVATRate()
                    : (int)$this->getSetting('defaultVATRate');
            }

            if ($amount > 0.001) {
                $items[] = [
                    'quantity'    => '1.00',
                    'amount'      => [
                        'value'    => (string) $amount,
                        'currency' => $currency->getCode()
                    ],
                    'vat_code'    => $tax,
                    'description' => $surcharge['name'],
                    'payment_mode' => 'full_payment',
                    'payment_subject' => 'another',
                ];
            }
        }

        $result['items'] = $items;

        $correctedSum = abs($sum - $transactionValue) < 0.05
            ? max($sum, $transactionValue)
            : $transactionValue;

        return [
            'receipt'      => $result,
            'correctedSum' => $correctedSum
        ];
    }

    /**
     * @return array
     */
    protected function getExcludedFromReceiptSurcharges()
    {
        return [
            'DISCOUNT',
            'DCOUPON'
        ];
    }

    /**
     * @return string
     */
    protected function getShopId()
    {
        return $this->getSetting('shopId');
    }

    /**
     * @return string
     */
    protected function getSCID()
    {
        return $this->getSetting('scid');
    }

    /**
     * @return string
     */
    protected function getCustomerContactMode()
    {
        return $this->getSetting('customerContactMode');
    }

    /**
     * Redirect customer to Yandex
     *
     * @param string $url Url
     *
     * @return void
     */
    protected function redirectToYandex($url)
    {
        $page = <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body onload="self.location = '$url';">
</body>
</html>
HTML;

        print ($page);
    }

    /**
     * Get allowed currencies
     *
     * @param Method $method Payment method
     *
     * @return array
     */
    protected function getAllowedCurrencies(Method $method)
    {
        return $this->allowedCurrencies;
    }

    /**
     * @return Client
     */
    public function getApiClient()
    {
        if (!isset($this->api)) {
            require_once LC_DIR_MODULES . 'XC' . LC_DS . 'YandexCheckout' . LC_DS . 'lib' . LC_DS . 'autoload.php';

            $this->api = new Client();
            $this->api->setAuth(
                $this->getShopId(),
                $this->getSCID()
            );
        }

        return $this->api;
    }

    /**
     * Logging the data under YandexMoney
     * Available if developer_mode is on in the config file
     *
     * @param mixed $data Log data
     *
     * @return void
     */
    protected static function log($data)
    {
        if (LC_DEVELOPER_MODE) {
            \XLite\Logger::logCustom('YandexCheckout', $data);
        }
    }
}

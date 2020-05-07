<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Robokassa\Model\Payment\Processor;

use Includes\Utils\URLManager;
use XLite\Core\Database;
use XLite\Core\Request;
use XLite\Core\Translation;
use XLite\Model\Payment\Method;
use XLite\Model\Payment\Transaction;
use XLite\Model\Order;

/**
 * Robokassa payment processor
 */
class Robokassa extends \XLite\Model\Payment\Base\WebBased
{
    /**
     * Form URL for "test" mode
     */
    const FORM_URL_TEST = 'https://auth.robokassa.ru/Merchant/Index.aspx';

    /**
     * Form URL for "live" mode
     */
    const FORM_URL_LIVE = 'https://auth.robokassa.ru/Merchant/Index.aspx';

    /**
     * POST URL for "test" mode
     */
    const POST_FORM_URL_TEST = 'http://test.robokassa.ru/WebService/Service.asmx/OpState';

    /**
     * POST URL for "live" mode
     */
    const POST_FORM_URL_LIVE = 'https://merchant.roboxchange.com/WebService/Service.asmx/OpState';

    /**
     * Public invoice id length
     */
    const PUBLIC_TOKEN_LENGTH = 3;

    /**
     * Allowed currencies codes
     *
     * @var array
     */
    protected $allowedCurrencies = ['RUB'];

    /**
     * stateCode - operation current state code. Possible values:
     * 5 - initiated, payment is not received by the service
     * 10 - payment was not received, operation canceled
     * 50 - payment received, payment is transferred to the merchant account
     * 60 - payment was returned to payer after it was received
     * 80 - operation execution is suspended
     * 100 - operation completed successfully
     *
     * @var array
     */
    protected $stateCodes = [
        5   => Transaction::STATUS_INITIALIZED,
        10  => Transaction::STATUS_CANCELED,
        50  => Transaction::STATUS_INPROGRESS,
        60  => Transaction::STATUS_FAILED,
        80  => Transaction::STATUS_PENDING,
        100 => Transaction::STATUS_SUCCESS,
    ];

    /**
     * Get settings widget or template
     *
     * @return string Widget class name or template path
     */
    public function getSettingsWidget()
    {
        return 'modules/XC/Robokassa/config.twig';
    }

    /**
     * Returns the list of settings available for this payment processor
     *
     * @return array
     */
    public function getAvailableSettings()
    {
        return [
            'login',
            'password1',
            'password2',
            'language',
            'currency',
            'mode',
            'prefix',
            'defaultVATRate',
            'taxationSystem',
        ];
    }

    /**
     * Check - payment method is configured or not
     *
     * @param \XLite\Model\Payment\Method $method Payment method
     *
     * @return boolean
     */
    public function isConfigured(Method $method)
    {
        return parent::isConfigured($method)
            && $method->getSetting('login')
            && $method->getSetting('password1')
            && $method->getSetting('password2');
    }

    /**
     * Payment method has settings into Module settings section
     *
     * @return boolean
     */
    public function hasModuleSettings()
    {
        return false;
    }

    /**
     * Get payment method admin zone icon URL
     *
     * @param \XLite\Model\Payment\Method $method Payment method
     *
     * @return string
     */
    public function getAdminIconURL(Method $method)
    {
        return true;
    }

    /**
     * Get callback URL for Robokassa payment method
     *
     * @return string
     */
    public function getRobokassaCallbackURL()
    {
        return URLManager::getShopURL(
            \Includes\Utils\Converter::buildURL('callback', 'callback', [], \XLite::getCustomerScript())
        );
    }

    /**
     * Get Success URL for Robokassa payment method
     *
     * @return string
     */
    public function getRobokassaSuccessURL()
    {
        return URLManager::getShopURL(
            \Includes\Utils\Converter::buildURL('payment_return', '', ['status' => 'success'], \XLite::getCustomerScript())
        );
    }

    /**
     * Get Fail URL for Robokassa payment method
     *
     * @return string
     */
    public function getRobokassaFailURL()
    {
        return URLManager::getShopURL(
            \Includes\Utils\Converter::buildURL('payment_return', '', ['status' => 'fail'], \XLite::getCustomerScript())
        );
    }

    /**
     * Detect transaction
     *
     * @return \XLite\Model\Payment\Transaction
     */
    public function getReturnOwnerTransaction()
    {
        return Request::getInstance()->Shp_ord
            ? Database::getRepo('XLite\Model\Payment\Transaction')->findOneBy(
                ['public_id' => Request::getInstance()->Shp_ord]
            )
            : null;
    }

    /**
     * Process return
     *
     * @param \XLite\Model\Payment\Transaction $transaction Return-owner transaction
     *
     * @return void
     */
    public function processReturn(Transaction $transaction)
    {
        parent::processReturn($transaction);

        $request = Request::getInstance();

        if ($this->transaction->getStatus() === $transaction::STATUS_INPROGRESS) {
            if ('fail' === $request->status) {
                $this->transaction->setStatus($transaction::STATUS_FAILED);

            } elseif ('success' === $request->status) {
                $this->transaction->setStatus($transaction::STATUS_SUCCESS);
            }
        }
    }

    /**
     * Get callback owner transaction or null
     *
     * @return \XLite\Model\Payment\Transaction
     */
    public function getCallbackOwnerTransaction()
    {
        return Request::getInstance()->Shp_ord
            ? Database::getRepo('XLite\Model\Payment\Transaction')->findOneBy(
                ['public_id' => Request::getInstance()->Shp_ord]
            )
            : null;
    }

    /**
     * Process callback
     *
     * @param \XLite\Model\Payment\Transaction $transaction Callback-owner transaction
     *
     * @return void
     */
    public function processCallback(Transaction $transaction)
    {
        parent::processCallback($transaction);

        $request = Request::getInstance();

        $signature = strtoupper(
            md5(
                $request->OutSum
                . ':' . $request->InvId
                . ':' . $this->getSetting('password2')
                . ':Shp_ord=' . $request->Shp_ord
            )
        );

        $transactionNote = 'InvId: ' . $request->InvId
            . '; Shp_ord: ' . $request->InvId
            . '; SignatureValue: ' . $request->SignatureValue
            . '; OutSum: ' . $request->OutSum
            . ';' . PHP_EOL;

        if ($signature !== $request->SignatureValue) {
            $transactionNote .= static::t('Transaction failed. Reason: Wrong sign');

            $this->transaction->setNote($transactionNote);
            $this->transaction->setStatus($transaction::STATUS_FAILED);

            $result = 'Wrong sign' . PHP_EOL;

        } else {
            $this->getTransactionState($transaction);

            $result = 'OK' . $request->InvId . PHP_EOL;
        }

        header('Content-Type: text/html');
        header('Content-Length: ' . strlen($result));

        echo($result);
    }

    /**
     * Convert transaction params to the string
     *
     * @param array $info Transaction params
     *
     * @return string
     */
    protected function convertTransactionInfoToString($info)
    {
        $transactionNote = '';

        foreach ($info as $k => $v) {
            if (is_string($v) && $v) {
                $transactionNote .= $k . ': ' . $v . '; ';
            }
        }

        return rtrim(rtrim($transactionNote), ';');
    }

    /**
     * Check transaction state
     *
     * @param \XLite\Model\Payment\Transaction $transaction Return-owner transaction
     *
     * @return void
     */
    protected function getTransactionState(Transaction $transaction)
    {
        $error = [];

        $request = Request::getInstance();

        $signature = md5($this->getSetting('login') . ':' . $request->InvId . ':' . $this->getSetting('password2'));

        $data = [
            'MerchantLogin' => $this->getSetting('login'),
            'InvoiceID'     => $request->InvId,
            'Signature'     => $signature,
        ];

        if ($this->isTestModeEnabled()) {
            $data['StateCode'] = 100;
        }

        $postURL = $this->getPostFormURL();

        $xmlRequest       = new \XLite\Core\HTTP\Request($postURL);
        $xmlRequest->body = $data;
        $xmlRequest->verb = 'POST';

        $response = $xmlRequest->sendRequest();

        if ($response->body) {
            $xml = \XLite\Core\XML::getInstance();

            $xmlParsed = $xml->parse($response->body, $error);

            $transactionNote = $this->transaction->getNote();

            if ($error) {
                $transactionNote .= static::t('Code') . ': ' . $error['code'] . '; '
                    . static::t('Description') . ': ' . $error['string'] . '; '
                    . static::t('Line') . ': ' . $error['line'] . ';' . PHP_EOL
                    . static::t('Result') . ': ' . $response->body;

                $this->transaction->setStatus($transaction::STATUS_FAILED);

            } else {
                $resultCode = $xml->getArrayByPath($xmlParsed, 'OperationStateResponse/Result/Code/0/#');

                if ('0' !== $resultCode) {
                    $resultDesc = $xml->getArrayByPath($xmlParsed, 'OperationStateResponse/Result/Description/0/#');

                    $transactionNote .= static::t('Code') . ': ' . $resultCode . '; '
                        . static::t('Result') . ': ' . $resultDesc;

                    $this->transaction->setStatus($transaction::STATUS_FAILED);

                } else {
                    $stateCode = $xml->getArrayByPath($xmlParsed, 'OperationStateResponse/State/Code/0/#');

                    $infoRoot = 'OperationStateResponse/Info/';
                    $info     = [
                        'IncCurrLabel' => $xml->getArrayByPath($xmlParsed, $infoRoot . 'IncCurrLabel/0/#'),
                        'IncSum'       => $xml->getArrayByPath($xmlParsed, $infoRoot . 'IncSum/0/#'),
                        'IncAccount'   => $xml->getArrayByPath($xmlParsed, $infoRoot . 'IncAccount/0/#'),
                        'PaymentMethodCode'
                                       => $xml->getArrayByPath($xmlParsed, $infoRoot . 'PaymentMethod/Code/0/#'),
                        'PaymentMethodDescription'
                                       => $xml->getArrayByPath($xmlParsed, $infoRoot . 'PaymentMethod/Description/0/#'),
                        'OutCurrLabel' => $xml->getArrayByPath($xmlParsed, $infoRoot . 'OutCurrLabel/0/#'),
                        'OutSum'       => $xml->getArrayByPath($xmlParsed, $infoRoot . 'OutSum/0/#'),
                    ];

                    if (0 < $stateCode
                        && array_key_exists($stateCode, $this->stateCodes)
                    ) {
                        $this->transaction->setStatus($this->stateCodes[$stateCode]);
                    }

                    $transactionNote .= static::t('Code') . ': ' . $stateCode . '; ';
                    $transactionNote .= $this->convertTransactionInfoToString($info);
                }
            }

            $this->transaction->setNote($transactionNote);
        }
    }

    /**
     * Return TRUE if the test mode is ON
     *
     * @return boolean
     */
    protected function isTestModeEnabled()
    {
        return $this->getSetting('mode') === 'test';
    }

    /**
     * Get payment form URL
     *
     * @return string
     */
    protected function getFormURL()
    {
        return $this->isTestModeEnabled()
            ? static::FORM_URL_TEST
            : static::FORM_URL_LIVE;
    }

    /**
     * Get POST form URL (for checking of the transaction status)
     *
     * @return string
     */
    protected function getPostFormURL()
    {
        return $this->isTestModeEnabled()
            ? static::POST_FORM_URL_TEST
            : static::POST_FORM_URL_LIVE;
    }

    /**
     * Get redirect form fields list
     *
     * @return array
     */
    protected function getFormFields()
    {
        $transactionId = $this->transaction->getTransactionId() . \XLite\Core\Operator::getInstance()->generateToken(
                static::PUBLIC_TOKEN_LENGTH,
                ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']
            );
        $this->transaction->setPublicId($transactionId);
        $orderNum = $this->getTransactionId();

        $paymentDesc = substr(Translation::lbl('Order X', ['id' => $orderNum]), 0, 100);

        $login     = $this->getSetting('login');
        $amount    = $this->transaction->getValue();
        $password1 = $this->getSetting('password1');

        $receipt = $this->getReceiptData($this->transaction->getOrder());
        $receipt = urlencode(json_encode($receipt));

        $signature = md5(
            $login
            . ':' . $amount
            . ':' . $orderNum
            . ':' . $receipt
            . ':' . $password1
            . ':' . 'Shp_ord=' . $transactionId
        );

        return [
            'MerchantLogin'  => $login,
            'OutSum'         => $amount,
            'InvId'          => $orderNum,
            'Receipt'        => $receipt,
            'Desc'           => $paymentDesc,
            'SignatureValue' => $signature,
            'Shp_ord'        => $transactionId,
            'IncCurrLabel'   => $this->getSetting('currency'),
            'Culture'        => $this->getSetting('language'),
            'IsTest'         => $this->isTestModeEnabled() ? '1' : '0',
        ];
    }

    /**
     * @param \XLite\Model\Order $order
     *
     * @return array
     */
    protected function getReceiptData($order)
    {
        $result = [
            'sno' => $this->getSetting('taxationSystem'),
        ];

        $currency = $this->getOrder()->getCurrency();
        $sum = 0;

        $items = [];
        foreach ($order->getItems() as $item) {
            $taxClass = $item->getProduct()->getTaxClass();
            $tax      = $taxClass && $taxClass->getRobokassaVATRate()
                ? $taxClass->getRobokassaVATRate()
                : $this->getSetting('defaultVATRate');

            $total = $currency->roundValue($item->getDiscountedSubtotal());
            $sum += $total;

            $items[] = [
                'name'     => $item->getName(),
                'quantity' => $item->getAmount(),
                'sum'      => $total,
                'tax'      => $tax,
            ];
        }

        $excludedSurcharges = $this->getExcludedFromReceiptSurcharges();

        foreach ($this->getOrder()->getSurchargeTotals() as $surcharge) {
            if ((isset($surcharge['object']) && $surcharge['object']->getType() === \XLite\Model\Base\Surcharge::TYPE_DISCOUNT)
                || in_array($surcharge['code'], $excludedSurcharges, true)
            ) {
                continue;
            }

            $amount = $currency->roundValue($surcharge['cost']);
            $sum += $amount;

            $tax = 'none';

            if ($surcharge['code'] === 'SHIPPING') {
                $method   = $order->getModifier(\XLite\Model\Base\Surcharge::TYPE_SHIPPING, 'SHIPPING')->getMethod();
                $taxClass = $method->getTaxClass();
                $tax      = $taxClass && $taxClass->getRobokassaVATRate()
                    ? $taxClass->getRobokassaVATRate()
                    : $this->getSetting('defaultVATRate');
            }

            $items[] = [
                'name'     => $surcharge['name'],
                'quantity' => '1',
                'sum'      => $amount,
                'tax'      => $tax,
            ];
        }

        $result['items'] = $items;

        return $result;
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
}

<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Webmoney\Model\Payment\Processor;

use XLite\Core\Config;
use XLite\Core\Converter;
use XLite\Core\Request;
use XLite\Core\Translation;
use XLite\Core\XML;
use XLite\Model\Payment\Method;
use XLite\Model\Payment\Transaction;
use XLite\Module\XC\Webmoney\Core\WMSigner;

/**
 * WebMoney payment processor
 */
class Webmoney extends \XLite\Model\Payment\Base\WebBased
{
    /**
     * Form URL
     */
    const FORM_URL = 'https://merchant.webmoney.ru/lmi/payment.asp';

    /**
     * Special purse used for signature checking
     */
    const SIGN_CHECK_WMID = '967909998006';

    /**
     * XML API endpoint
     */
    const XML_API_ENDPOINT = 'https://w3s.webmoney.ru/asp/XMLClassicAuth.asp';

    /**
     * Allowed currencies codes
     *
     * @var array
     */
    protected $allowedCurrencies = array('RUB', 'USD');

    /**
     * Get settings widget or template
     *
     * @return string Widget class name or template path
     */
    public function getSettingsWidget()
    {
        return 'modules/XC/Webmoney/config.twig';
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
        $result = parent::isConfigured($method)
            && $method->getSetting('purse')
            && $method->getSetting('secret_key');

        $signParams = $method->getSetting('wmid')
            && $method->getSetting('key_path')
            && $method->getSetting('key_password');

        return $result && ('SIGN' != $method->getSetting('hash_type') || $signParams);
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
     * Process return
     *
     * @param Transaction $transaction Return-owner transaction
     *
     * @return void
     */
    public function processReturn(Transaction $transaction)
    {
        parent::processReturn($transaction);

        $request = Request::getInstance();

        if ($this->transaction->getStatus() == $transaction::STATUS_INPROGRESS) {

            if ('fail' == $request->status) {
                $this->transaction->setStatus($transaction::STATUS_FAILED);

            } elseif ('success' == $request->status) {
                $this->transaction->setStatus($transaction::STATUS_PENDING);
            }
        }
    }

    /**
     * Process callback
     *
     * @param Transaction $transaction Callback-owner transaction
     *
     * @return void
     */
    public function processCallback(Transaction $transaction)
    {
        parent::processCallback($transaction);

        $request = Request::getInstance();

        $checkData = $this->getSetting('purse')
            . $request->LMI_PAYMENT_AMOUNT
            . $request->LMI_PAYMENT_NO
            . $request->LMI_MODE
            . $request->LMI_SYS_INVS_NO
            . $request->LMI_SYS_TRANS_NO
            . $request->LMI_SYS_TRANS_DATE
            . $this->getSetting('secret_key')
            . $request->LMI_PAYER_PURSE
            . $request->LMI_PAYER_WM
        ;

        switch ($this->getSetting('hash_type')) {
            case 'MD5':
                $checkSignatureMethod = 'checkMD5Signature';
                break;

            default:
            case 'SHA256':
                $checkSignatureMethod = 'checkSHA256Signature';
                break;

            case 'SIGN':
                $checkSignatureMethod = 'checkSignSignature';
                break;
        }

        $valid = call_user_func(array($this, $checkSignatureMethod), $checkData, $request->LMI_HASH);

        if ($valid) {
            if (
                $this->checkTotal($request->LMI_PAYMENT_AMOUNT)
                && $this->getSetting('purse') == $request->LMI_PAYEE_PURSE
            ) {
                $this->transaction->setStatus($transaction::STATUS_SUCCESS);

            } else {
                $this->transaction->setNote('Transaction failed. Reason: Possible hack attempt.');
                $this->transaction->setStatus($transaction::STATUS_FAILED);
            }
        }
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
     * Get payment form URL
     *
     * @return string
     */
    protected function getFormURL()
    {
        return static::FORM_URL;
    }

    /**
     * Get redirect form fields list
     *
     * @return array
     */
    protected function getFormFields()
    {
        $transactionId = $this->transaction->getPublicTxnId();
        $orderNum = $this->getTransactionId();

        $successUrl = \XLite::getInstance()->getShopURL(
            Converter::buildURL('payment_return', '', array('status' => 'success', 'txnId' => $transactionId)),
            Config::getInstance()->Security->customer_security
        );

        $failUrl = \XLite::getInstance()->getShopURL(
            Converter::buildURL('payment_return', '', array('status' => 'fail', 'txnId' => $transactionId)),
            Config::getInstance()->Security->customer_security
        );

        $callbackUrl = \XLite::getInstance()->getShopURL(
            Converter::buildURL('callback', 'callback', array()),
            Config::getInstance()->Security->customer_security
        );

        $paymentDesc = base64_encode(Translation::lbl('Order X', array('id' => $orderNum)));

        $result = array(
            'LMI_PAYEE_PURSE'       => $this->getSetting('purse'),
            'LMI_PAYMENT_AMOUNT'    => $this->transaction->getValue(),
            'LMI_PAYMENT_NO'        => $orderNum,
            'LMI_PAYMENT_DESC_BASE64' => $paymentDesc,
            'LMI_SIM_MODE'          => '0',
            'LMI_RESULT_URL'        => $callbackUrl,
            'LMI_SUCCESS_URL'       => $successUrl,
            'LMI_SUCCESS_METHOD'    => 1,
            'LMI_FAIL_URL'          => $failUrl,
            'LMI_FAIL_METHOD'       => 1,
            'txnId'                 => $transactionId,
        );

        return $result;
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
     * Checks MD5 signature validity
     *
     * @param string $checkData Data to sign
     * @param string $hash      Hash to verify
     *
     * @return boolean
     */
    protected function checkMD5Signature($checkData, $hash)
    {
        return strcasecmp(md5($checkData), $hash) == 0;
    }

    /**
     * Checks SHA256 signature validity
     *
     * @param string $checkData Data to sign
     * @param string $hash      Hash to verify
     *
     * @return boolean
     */
    protected function checkSHA256Signature($checkData, $hash)
    {
        return strcasecmp(hash('sha256', $checkData), $hash) == 0;
    }

    /**
     * Checks SIGN signature validity
     *
     * @param string $checkData Data to sign
     * @param string $hash      Hash to verify
     *
     * @return boolean
     */
    protected function checkSignSignature($checkData, $hash)
    {
        $result = false;

        try {
            $signer = new WMSigner(
                $this->getSetting('wmid'),
                array(
                    'file' => $this->getSetting('key_path'),
                    'pass' => $this->getSetting('key_password')
                )
            );

            $signCheckWmid = static::SIGN_CHECK_WMID;

            $signature = $signer->Sign($this->getSetting('wmid') . $signCheckWmid . $checkData . $hash);

            $xml = <<<XML
            <w3s.request>
                <wmid>{$this->getSetting('wmid')}</wmid>
                <sign>$signature</sign>
                <testsign>
                    <wmid>$signCheckWmid</wmid>
                    <plan>$checkData</plan>
                    <sign>$hash</sign>
                </testsign>
            </w3s.request>
XML;

            $xmlRequest = new \XLite\Core\HTTP\Request(static::XML_API_ENDPOINT);
            $xmlRequest->body = $xml;

            $xmlRequest->setAdditionalOption(CURLOPT_CAINFO, $this->getCertPath());

            $xmlResponse = $xmlRequest->sendRequest();

            if ($xmlResponse->code == '200') {
                /** @var $xmlParser XML */
                $xmlParser = XML::getInstance();

                $response = $xmlParser->parse($xmlResponse->body, $err);

                $result = $response['w3s.response']['#']['testsign']
                    && $response['w3s.response']['#']['testsign'][0]['#']['res']
                    && $response['w3s.response']['#']['testsign'][0]['#']['res'][0]['#'] == 'yes';
            }

        } catch (\Exception $e) {
            \XLite\Logger::getInstance()->log('WMSigner raised an exception: ' . $e->getMessage(), LOG_ERR);
        }

        return $result;
    }

    /**
     * Get certificate file full path
     *
     * @return string
     */
    protected function getCertPath()
    {
        return LC_DIR_CLASSES . implode(LC_DS, explode('/', 'XLite/Module/XC/Webmoney/WebMoneyCA.crt'));
    }
}

<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Qiwi\Core;

use XLite\Core\HTTP\Request;

/**
 * Qiwi REST API v2 client
 */
class QiwiREST extends \XLite\Base
{
    /**
     * REST API v2 endpoint
     */
    const API_ENDPOINT = 'https://w.qiwi.com/api/v2/prv/';

    /**
     * Possible callback authorization methods
     */
    const AUTH_METHOD_BASIC = 'basic';
    const AUTH_METHOD_SIGNATURE = 'signature';

    /**
     * Shop ID
     * 
     * @var   integer
     */
    protected $shopId;

    /**
     * API APP IUD 
     * 
     * @var   integer
     */
    protected $appId;

    /**
     * API APP Password 
     * 
     * @var   string
     */
    protected $appPassword;

    /**
     * Pull password
     *
     * @var   string
     */
    protected $pullPassword;

    /**
     * Result messages 
     * 
     * @var   array
     */
    protected $resultMessages = array(
        5    => 'Неверные данные в параметрах запроса',
        13   => 'Сервер занят, повторите запрос позже',
        78   => 'Недопустимая операция',
        150  => 'Ошибка авторизации',
        152  => 'Не подключен или отключен протокол',
        210  => 'Счет не найден',
        215  => 'Счет с таким bill_id уже существует',
        241  => 'Сумма слишком мала',
        242  => 'Сумма слишком велика',
        298  => 'Кошелек с таким номером не зарегистрирован',
        300  => 'Техническая ошибка',
        303  => 'Неверный номер телефона',
        316  => 'Попытка авторизации заблокированным провайдером',
        319  => 'Нет прав на данную операцию',
        341  => 'Обязательный параметр указан неверно или отсутствует в запросе',
        1001 => 'Запрещенная валюта для провайдера',
        1003 => 'Не удалось получить курс конвертации для данной пары валют',
        1019 => 'Не удалось определить сотового оператора для мобильной коммерции',
    );

    /**
     * Initializes API client
     *
     * @param $shopId       integer Shop ID
     * @param $appId        integer API APP ID
     * @param $appPassword  string  API APP password
     * @param $pullPassword string  Pull password
     */
    public function __construct($shopId, $appId, $appPassword, $pullPassword)
    {
        $this->shopId       = $shopId;
        $this->appId        = $appId;
        $this->appPassword  = $appPassword;
        $this->pullPassword = $pullPassword;
    }

    /**
     * Get result message 
     * 
     * @param integer $resultCode Result code
     *  
     * @return string
     */
    public function getResultMessage($resultCode)
    {
        return isset($this->resultMessages[$resultCode]) ? $this->resultMessages[$resultCode] : null;
    }

    /**
     * Returns specific bill info
     *
     * @param integer $billId Bill identifier
     *
     * @return \stdClass
     */
    public function getBill($billId)
    {
        return $this->makeRequest('/bills/' . $billId);
    }

    /**
     * Creates a bill
     *
     * @param $billId string New bill identifier
     * @param $qiwiPhoneNumber string Payer phone number
     * @param $amount string Amount to pay
     * @param $currency string ISO 4217 currency code
     * @param $lifetime integer Bill lifetime (in hours)
     * @param $orderNumber string reference order ID
     *
     * @return \stdClass
     */
    public function createBill($billId, $qiwiPhoneNumber, $amount, $currency, $lifetime, $orderNumber)
    {
        $orderComment = \XLite\Core\Translation::lbl('Order X', array('id' => $orderNumber));

        $body = array(
            'user' => 'tel:' . $qiwiPhoneNumber,
            'amount' => $amount,
            'ccy' => $currency,
            'comment' => $orderComment,
            'lifetime' => $lifetime,
        );

        return $this->makeRequest('/bills/' . $billId, 'PUT', $body);
    }

    /**
     * Authenticates Qiwi callback
     *
     * @param $authMethod string Authorization method
     *
     * @return boolean
     */
    public function isAuthorized($authMethod)
    {
        if (static::AUTH_METHOD_BASIC == $authMethod) {
            $user = !empty($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
            $password = !empty($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

            $authorized = ($user === $this->shopId && $password === $this->pullPassword);

        } else {
            $signature = $_SERVER['HTTP_X_API_SIGNATURE'];

            $dataToSign = \XLite\Core\Request::getInstance()->getPostData();
            ksort($dataToSign);

            $calcSignature = base64_encode(hash_hmac('sha1', implode('|', $dataToSign), $this->appPassword, true));

            $authorized = strcasecmp($signature, $calcSignature) == 0;
        }

        return $authorized;
    }

    /**
     * Makes a Qiwi API v2 request
     *
     * @param $query string Query string relative to API endpoint
     * @param string $verb string Http verb
     * @param null $body array request body
     *
     * @return mixed
     */
    protected function makeRequest($query, $verb = 'GET', $body = null)
    {
        $request = new Request(static::API_ENDPOINT . $this->shopId . $query);

        $request->verb = $verb;

        if ($body !== null) {
            $request->body = $body;
        }

        $request->setHeader('Accept', 'application/json');
        $request->setHeader('Authorization', 'Basic ' . base64_encode($this->appId . ':' . $this->appPassword));

        $respone = $request->sendRequest();

        if (!$respone) {
            \XLite\Logger::getInstance()->logCustom(
                'qiwi-error',
                'Empty response!' . PHP_EOL
                . 'Request URL: ' . static::API_ENDPOINT . $this->shopId . $query
            );
        }

        $respone = $respone ? json_decode($respone) : null;

        if ($respone && 0 != $respone->response->result_code) {
            \XLite\Logger::getInstance()->logCustom(
                'qiwi-error',
                'Request failed. Result code: ' . $respone->response->result_code
                . '; Message: ' . $this->getResultMessage($respone->response->result_code) . PHP_EOL
                . 'Request URL: ' . static::API_ENDPOINT . $this->shopId . $query
            );
        }

        return $respone;
    }
}

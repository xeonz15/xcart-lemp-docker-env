<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\RESTAPI\Core;


use XLite\Module\XC\RESTAPI\Core\Exception\IncorrectInputData;
use XLite\Module\XC\RESTAPI\Core\Exception\IncorrectInputType;

class InputDataMapper
{
    /**
     * @param      $rawData
     * @param      $type
     * @param bool $isMultiple
     *
     * @return mixed
     * @throws \XLite\Module\XC\RESTAPI\Core\Exception\IncorrectInputType
     */
    public function getMapped($rawData, $type, $isMultiple = false)
    {
        $callback = $this->getMapperCallback($type);

        return $callback($rawData, $isMultiple);
    }

    /**
     * @param $type
     *
     * @return callable
     * @throws IncorrectInputType
     */
    protected function getMapperCallback($type)
    {
        $mappers = $this->getMappers();

        if (!isset($mappers[$type])) {
            throw new IncorrectInputType();
        }

        return array($this, $mappers[$type]);
    }

    /**
     * @return array
     */
    public function getMappers()
    {
        return [
            'application/x-www-form-urlencoded' => 'mapFormEncode',
            'multipart/form-data'               => 'mapFormEncode',
            'application/json'                  => 'mapJson',
        ];
    }

    /**
     * Mapping for x-www-form-urlencoded
     *
     * @param $rawData
     *
     * @param $isMultiple
     *
     * @return array
     */
    protected function mapFormEncode($rawData, $isMultiple)
    {
        $parsed = array();

        parse_str($rawData, $parsed);

        return $parsed;
    }

    /**
     * Mapping for json
     *
     * @param $rawData
     *
     * @param $isMultiple
     *
     * @return array
     * @throws IncorrectInputData
     */
    protected function mapJson($rawData, $isMultiple)
    {
        $result = json_decode($rawData, true);

        if (!$result) {
            throw new IncorrectInputData();
        }

        return $result;
    }
}

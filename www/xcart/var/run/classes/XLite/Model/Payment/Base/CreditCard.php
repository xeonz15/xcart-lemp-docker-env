<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Model\Payment\Base;

/**
 * Abstract credit card-based processor
 */
abstract class CreditCard extends \XLite\Model\Payment\Base\Online
{
    /**
     * Processor operation codes
     */
    const OPERATION_SALE          = 'sale';
    const OPERATION_AUTH          = 'auth';
    const OPERATION_CAPTURE       = 'capture';
    const OPERATION_CAPTURE_PART  = 'capturePart';
    const OPERATION_CAPTURE_MULTI = 'captureMulti';
    const OPERATION_VOID          = 'void';
    const OPERATION_VOID_PART     = 'voidPart';
    const OPERATION_VOID_MULTI    = 'voidMulti';
    const OPERATION_REFUND        = 'refund';
    const OPERATION_REFUND_PART   = 'refundPart';
    const OPERATION_REFUND_MULTI  = 'refundMulti';


    /**
     * Processor transaction type codes
     */
    const TRANSACTION_SALE    = 'sale';
    const TRANSACTION_AUTH    = 'auth';
    const TRANSACTION_CAPTURE = 'capture';
    const TRANSACTION_VOID    = 'void';
    const TRANSACTION_REFUND  = 'refund';


    /**
     * 'Initial trancation type' setting cell name
     */
    const SETTING_INITIAL_TXN_TYPE = 'initialTxnType';


    /**
     * Initial trancation type codes
     */
    const TXN_TYPE_CHARGE = 'sale';
    const TXN_TYPE_AUTH   = 'auth';


    /**
     * Get operation types
     *
     * @return array
     */
    public function getOperationTypes()
    {
        return array(
            static::OPERATION_SALE,
        );
    }

    /* TODO - rework in next step
    public function getAvailableTransactions(\XLite\Model\Order $order)
    {
        $transactions = array();

        // Add initial transactions

        $openTotal = $order->getOpenTotal();
        if (0 < $openTotal) {
            if (in_array(static::OPERATION_SALE, $this->getOperationTypes())) {
                $transactions[static::TRANSACTION_SALE] = $openTotal;
            }

            if (in_array(static::OPERATION_AUTH, $this->getOperationTypes())) {
                $transactions[static::TRANSACTION_AUTH] = $openTotal;
            }
        }

        $authorized = 0;
        $charged = 0;
        $captured = 0;
        $refunded = 0;
        $voided = 0;

        foreach ($this->getTransactions() as $t) {
            if ($t::STATUS_SUCCESS == $t->getStatus()) {
                switch ($t->getType()) {
                    case static::TRANSACTION_CAPTURE:
                        $captured += $t->getValue();
                        $authorized -= $t->getValue();

                    case static::TRANSACTION_SALE:
                        $charged += $t->getValue();
                        break;

                    case static::TRANSACTION_AUTH:
                        $authorized += $t->getValue();
                        break;

                    case static::TRANSACTION_VOID:
                        $authorized -= $t->getValue();
                        $voided += $t->getValue();
                        break;

                    case static::TRANSACTION_REFUND;
                        $charged -= $t->getValue();
                        $refunded += $t->getValue();
                        break;
                }
            }
        }

        // Detect capture value
        if (0 < $authorized && in_array(static::OPERATION_CAPTURE, $this->getOperationTypes())) {
            if (0 == $captured && 0 == $voided) {
                $transactions[static::TRANSACTION_CAPTURE] = $authorized;

            } elseif (in_array(static::OPERATION_CAPTURE_MULTI, $this->getOperationTypes())) {
                $transactions[static::TRANSACTION_CAPTURE] = $authorized;
            }
        }

        // Detect void value
        if (
            (0 < $authorized && in_array(static::OPERATION_VOID, $this->getOperationTypes()))
            && ((0 == $captured && 0 == $voided) || in_array(static::OPERATION_VOID_MULTI, $this->getOperationTypes()))
        ) {
            $transactions[static::TRANSACTION_VOID] = $authorized;
        }

        // Detect refund valud
        if (
            (0 < $charged && in_array(static::OPERATION_REFUND, $this->getOperationTypes()))
            && (0 == $refunded || in_array(static::OPERATION_REFUND_MULTI, $this->getOperationTypes()))
        ) {
            $transactions[static::TRANSACTION_REFUND] = $charged;
        }

        return $transactions;
    }
    */
}

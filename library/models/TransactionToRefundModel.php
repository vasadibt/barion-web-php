<?php
/**
 * Copyright 2016 Barion Payment Inc. All Rights Reserved.
 * <p/>
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * <p/>
 * http://www.apache.org/licenses/LICENSE-2.0
 * <p/>
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Barion\models;

/**
 * Class TransactionToRefundModel
 * @package Barion\models
 */
class TransactionToRefundModel
{
    /**
     * @var null
     */
    public $TransactionId;
    /**
     * @var null
     */
    public $POSTransactionId;
    /**
     * @var null
     */
    public $AmountToRefund;
    /**
     * @var null
     */
    public $Comment;

    /**
     * TransactionToRefundModel constructor.
     * @param null $transactionId
     * @param null $posTransactionId
     * @param null $amountToRefund
     * @param null $comment
     */
    function __construct($transactionId = null, $posTransactionId = null, $amountToRefund = null, $comment = null)
    {
        $this->TransactionId = $transactionId;
        $this->POSTransactionId = $posTransactionId;
        $this->AmountToRefund = $amountToRefund;
        $this->Comment = $comment;
    }
}
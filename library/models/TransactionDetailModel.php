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

use Barion\helpers\iBarionModel;

/**
 * Class TransactionDetailModel
 * @package Barion\models
 */
class TransactionDetailModel implements iBarionModel
{
    /**
     * @var string
     */
    public $TransactionId;
    /**
     * @var string
     */
    public $POSTransactionId;
    /**
     * @var string
     */
    public $TransactionTime;
    /**
     * @var int
     */
    public $Total;
    /**
     * @var string
     */
    public $Currency;
    /**
     * @var UserModel
     */
    public $Payer;
    /**
     * @var UserModel
     */
    public $Payee;
    /**
     * @var string
     */
    public $Comment;
    /**
     * @var string
     */
    public $Status;
    /**
     * @var string
     */
    public $TransactionType;
    /**
     * @var array
     */
    public $Items;
    /**
     * @var string
     */
    public $RelatedId;
    /**
     * @var string
     */
    public $POSId;
    /**
     * @var string
     */
    public $PaymentId;

    /**
     * TransactionDetailModel constructor.
     */
    function __construct()
    {
        $this->TransactionId = "";
        $this->POSTransactionId = "";
        $this->TransactionTime = "";
        $this->Total = 0;
        $this->Currency = "";
        $this->Payer = new UserModel();
        $this->Payee = new UserModel();
        $this->Comment = "";
        $this->Status = "";
        $this->TransactionType = "";
        $this->Items = array();
        $this->RelatedId = "";
        $this->POSId = "";
        $this->PaymentId = "";
    }

    /**
     * @param array $json
     */
    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->TransactionId = $json['TransactionId'];
            $this->POSTransactionId = $json['POSTransactionId'];
            $this->TransactionTime = $json['TransactionTime'];
            $this->Total = $json['Total'];
            $this->Currency = $json['Currency'];

            $this->Payer = new UserModel();
            $this->Payer->fromJson($json['Payer']);

            $this->Payee = new UserModel();
            $this->Payee->fromJson($json['Payee']);

            $this->Comment = $json['Comment'];
            $this->Status = $json['Status'];
            $this->TransactionType = $json['TransactionType'];

            $this->Items = array();

            if (!empty($json['Items'])) {
                foreach ($json['Items'] as $i) {
                    $item = new ItemModel();
                    $item->fromJson($i);
                    array_push($this->Items, $item);
                }
            }

            $this->RelatedId = $json['RelatedId'];
            $this->POSId = $json['POSId'];
            $this->PaymentId = $json['PaymentId'];
        }
    }
}
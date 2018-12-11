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
 * Class TransactionResponseModel
 * @package Barion\models
 */
class TransactionResponseModel implements iBarionModel
{
    /**
     * @var string
     */
    public $POSTransactionId;
    /**
     * @var string
     */
    public $TransactionId;
    /**
     * @var string
     */
    public $Status;
    /**
     * @var string
     */
    public $TransactionTime;
    /**
     * @var string
     */
    public $RelatedId;

    /**
     * TransactionResponseModel constructor.
     */
    function __construct()
    {
        $this->POSTransactionId = "";
        $this->TransactionId = "";
        $this->Status = "";
        $this->TransactionTime = "";
        $this->RelatedId = "";
    }

    /**
     * @param array $json
     */
    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->POSTransactionId = $json['POSTransactionId'];
            $this->Status = $json['Status'];
            $this->TransactionId = $json['TransactionId'];
            $this->TransactionTime = $json['TransactionTime'];
            $this->RelatedId = $json['RelatedId'];
        }
    }
}
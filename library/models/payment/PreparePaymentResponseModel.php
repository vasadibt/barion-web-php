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

namespace Barion\models\payment;

use Barion\helpers\BarionHelper;
use Barion\helpers\iBarionModel;
use Barion\models\BaseResponseModel;

/**
 * Class CancelAuthorizationRequestModel
 * @package Barion\models\payment
 */
class PreparePaymentResponseModel extends BaseResponseModel implements iBarionModel
{
    /**
     * @var string
     */
    public $PaymentId;
    /**
     * @var string
     */
    public $PaymentRequestId;
    /**
     * @var string
     */
    public $Status;
    /**
     * @var array
     */
    public $Transactions;
    /**
     * @var string
     */
    public $QRUrl;
    /**
     * @var string
     */
    public $RecurrenceResult;
    /**
     * @var string
     */
    public $PaymentRedirectUrl;

    /**
     * PreparePaymentResponseModel constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->PaymentId = "";
        $this->PaymentRequestId = "";
        $this->Status = "";
        $this->QRUrl = "";
        $this->RecurrenceResult = "";
        $this->PaymentRedirectUrl = "";
        $this->Transactions = array();
    }

    /**
     * @param array $json
     */
    public function fromJson($json)
    {
        if (!empty($json)) {
            parent::fromJson($json);
            $this->PaymentId = BarionHelper::jget($json, 'PaymentId');
            $this->PaymentRequestId = BarionHelper::jget($json, 'PaymentRequestId');
            $this->Status = BarionHelper::jget($json, 'Status');
            $this->QRUrl = BarionHelper::jget($json, 'QRUrl');
            $this->RecurrenceResult = BarionHelper::jget($json, 'RecurrenceResult');
            $this->Transactions = array();

            if (!empty($json['Transactions'])) {
                foreach ($json['Transactions'] as $key => $value) {
                    $tr = new TransactionResponseModel();
                    $tr->fromJson($value);
                    array_push($this->Transactions, $tr);
                }
            }
        }
    }
}
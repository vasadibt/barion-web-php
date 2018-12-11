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
use function Barion\helpers\jget;

/**
 * Class PaymentStateResponseModel
 * @package Barion\models
 */
class PaymentStateResponseModel extends BaseResponseModel implements iBarionModel
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
    public $OrderNumber;
    /**
     * @var string
     */
    public $POSId;
    /**
     * @var string
     */
    public $POSName;
    /**
     * @var string
     */
    public $POSOwnerEmail;
    /**
     * @var string
     */
    public $Status;
    /**
     * @var string
     */
    public $PaymentType;
    /**
     * @var string
     */
    public $FundingSource;
    /**
     * @var FundingInformationModel
     */
    public $FundingInformation;
    /**
     * @var string
     */
    public $AllowedFundingSources;
    /**
     * @var string
     */
    public $GuestCheckout;
    /**
     * @var string
     */
    public $CreatedAt;
    /**
     * @var string
     */
    public $ValidUntil;
    /**
     * @var string
     */
    public $CompletedAt;
    /**
     * @var string
     */
    public $ReservedUntil;
    /**
     * @var int
     */
    public $Total;
    /**
     * @var string
     */
    public $Currency;
    /**
     * @var TransactionDetailModel[]
     */
    public $Transactions;
    /**
     * @var string
     */
    public $RecurrenceResult;
    /**
     * @var string
     */
    public $SuggestedLocale;
    /**
     * @var int
     */
    public $FraudRiskScore;
    /**
     * @var string
     */
    public $RedirectUrl;
    /**
     * @var string
     */
    public $CallbackUrl;

    /**
     * PaymentStateResponseModel constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->PaymentId = "";
        $this->PaymentRequestId = "";
        $this->OrderNumber = "";
        $this->POSId = "";
        $this->POSName = "";
        $this->POSOwnerEmail = "";
        $this->Status = "";
        $this->PaymentType = "";
        $this->FundingSource = "";
        $this->FundingInformation = new FundingInformationModel();
        $this->AllowedFundingSources = "";
        $this->GuestCheckout = "";
        $this->CreatedAt = "";
        $this->ValidUntil = "";
        $this->CompletedAt = "";
        $this->ReservedUntil = "";
        $this->Total = 0;
        $this->Currency = "";
        $this->Transactions = array();
        $this->RecurrenceResult = "";
        $this->SuggestedLocale ="";
        $this->FraudRiskScore = 0;
        $this->RedirectUrl = "";
        $this->CallbackUrl = "";
    }

    /**
     * @param array $json
     */
    public function fromJson($json)
    {
        if (!empty($json)) {
            parent::fromJson($json);

            $this->PaymentId = jget($json, 'PaymentId');
            $this->PaymentRequestId = jget($json, 'PaymentRequestId');
            $this->OrderNumber = jget($json, 'OrderNumber');
            $this->POSId = jget($json, 'POSId');
            $this->POSName = jget($json, 'POSName');
            $this->POSOwnerEmail = jget($json, 'POSOwnerEmail');
            $this->Status = jget($json, 'Status');
            $this->PaymentType = jget($json, 'PaymentType');
            $this->FundingSource = jget($json, 'FundingSource');
            if(!empty($json['FundingInformation'])) {
                $this->FundingInformation = new FundingInformationModel();
                $this->FundingInformation->fromJson(jget($json, 'FundingInformation'));
            }
            $this->AllowedFundingSources = jget($json, 'AllowedFundingSources');
            $this->GuestCheckout = jget($json, 'GuestCheckout');
            $this->CreatedAt = jget($json, 'CreatedAt');
            $this->ValidUntil = jget($json, 'ValidUntil');
            $this->CompletedAt = jget($json, 'CompletedAt');
            $this->ReservedUntil = jget($json, 'ReservedUntil');
            $this->Total = jget($json, 'Total');
            $this->Currency = jget($json, 'Currency');
            $this->RecurrenceResult = jget($json, 'RecurrenceResult');
            $this->SuggestedLocale = jget($json, 'SuggestedLocale');
            $this->FraudRiskScore = jget($json, 'FraudRiskScore');
            $this->RedirectUrl = jget($json, 'RedirectUrl');
            $this->CallbackUrl = jget($json, 'CallbackUrl');

            $this->Transactions = array();

            if (!empty($json['Transactions'])) {
                foreach ($json['Transactions'] as $key => $value) {
                    $tr = new TransactionDetailModel();
                    $tr->fromJson($value);
                    array_push($this->Transactions, $tr);
                }
            }
        }
    }
}
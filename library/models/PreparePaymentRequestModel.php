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

use Barion\library\Currency;
use Barion\library\FundingSourceType;
use Barion\library\PaymentType;

/**
 * Class PreparePaymentRequestModel
 * @package Barion\models
 */
class PreparePaymentRequestModel extends BaseRequestModel
{
    /**
     * @var string
     */
    public $PaymentType;
    /**
     * @var
     */
    public $ReservationPeriod;
    /**
     * @var string
     */
    public $PaymentWindow;
    /**
     * @var bool
     */
    public $GuestCheckout;
    /**
     * @var array
     */
    public $FundingSources;
    /**
     * @var null
     */
    public $PaymentRequestId;
    /**
     * @var
     */
    public $PayerHint;
    /**
     * @var
     */
    public $Transactions;
    /**
     * @var string
     */
    public $Locale;
    /**
     * @var
     */
    public $OrderNumber;
    /**
     * @var
     */
    public $ShippingAddress;
    /**
     * @var bool
     */
    public $InitiateRecurrence;
    /**
     * @var null
     */
    public $RecurrenceId;
    /**
     * @var null
     */
    public $RedirectUrl;
    /**
     * @var null
     */
    public $CallbackUrl;
    /**
     * @var string
     */
    public $Currency;

    /**
     * PreparePaymentRequestModel constructor.
     * @param null $requestId
     * @param string $type
     * @param bool $guestCheckoutAllowed
     * @param array $allowedFundingSources
     * @param string $window
     * @param string $locale
     * @param bool $initiateRecurrence
     * @param null $recurrenceId
     * @param null $redirectUrl
     * @param null $callbackUrl
     * @param string $currency
     */
    function __construct($requestId = null, $type = PaymentType::Immediate, $guestCheckoutAllowed = true, $allowedFundingSources = array(FundingSourceType::All), $window = "00:30:00", $locale = "hu-HU", $initiateRecurrence = false, $recurrenceId = null, $redirectUrl = null, $callbackUrl = null, $currency = Currency::HUF)
    {
        $this->PaymentRequestId = $requestId;
        $this->PaymentType = $type;
        $this->PaymentWindow = $window;
        $this->GuestCheckout = true;
        $this->FundingSources = array(FundingSourceType::All);
        $this->Locale = $locale;
        $this->InitiateRecurrence = $initiateRecurrence;
        $this->RecurrenceId = $recurrenceId;
        $this->RedirectUrl = $redirectUrl;
        $this->CallbackUrl = $callbackUrl;
        $this->Currency = $currency;
    }

    /**
     * @param PaymentTransactionModel $transaction
     */
    public function AddTransaction(PaymentTransactionModel $transaction)
    {
        if ($this->Transactions == null) {
            $this->Transactions = array();
        }
        array_push($this->Transactions, $transaction);
    }

    /**
     * @param $transactions
     */
    public function AddTransactions($transactions)
    {
        if (!empty($transactions)) {
            foreach ($transactions as $transaction) {
                if ($transaction instanceof PaymentTransactionModel) {
                    $this->AddTransaction($transaction);
                }
            }
        }
    }
}
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

namespace Barion\models\_3dsecure;

use Barion\helpers\BarionHelper;
use Barion\helpers\iBarionModel;


/**
 * Class BillingAddressModel
 * @package Barion\models\_3dsecure
 */
class PurchaseInformationModel implements iBarionModel
{
    public $DeliveryTimeframe;
    public $DeliveryEmailAddress;
    public $PreOrderDate;
    public $AvailabilityIndicator;
    public $ReOrderIndicator;
    public $RecurringExpiry;
    public $RecurringFrequency;
    public $ShippingAddressIndicator;
    public $GiftCardPurchase;
    public $PurchaseType;

    function __construct()
    {
        $this->DeliveryTimeframe = "";
        $this->DeliveryEmailAddress = "";
        $this->PreOrderDate = "";
        $this->AvailabilityIndicator = "";
        $this->ReOrderIndicator = "";
        $this->RecurringExpiry = "";
        $this->RecurringFrequency = "";
        $this->ShippingAddressIndicator = "";
        $this->GiftCardPurchase = "";
        $this->PurchaseType = "";
    }

    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->DeliveryTimeframe = BarionHelper::jget($json, 'DeliveryTimeframe');
            $this->DeliveryEmailAddress = BarionHelper::jget($json, 'DeliveryEmailAddress');
            $this->PreOrderDate = BarionHelper::jget($json, 'PreOrderDate');
            $this->AvailabilityIndicator = BarionHelper::jget($json, 'AvailabilityIndicator');
            $this->ReOrderIndicator = BarionHelper::jget($json, 'ReOrderIndicator');
            $this->RecurringExpiry = BarionHelper::jget($json, 'RecurringExpiry');
            $this->RecurringFrequency = BarionHelper::jget($json, 'RecurringFrequency');
            $this->ShippingAddressIndicator = BarionHelper::jget($json, 'ShippingAddressIndicator');
            $this->GiftCardPurchase = BarionHelper::jget($json, 'GiftCardPurchase');
            $this->PurchaseType = BarionHelper::jget($json, 'PurchaseType');
        }
    }
}
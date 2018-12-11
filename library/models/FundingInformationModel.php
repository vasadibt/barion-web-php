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
 * Class FundingInformationModel
 * @package Barion\models
 */
class FundingInformationModel implements iBarionModel
{
    /**
     * @var BankCardModel
     */
    public $BankCard;
    /**
     * @var string
     */
    public $AuthorizationCode;

    /**
     * FundingInformationModel constructor.
     */
    function __construct()
    {
        $this->BankCard = new BankCardModel();
        $this->AuthorizationCode = "";
    }

    /**
     * @param $json
     */
    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->BankCard = new BankCardModel();
            $this->BankCard->fromJson(jget($json, 'BankCard'));
            $this->AuthorizationCode = jget($json, 'AuthorizationCode');
        }
    }
}
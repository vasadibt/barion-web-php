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
 * Class ItemModel
 * @package Barion\models
 */
class ItemModel implements iBarionModel
{
    /**
     * @var string
     */
    public $Name;
    /**
     * @var string
     */
    public $Description;
    /**
     * @var int
     */
    public $Quantity;
    /**
     * @var string
     */
    public $Unit;
    /**
     * @var int
     */
    public $UnitPrice;
    /**
     * @var int
     */
    public $ItemTotal;
    /**
     * @var string
     */
    public $SKU;

    /**
     * ItemModel constructor.
     */
    function __construct()
    {
        $this->Name = "";
        $this->Description = "";
        $this->Quantity = 0;
        $this->Unit = "";
        $this->UnitPrice = 0;
        $this->ItemTotal = 0;
        $this->SKU = "";
    }

    /**
     * @param array $json
     */
    public function fromJson($json)
    {
        if (!empty($json)) {
            $this->Name = jget($json, 'Name');
            $this->Description = jget($json, 'Description');
            $this->Quantity = jget($json, 'Quantity');
            $this->Unit = jget($json, 'Unit');
            $this->UnitPrice = jget($json, 'UnitPrice');
            $this->ItemTotal = jget($json, 'ItemTotal');
            $this->SKU = jget($json, 'SKU');
        }
    }
}
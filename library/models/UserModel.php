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
 * Class UserModel
 * @package Barion\models
 */
class UserModel implements iBarionModel
{
    /**
     * @var string
     */
    public $Name;
    /**
     * @var string
     */
    public $Email;

    /**
     * UserModel constructor.
     */
    function __construct()
    {
        $this->Name = "";
        $this->Email = "";
    }

    /**
     * @param $json
     */
    function fromJson($json)
    {
        if (!empty($json)) {
            $this->Email = $json['Email'];

            $name = new UserNameModel();
            $name->fromJson($json['Name']);
        }
    }
}
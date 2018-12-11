<?php
/**
 * Created by PhpStorm.
 * User: Tamás
 * Date: 2018. 12. 11.
 * Time: 11:53
 */

namespace Barion\common;

/**
 * Class FundingSourceType
 * @package Barion\library
 */
abstract class FundingSourceType
{
    const All = "All";
    const Balance = "Balance";
    const Bankcard = "Bankcard";
}
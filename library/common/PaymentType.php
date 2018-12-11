<?php
/**
 * Created by PhpStorm.
 * User: Tamás
 * Date: 2018. 12. 11.
 * Time: 11:52
 */

namespace Barion\common;

/**
 * Class PaymentType
 * @package Barion\library
 */
abstract class PaymentType
{
    const Immediate = "Immediate";
    const Reservation = "Reservation";
}

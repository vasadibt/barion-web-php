<?php
/**
 * Created by PhpStorm.
 * User: Tamás
 * Date: 2018. 12. 11.
 * Time: 11:53
 */

namespace Barion\library;

/**
 * Class PaymentStatus
 * @package Barion\library
 */
abstract class PaymentStatus
{
    // 10
    const Prepared = "Prepared";
    // 20
    const Started = "Started";
    // 21
    const InProgress = "InProgress";
    // 25
    const Reserved = "Reserved";
    // 30
    const Canceled = "Canceled";
    // 40
    const Succeeded = "Succeeded";
    // 50
    const Failed = "Failed";
    // 60
    const PartiallySucceeded = "PartiallySucceeded";
    // 70
    const Expired = "Expired";
}

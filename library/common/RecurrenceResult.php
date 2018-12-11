<?php
/**
 * Created by PhpStorm.
 * User: Tamás
 * Date: 2018. 12. 11.
 * Time: 11:53
 */

namespace Barion\library;

/**
 * Class RecurrenceResult
 * @package Barion\library
 */
abstract class RecurrenceResult
{
    const None = "None";
    const Successful = "Successful";
    const Failed = "Failed";
    const NotFound = "NotFound";
}
<?php

namespace Barion\common;

/**
 * Class PaymentType
 * @package Barion\common
 */
abstract class PaymentType
{
    const Immediate = "Immediate";
    const Reservation = "Reservation";
    const DelayedCapture = "DelayedCapture";
}

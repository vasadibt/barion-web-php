<?php

namespace Barion\common;

/**
 * Class PaymentMethodIndicator
 * @package Barion\common
 */
abstract class PaymentMethodIndicator
{
    const NoAccount = "NoAccount";
    const ThisTransaction = "ThisTransaction";
    const LessThan30Days = "LessThan30Days";
    const Between30And60Days = "Between30And60Days";
    const MoreThan60Days = "MoreThan60Days";
}
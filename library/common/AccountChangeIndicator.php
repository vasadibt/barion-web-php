<?php

namespace Barion\common;

/**
 * Class AccountChangeIndicator
 * @package Barion\common
 */
abstract class AccountChangeIndicator
{
    const ChangedDuringThisTransaction = "ChangedDuringThisTransaction";
    const LessThan30Days = "LessThan30Days";
    const Between30And60Days = "Between30And60Days";
    const MoreThan60Days = "MoreThan60Days";
}
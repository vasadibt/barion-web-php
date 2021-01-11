<?php

namespace Barion\common;

/**
 * Class RecurrenceType
 * @package Barion\common
 */
abstract class RecurrenceType
{
    const MerchantInitiatedPayment = "MerchantInitiatedPayment";
    const OneClickPayment = "OneClickPayment";
    const RecurringPayment = "RecurringPayment";
}
<?php

namespace Barion\common;

/**
 * Class ShippingAddressIndicator
 * @package Barion\common
 */
abstract class ShippingAddressIndicator
{
    const ShipToCardholdersBillingAddress = "ShipToCardholdersBillingAddress";
    const ShipToAnotherVerifiedAddress = "ShipToAnotherVerifiedAddress";
    const ShipToDifferentAddress = "ShipToDifferentAddress";
    const ShipToStore = "ShipToStore";
    const DigitalGoods = "DigitalGoods";
    const TravelAndEventTickets = "TravelAndEventTickets";
    const Other = "Other";
}
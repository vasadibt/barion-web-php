<?php

namespace Barion\common;

/**
 * Class Constants
 * @package Barion\common
 */
abstract class Constants
{
    const BARION_API_URL_PROD = "https://api.barion.com";
    const BARION_WEB_URL_PROD = "https://secure.barion.com/Pay";
    const BARION_API_URL_TEST = "https://api.test.barion.com";
    const BARION_WEB_URL_TEST = "https://secure.test.barion.com/Pay";

    const API_ENDPOINT_PREPAREPAYMENT = "/Payment/Start";
    const API_ENDPOINT_PAYMENTSTATE = "/Payment/GetPaymentState";
    const API_ENDPOINT_QRCODE = "/QR/Generate";
    const API_ENDPOINT_REFUND = "/Payment/Refund";
    const API_ENDPOINT_FINISHRESERVATION = "/Payment/FinishReservation";
    const API_ENDPOINT_CAPTURE= "/Payment/Capture";
    const API_ENDPOINT_CANCELAUTHORIZATION= "/Payment/CancelAuthorization";
    const API_ENDPOINT_3DS_COMPLETE= "/Payment/Complete";

    const PAYMENT_URL = "/Pay";
}
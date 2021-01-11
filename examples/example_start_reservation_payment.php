<?php
/*
*  Barion PHP library usage example
*
*  Starting a reservation payment with two products
*
*  � 2015 Barion Payment Inc.
*/

$myPosKey = "11111111-1111-1111-1111-111111111111"; // <-- Replace this with your POSKey!
$myEmailAddress = "mywebshop@example.com"; // <-- Replace this with your e-mail address in Barion!

// Barion Client that connects to the TEST environment
$BC = new \Barion\BarionClient($myPosKey, 2, \Barion\common\BarionEnvironment::Test);

// create the item models
$item1 = new \Barion\models\common\ItemModel();
$item1->Name = "TestItem"; // no more than 250 characters
$item1->Description = "A test item for payment"; // no more than 500 characters
$item1->Quantity = 1;
$item1->Unit = "piece"; // no more than 50 characters
$item1->UnitPrice = 1000;
$item1->ItemTotal = 1000;
$item1->SKU = "ITEM-01"; // no more than 100 characters

$item2 = new \Barion\models\common\ItemModel();
$item2->Name = "AnotherTestItem"; // no more than 250 characters
$item2->Description = "Another test item for payment"; // no more than 500 characters
$item2->Quantity = 2;
$item2->Unit = "piece"; // no more than 50 characters
$item2->UnitPrice = 250;
$item2->ItemTotal = 250;
$item2->SKU = "ITEM-02"; // no more than 100 characters

// create the transaction
$trans = new \Barion\models\payment\PaymentTransactionModel();
$trans->POSTransactionId = "TRANS-02";
$trans->Payee = $myEmailAddress; // no more than 256 characters
$trans->Total = 1500;
$trans->Comment = "Test Transaction"; // no more than 640 characters
$trans->AddItem($item1); // add the items to the transaction
$trans->AddItem($item2);

// create the shipping address
$shippingAddress = new \Barion\models\_3dsecure\ShippingAddressModel();
$shippingAddress->Country = "HU";
$shippingAddress->Region = null;
$shippingAddress->City = "Budapest";
$shippingAddress->Zip = "1111";
$shippingAddress->Street = "Teszt utca 1.";
$shippingAddress->Street2 = "1. emelet 1. ajto";
$shippingAddress->Street3 = "";
$shippingAddress->FullName = "Teszt Tibor";

// create the request model
$psr = new \Barion\models\payment\PreparePaymentRequestModel();
$psr->GuestCheckout = true; // we allow guest checkout
$psr->PaymentType = \Barion\common\PaymentType::Reservation; // we want an immediate payment
$psr->ReservationPeriod = "1:00:00:00"; // money is reserved for one day
$psr->PaymentWindow = "00:20:00"; // the payment must be completed in 20 minutes
$psr->FundingSources = array(\Barion\common\FundingSourceType::All); // both Barion wallet and bank card accepted
$psr->PaymentRequestId = "TESTPAY-02"; // no more than 100 characters
$psr->PayerHint = "user@example.com"; // no more than 256 characters
$psr->Locale = \Barion\common\UILocale::EN; // the UI language will be English
$psr->Currency = \Barion\common\Currency::HUF;
$psr->OrderNumber = "ORDER-0002"; // no more than 100 characters
$psr->ShippingAddress = $shippingAddress;
$psr->AddTransaction($trans);  // add the transaction to the payment

// send the request
$myPayment = $BC->PreparePayment($psr);

if ($myPayment->RequestSuccessful === true) {
  // redirect the user to the Barion Smart Gateway
  header("Location: " . \Barion\common\Constants::BARION_WEB_URL_TEST . "?id=" . $myPayment->PaymentId);
}
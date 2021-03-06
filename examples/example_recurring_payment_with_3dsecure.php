<?php
/*
*  Barion PHP library usage example
*
*  Executing a recurring payment of €19.95, using a previously initialized recurrence token, and parameters required for 3D-secure authentication.
*
*  � 2020 Barion Payment Inc.
*/

$myPosKey = "11111111-1111-1111-1111-111111111111"; // <-- Replace this with your POSKey!
$myEmailAddress = "mywebshop@example.com"; // <-- Replace this with your e-mail address in Barion!

// Barion Client that connects to the TEST environment
$BC = new \Barion\BarionClient($myPosKey, 2, \Barion\common\BarionEnvironment::Test);

// helper variable, containing the timestamp 10 minutes ago
$now = date("Y-m-d H:i:s", (time() - 600));

// e-mail address of the payer
$payerEmail = "john.doe@example.com";

// create the item model
$item = new \Barion\models\common\ItemModel();
$item->Name = "TestItem"; // no more than 250 characters
$item->Description = "A test item for payment"; // no more than 500 characters
$item->Quantity = 1;
$item->Unit = "pc"; // no more than 50 characters
$item->UnitPrice = 19.95;
$item->ItemTotal = 19.95;
$item->SKU = "ITEM-01"; // no more than 100 characters

// create the transaction
$trans = new \Barion\models\payment\PaymentTransactionModel();
$trans->POSTransactionId = "TRANS-01";
$trans->Payee = $myEmailAddress; // no more than 256 characters
$trans->Total = 19.95;
$trans->Comment = "Test Transaction"; // no more than 640 characters
$trans->AddItem($item); // add the item to the transaction

// create the addresses
$shippingAddress = new \Barion\models\_3dsecure\ShippingAddressModel();
$shippingAddress->Country = "DE";
$shippingAddress->Region = null;
$shippingAddress->City = "Berlin";
$shippingAddress->Zip = "10243";
$shippingAddress->Street = "Karl-Marx-Allee 93A";
$shippingAddress->Street2 = "1. ebene";
$shippingAddress->Street3 = "";
$shippingAddress->FullName = "Thomas Testing";

$billingAddress = new \Barion\models\_3dsecure\BillingAddressModel();
$billingAddress->Country = "DE";
$billingAddress->Region = null;
$billingAddress->City = "Berlin";
$billingAddress->Zip = "10243";
$billingAddress->Street = "Karl-Marx-Allee 93A";
$billingAddress->Street2 = "1. ebene";
$billingAddress->Street3 = "";

// 3DS information about the payer
$payerAccountInfo = new \Barion\models\_3dsecure\PayerAccountInformationModel();
$payerAccountInfo->AccountId = "4690011905085639";
$payerAccountInfo->AccountCreated = $now;
$payerAccountInfo->AccountCreationIndicator = \Barion\common\AccountCreationIndicator::CreatedDuringThisTransaction;
$payerAccountInfo->AccountLastChanged = $now;
$payerAccountInfo->AccountChangeIndicator = \Barion\common\AccountChangeIndicator::ChangedDuringThisTransaction;
$payerAccountInfo->PasswordLastChanged = $now;
$payerAccountInfo->PasswordChangeIndicator = \Barion\common\PasswordChangeIndicator::NoChange;
$payerAccountInfo->PurchasesInTheLastSixMonths = 6;
$payerAccountInfo->ShippingAddressAdded = $now;
$payerAccountInfo->ShippingAddressUsageIndicator = \Barion\common\ShippingAddressUsageIndicator::ThisTransaction;
$payerAccountInfo->PaymentMethodAdded = $now;
$payerAccountInfo->PaymentMethodIndicator = \Barion\common\PaymentMethodIndicator::ThisTransaction;
$payerAccountInfo->ProvisionAttempts = 1;
$payerAccountInfo->TransactionalActivityPerDay = 1;
$payerAccountInfo->TransactionalActivityPerYear = 100;
$payerAccountInfo->SuspiciousActivityIndicator = \Barion\common\SuspiciousActivityIndicator::NoSuspiciousActivityObserved;

// 3DS information about the purchase
$purchaseInfo = new \Barion\models\_3dsecure\PurchaseInformationModel();
$purchaseInfo->DeliveryTimeframe = \Barion\common\DeliveryTimeframeType::OvernightShipping;
$purchaseInfo->DeliveryEmailAddress = $payerEmail;
$purchaseInfo->PreOrderDate = $now;
$purchaseInfo->AvailabilityIndicator = \Barion\common\AvailabilityIndicator::MerchandiseAvailable;
$purchaseInfo->ReOrderIndicator = \Barion\common\ReOrderIndicator::FirstTimeOrdered;
$purchaseInfo->RecurringExpiry = "2099-12-31 23:59:59";
$purchaseInfo->RecurringFrequency = "0";
$purchaseInfo->ShippingAddressIndicator = \Barion\common\ShippingAddressIndicator::ShipToCardholdersBillingAddress;
$purchaseInfo->GiftCardPurchase = null;
$purchaseInfo->PurchaseType = \Barion\common\PurchaseType::GoodsAndServicePurchase;

// create the request model
$psr = new \Barion\models\payment\PreparePaymentRequestModel();
$psr->GuestCheckout = true; // we allow guest checkout
$psr->PaymentType = \Barion\common\PaymentType::Immediate; // we want an immediate payment
$psr->FundingSources = array(\Barion\common\FundingSourceType::All); // both Barion wallet and bank card accepted
$psr->PaymentRequestId = "TESTPAY-01"; // no more than 100 characters
$psr->PayerHint = $payerEmail; // no more than 256 characters
$psr->Locale = \Barion\common\UILocale::EN; // the UI language will be English
$psr->Currency = \Barion\common\Currency::EUR;
$psr->OrderNumber = "ORDER-0001"; // no more than 100 characters
$psr->AddTransaction($trans); // add the transaction to the payment

// adding the 3d secure compliant parameters to the request
$psr->ShippingAddress = $shippingAddress;
$psr->BillingAddress = $billingAddress;
$psr->CardHolderNameHint = "John Doe";
$psr->PayerPhoneNumber = "36301122334";
$psr->PayerWorkPhoneNumber = "36301122334";
$psr->PayerHomePhoneNumber = "36301122334";
$psr->PayerAccountInformation = $payerAccountInfo;
$psr->PurchaseInformation = $purchaseInfo;
$psr->ChallengePreference = \Barion\common\ChallengePreference::NoPreference;

// setting the properties related to token/recurring payment
$psr->InitiateRecurrence = false; // InitiateRecurrence is false, because the webshop already has a token initialized
$psr->RecurrenceId = "XXXXXXXX"; // replace this with the previously initialized token for this recurrence
$psr->RecurrenceType = "RecurringPayment"; // RecurrenceType indicates that this is a recurring payment charge (for merchant-initiated, or simple token payments, use 'MerchantInitiatedPayment' instead)
$psr->TraceId = "XXXXXXXX"; // replace this with the corresponding TraceId received when initializing the token payment!

// send the request
$paymentResponse = $BC->PreparePayment($psr);

if ($paymentResponse->RequestSuccessful === true) {
  // NOTE: since this is a recurring payment execution, no redirect is taking place - the charge happens immediately
  // TODO: process the response found in $paymentResponse
}
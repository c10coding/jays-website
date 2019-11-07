<?php
require_once("../vendor/autoload.php");

\Stripe\Stripe::setApiKey('sk_test_9VC6x34HpFHvlvLt0KnOeulc004nvG3tBG');

// Sanitizes POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST["first_name"];
$last_name = $POST["last_name"];
$email = $POST["email"];
$token = $POST["stripeToken"];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
	"email" => $email,
	"source" => $token
));

// Charge customer
$charge = \Stripe\Charge::create(array(
	"amount" => 5000,
	"currency" => "usd",
	"description" => "Whatever they bought",
	"customer" => $customer->id
));

// Redirect to success
	// tid = Transaction id
header("Location: success.php?tid=".$charge->id."&product=".$charge->description);
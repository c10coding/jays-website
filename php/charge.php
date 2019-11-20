<?php
require_once("../vendor/autoload.php");
include("countCart.php");
session_start();

\Stripe\Stripe::setApiKey('sk_test_9VC6x34HpFHvlvLt0KnOeulc004nvG3tBG');

// Sanitizes POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST["first_name"];
$last_name = $POST["last_name"];
$email = $POST["email"];
$token = $POST["stripeToken"];
$totalPrice = $_SESSION["totalPrice"] * 100;
$description = "Here's a list of items the customer bought: ";

/*
for($x = 0; $x < $count;$x++){
	$item = $_SESSION["cart"][$x]["Item_Name"];
	if($x == $count - 1){
		$description += $item;
	}else{
		$description += $item.trim() . ", ";
	}
	
}*/

$arrItems = array();

$description = "";

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
	"email" => $email,
	"source" => $token
));

// Charge customer
$charge = \Stripe\Charge::create(array(
	"amount" => $totalPrice,
	"currency" => "usd",
	"description" => "A purchase has been made!",
	"customer" => $customer->id
));

$_SESSION["cart"] = array();
// Redirect to success
	// tid = Transaction id
header("Location: success.php?tid=".$charge->id."&product=".$charge->description);
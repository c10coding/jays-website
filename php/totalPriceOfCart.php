<?php 

	include("countCart.php");

	if($count == 0){
		$_SESSION["totalPrice"] = 0;
	}

	if(!isset($_SESSION["discountApplied"])){
		for($n = 0; $n < $count;$n++){
			$_SESSION["totalPrice"] = 0;
			$currentPrice = $_SESSION["cart"][$n]["Price"];
			$_SESSION["totalPrice"] += $currentPrice;
			$totalPrice = $_SESSION["totalPrice"];
		}	
	}
		
 ?>
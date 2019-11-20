<?php 

	// All the stuff commented out is from the discount stuff

	include("countCart.php");

	if($count == 0){
		$_SESSION["totalPrice"] = 0;
	}

	//if(!isset($_SESSION["discountApplied"])){
		$_SESSION["totalPrice"] = 0;
		for($n = 0; $n < $count;$n++){
			
			$currentPrice = $_SESSION["cart"][$n]["Price"];
			$quantity = $_SESSION["cart"][$n]["Quantity"];
			$_SESSION["totalPrice"] += $currentPrice * $quantity;
			//echo $_SESSION["totalPrice"] . "<br>";
			$totalPrice = $_SESSION["totalPrice"];

		}	
	//}else{
		//$totalPrice = $_SESSION["totalPrice"];
	//}
 ?>	

<?php 

	include("connection.php");
	include("countCart.php");
	include("totalPriceOfCart.php");

	session_start();
	$discountCode = $_POST["code"];
	$sql = "SELECT * FROM discountcode WHERE code='$discountCode'";
	$results = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($results);
	$percentage = $row["percentage"];
	$numRows = mysqli_num_rows($results);
	$totalPrice = $_SESSION["totalPrice"];
	
	//Makes sure that recentcodes doesn't expire within the next 5 months	
	if (isset($_SESSION['LAST_ACTIVITY2']) && (time() - $_SESSION['LAST_ACTIVITY2'] > 5505600)) {
	    // last request was more than 30 minutes ago
	    session_unset($_SESSION["recentCodes"]);     // unset $_SESSION variable for the run-time 
	    session_destroy($_SESSION["recentCodes"]);   // destroy session data in storage
	    session_unset($_SESSION["LAST_ACTIVITY2"]);
	    session_destroy($_SESSION["LAST_ACTIVITY2"]);
	    session_unset($_SESSION["discountApplied"]);
	    session_destroy($_SESSION["discountApplied"]);
	}else{
		$_SESSION['LAST_ACTIVITY2'] = time(); // update last activity time stamp
	}

	if($numRows == 0){
		die("This discount code does not exist");
	}else{

		if(!isset($_SESSION["recentCodes"])){
			$_SESSION["recentCodes"] = array();
		}

		if(!count($_SESSION["recentCodes"]) == 0){
			foreach($_SESSION["recentCodes"] as $code){
				
				if($discountCode == $code){
					die("You've already used this discount code!");
				}

			}

			//It is a valid discount code
			$percentage = "." . $percentage;
			//How much it's supposed to take off
			$cutOff = $totalPrice * $percentage;
			$totalPrice = $totalPrice - $cutOff;
			$_SESSION["totalPrice"] = $totalPrice;
			$_SESSION["discountApplied"] = true;
			echo "Discount code applied. You have saved " . $cutOff . " USD. To see your new price, please refresh the page!";
			array_push($_SESSION["recentCodes"], $discountCode);

		}else{
			echo "yeee";
			$percentage = "." . $percentage;
			//How much it's supposed to take off
			$cutOff = $totalPrice * $percentage;
			$totalPrice = $totalPrice - $cutOff;
			$_SESSION["totalPrice"] = $totalPrice;
			echo "Discount code applied. You have saved " . $cutOff . " USD. To see your new price, please refresh the page!";
			array_push($_SESSION["recentCodes"], $discountCode);
		}
		
		
		
		

	}
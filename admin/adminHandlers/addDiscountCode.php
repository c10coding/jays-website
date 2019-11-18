<?php 
	include("../../php/connection.php");

	$code = $_POST["discountCode"];
	$discountPercentage = $_POST["discountPercentage"];
	$used = 0;
	$sql = "INSERT INTO discountcode(code, used, percentage) VALUES('$code', '$used', '$discountPercentage')";
	$results = mysqli_query($con,$sql);

	if($results){
		echo true;
	}else{
		echo "Your shit broke";
		echo mysqli_error($con);
	}
 ?>
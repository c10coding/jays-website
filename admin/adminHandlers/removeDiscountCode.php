<?php 
	include("../../php/connection.php");
	$code = $_POST["code"];
	$sql = "DELETE FROM discountcode WHERE code='$code'";
	$results = mysqli_query($con,$sql);
	if($results){
		echo true;
	}else{
		echo mysqli_error($con);
	}
 ?>
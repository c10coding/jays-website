<?php

ob_start();
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,"CupWorm");
if($con){

	$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

	$username = $_POST["username"];
	$password = $_POST["password"];
	$checkbox = $_POST["checkbox"];

	$sql = "SELECT * FROM login WHERE username='$username'";
	$results = mysqli_query($con,$sql);
	$numRows = mysqli_num_rows($results);
    $row = mysqli_fetch_assoc($results);
    if(empty($username) || empty($password)){
    	echo "You must fill out all the fields!";
    }else{
    	if($numRows == 0){
			echo "Your username is incorrect!";
		}else{
			if($password == $row["password"]){
				if(!empty($checkbox)){
					$time = $_SERVER['REQUEST_TIME'];
					$_SESSION['LAST_ACTIVITY'] = $time;
					$_SESSION["logged_in"] = true;
				}
				
				echo "<script type='text/javascript'>  window.location='controlPanel.php?login=true'; </script>";
			}else{
				echo $password;
				echo $row["password"];
			}
		}
    }
	
}else{
	echo mysqli_error($con);
}


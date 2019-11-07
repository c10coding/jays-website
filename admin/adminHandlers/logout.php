<?php

session_start();

$logout = $_GET["logout"];
echo $logout;
if($logout == true){
	unset($_SESSION["LAST_ACTIVITY"]);
	unset($_SESSION["logged_in"]);
	$_SESSION["logged_in"] = false;
	header("Location:../admin.php");
}
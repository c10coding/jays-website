<?php 
for($x = 0;$x < $count; $x++){

	$img = $_SESSION["cart"][$x]["Image"];
	$item = $_SESSION["cart"][$x]["Item_Name"];
	$quantity = $_SESSION["cart"][$x]["Quantity"];
	$price = $_SESSION["cart"][$x]["Price"];
	$color = $_SESSION["cart"][$x]["Color"];
}
 ?>
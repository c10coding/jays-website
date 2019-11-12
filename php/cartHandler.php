

<?php
	session_start();
	//Makes an array within a sesssion
	if(!isset($_SESSION["cart"])){
		$_SESSION["cart"] = array();
		$session = $_SESSION["cart"];
	}else{
		$item_name = $_POST["item_name"];
		$add = $_POST["add"];
		$price = $_POST["price"];
		$item = array($item_name, $price, 1);
		if($add == true){
			$count = count($_SESSION["cart"]);
			echo $count;
			if($count == 0){
				echo "You have added this item to your cart!";
				array_push($_SESSION["cart"],$item);
			}else{
				for($x = 0;$x < $count;$x++){
					$current = $_SESSION["cart"][$x][0];
					$num = $x;
					echo $item[0];
					echo $current;
					print_r($_SESSION["cart"]);
					if($current == $item[0]){
						$_SESSION["cart"][$x][2]++;
						echo "You have added this item to your cart! bruh";
						print_r($_SESSION["cart"]);
						break;
					// If this item is not in the cart
					}else if($current ==! $item[0]){
						echo "You have added this item to your cart! do";
						print_r($_SESSION["cart"]);

						array_push($_SESSION["cart"],$item);
						break;
					}else{
					}
				}
			}
			

		}else{
			$_SESSION["cart"] = array_diff($_SESSION["cart"],$item);
			echo "You have removed this item from your cart!";
		}
	}	

	


?>
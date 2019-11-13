

<?php
	session_start();
	//Makes an array within a sesssion
	if(!isset($_SESSION["cart"])){
		$_SESSION["cart"] = array();
	}else{
		$item_name = $_POST["item_name"];
		$add = $_POST["add"];
		$price = $_POST["price"];
		$color = $_POST["color"];

		$item = array(
			"Item_Name"=>$item_name,
			"Price"=>$price,
			"Quantity"=>1,
			"Color"=>$color
		);

		$count = 0;
		foreach($_SESSION["cart"] as $product){
			$count+= count($product);
		}

		$count/=3;
		if($add == true){
			//If the array is empty, just push the item
			if($count == 0){
				echo "You have added this item to your cart!";
				array_push($_SESSION["cart"],$item);
			}else{

				$execute = false;

				for($x = 0;$x < $count;$x++){
					$currentIndex = $_SESSION["cart"][$x]["Item_Name"];
					if($item["Item_Name"] == $currentIndex){
						$index = $x;
						$_SESSION["cart"][$x]["Quantity"]++;
						echo "You have increased the quanitity of this item by 1!";
						$execute = false;
						break;
					}else{
						$execute = true;
					}

				}

				if($execute == true){
					echo "You have added this item to your cart!";
					array_push($_SESSION["cart"],$item);
				}

			}

		}else{
			$_SESSION["cart"] = array_diff($_SESSION["cart"],$item);
			echo "You have removed this item from your cart!";
		}
	}	

	


?>


<?php
	session_start();
	//Makes an array within a sesssion
	if(!isset($_SESSION["cart"])){
		$_SESSION["cart"] = array();
		if(!isset($_SESSION["totalPrice"])){
			$_SESSION["totalPrice"];
		}
	}else if(!isset($_POST["value"]) && !isset($_POST["remove"])){
		
		if(!isset($_SESSION["totalPrice"])){
			$_SESSION["totalPrice"] = 0;
		}

		$item_name = $_POST["item_name"];
		$add = $_POST["add"];
		$price = $_POST["price"];
		$color = $_POST["color"];
		$imgSrc = $_POST["imgSrc"];


		$count = 0;
		
		foreach($_SESSION["cart"] as $product){
			$count+= count($product);
		}

		$count/=5;

		for($n = 0; $n < $count;$n++){
			$currentPrice = $_SESSION["cart"][$n]["Price"];
			$_SESSION["totalPrice"] += $currentPrice;
		}

		//TURNS RGB TO COLOR
		//[Color] => rgb(255, 255, 0)
		$colors = array("black","white","red","orange","yellow","green","purple","pink","gray","brown");

		switch($color){
			case "rgb(0, 0, 0)":
				echo "fdsafdas";
				$color = "black";
				break;
			case "rgb(255, 255, 255)":
				$color = "black";
				break;	
			case "rgb(255, 0, 0)":
				$color = "red";
				break;
			case "rgb(255, 165, 0)":
				$color = "orange";
				break;
			case "rgb(255, 255, 0)":
				$color = "yellow";
				break;
			case "rgb(0, 128, 0)":
				$color = "green";
				break;
			case "rgb(128, 0, 128)":
				$color = "purple";
				break;
			case "rgb(255, 192, 203)":
				$color = "pink";
				break;
			case "rgb(128, 128, 128)":
				$color = "gray";
				break;
			case "rgb(152, 120, 84)":
				$color = "brown";
				break;
			default:
				$color = "white";
		}

		$item = array(
			"Item_Name"=>$item_name,
			"Price"=>$price,
			"Quantity"=>1,
			"Color"=>$color,
			"Image"=>$imgSrc
		);

		if($add == true){
			//If the array is empty, just push the item

			if($count == 0){
				echo "You have added this item to your cart!";
				array_push($_SESSION["cart"],$item);
			}else{

				$execute = false;

				for($x = 0;$x < $count;$x++){
					$currentProduct = $_SESSION["cart"][$x]["Item_Name"];
					$currentColor = $_SESSION["cart"][$x]["Color"];
					if($item["Item_Name"] == $currentProduct){
						if($item["Color"] == $currentColor){
							$index = $x;
							$_SESSION["cart"][$x]["Quantity"]++;
							echo "You have increased the quanitity of this item by 1!";
							$execute = false;
							break;
						}else{
							$execute = true;
						}
						
					}else{
						$execute = true;
					}

				}

				if($execute == true){
					echo "You have added this item to your cart!";
					array_push($_SESSION["cart"],$item);
				}

			}
		}

	}else{	
		if(isset($_POST["value"])){
			
			$quantity = $_POST["value"];
			$cartItemName = $_POST["cartItemName"];
			//GETTING THE PRICE OF THE ITEM
			include("connection.php");
			$sql = "SELECT * FROM product WHERE product_name='$cartItemName'";
			$results = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($results);
			$price = $row["price"];
			
			echo $quantity * $price;
		}else if(isset($_POST["remove"])){
			
			$removedItem = $_POST["remove"];

			$color = $_POST["color"];

			$count = 0;
		
			foreach($_SESSION["cart"] as $product){
				$count+= count($product);
			}

			$count/=5;
			for($x = 0;$x < $count;$x++){
				$currentItemColor = $_SESSION["cart"][$x]["Color"]; 
				$currentItemName = $_SESSION["cart"][$x]["Item_Name"];

				$removedItem = trim($removedItem);
				$currentItemName = trim($currentItemName);

				$currentItemColor = trim($currentItemColor);
				$color = trim($color);

				if($removedItem == $currentItemName){
					if($color == $currentItemColor){
						unset($_SESSION["cart"][$x]);
						$_SESSION["cart"] = array_values($_SESSION["cart"]);
						$removed = true;
						echo $removed;
						break;
					}
				}
			}
		}else{
			echo "There has been an error!";
		}
		
	}

	


?>
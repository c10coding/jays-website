

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
			$count = 0;
			foreach ($_SESSION["cart"] as $type) {
    			$count+= count($type);
			}
			$count/=3;
			if($count == 0){
				array_push($_SESSION["cart"],$item);
			}else{
				for($x = 0;$x <= $count;$x++){
					$current = $_SESSION["cart"][$x][0];
					$num = $x;
					if($current == $item[0]){
						$_SESSION["cart"][$x][2]++;
						echo "here";
						break;
					}else if($current ==! $item[0] && $x == $count){
						echo "herefds";
						array_push($_SESSION["cart"],$item);
						break;
					}else if($current ==! $item[0] && $num == 0){
						echo "herefdssdfafsadfds";
						array_push($_SESSION["cart"],$item);
						break;
					}else{

					}
				}
			}
			

		}else{
			//$_SESSION["cart"] = array_diff($_SESSION["cart"],$item);
			//echo "You have removed this item from your cart!";
		}
	}	

	


?>
<?php 
	include("connection.php");
	session_start();
	$discountCode = $_POST["code"];
	$sql = "SELECT * FROM discountcode WHERE code='$discountCode'";
	$results = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($results);
	$percentage = $row["percentage"];
	$numRows = mysqli_num_rows($results);

	if($numRows == 0){
		die("This code is not valid!");
	}else{

		if(!isset($_SESSION["codeUsed"])){
			$_SESSION["codeUsed"] = array();
		}else{
			$count = count($_SESSION["codeUsed"]);
			if($count == 0){
				array_push($_SESSION["codeUsed"],$discountCode);
				$used = $row["used"];
				$used++;
				$sql = "UPDATE discountCode SET used='$used' WHERE code='$discountCode'";
				$results = mysqli_query($con, $sql);
				// If the discount code is valid then set bool to true so that javascript can handle the stuff from there.
				$bool = "true";
			}else{
				for($x = 0; $x < $count; $x++){
					if($discountCode == $_SESSION["codeUsed"][$x]){
						die("You have already used this discount code!");
					}else{
						array_push($_SESSION["codeUsed"],$discountCode);
						$used = $row["used"];
						$used++;
						$sql = "UPDATE discountCode SET used='$used' WHERE code='$discountCode'";
						$results = mysqli_query($con, $sql);
						// If the discount code is valid then set bool to true so that javascript can handle the stuff from there.
						$bool = "true";
						break;
					}
				}
			}
		}
	}
 ?>
 <script type="text/javascript"> 
 	var bool = "<?php echo $bool ?>";
 	if(bool == "true"){
 		var percentage = <?php echo $percentage ?>;
 		percentage = parseInt(percentage);
 		var discountMessagePos = $("#tryDiscountCodeMessage");
 		var totalPrice = discountMessagePos.next().next().next().text();

 		var temp = totalPrice.substring(16);
 		var temp2 = temp.split(' ');
 		var price = temp2[1];

 		price = parseInt(price);
 		percentage = "0." + percentage;
 		percentage = parseFloat(percentage);

 		var percentageOff = price * percentage;

 		var price = price - percentageOff;

 		$(discountMessagePos.next().next().next()).text("Total price: " + price + " USD");
 		$(discountMessagePos).text("You have saved " + percentageOff + " by used this discount code");
 	}
 </script>
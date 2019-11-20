<?php
	session_start();
	include("php/totalPriceOfCart.php");
	//Makes sure that floor is a whole number
	$count = floor($count);

	// **** This was when i was trying to get random products to echo out. *****
	/*
	function rollNums($numRows){

		$arrNums = array();
		$numRows = $numRows;
		$randNum = mt_rand(1,$numRows);
		$randNum2 = mt_rand(1,$numRows);
		$randNum3 = mt_rand(1,$numRows);
		$randNum4 = mt_rand(1,$numRows);

		array_push($arrNums,$randNum);
		array_push($arrNums,$randNum2);
		array_push($arrNums,$randNum3);
		array_push($arrNums,$randNum4);

		foreach ($arrNums as $num) {
			echo $num;
		}

	}
	function checkRandomNums($numRows){

		$good = false;
		rollNums($numRows);

		while($good == false){
			for($x = 0;$x < count($arrNums)-1; $x++){
				for($i = 0; $i < count($arrNums)-1;$i++){
					if($x == $i){
						rollNums($numRows);
						$x = 0;
						$i = 0;
					}
				}
			}
		}
		

	}

	function getRandProductData(){
		include("php/connection.php");
		//Gets all the items from the database so that we can get a row number
		$sql = "SELECT * FROM product";
		$results = mysqli_query($con,$sql);
		$numRows = mysqli_num_rows($results);
		checkRandomNums($numRows);
		
		//Gets a product at random
		$sql = "SELECT * FROM product WHERE id='$randNum'";
		$results = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($results);
			
		//Variables for each product that need to be displayed
		$product_name = $row["product_name"];
		$price = $row["price"];

		$availableImages = array();
		$availableColors = array();

		//Gets the images that are actually in the databse and aren't null; also relates them to the corresponding color
		$colors = array("black","white","red","orange","yellow","green","purple","pink","gray","brown");

		for($x = 0;$x < 10;$x++){
			$current = $row[$colors[$x]];
			if(!empty($current)){
				
				array_push($availableImages, $current);
				array_push($availableColors, $colors[$x]);

			}
		}
	}*/

	function getProduct($num, $whatIWant){
		include("php/connection.php");
		$availableImages = array();
		$availableColors = array();
		$myRow = $num - 1;

		$sql = "SELECT * FROM product WHERE product_type='bracelet' ORDER BY id LIMIT 1 OFFSET $myRow" ;
		$results = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($results);

		//Variables for each product
		$name = $row["product_name"];
		$price = $row["price"];
		
		//Gets the images that are actually in the databse and aren't null; also relates them to the corresponding color
		$colors = array("black","white","red","orange","yellow","green","purple","pink","gray","brown");
		
		for($x = 0;$x < 10;$x++){
			$current = $row[$colors[$x]];
			if(!empty($current)){
				
				array_push($availableImages, $current);
				array_push($availableColors, $colors[$x]);

			}
		}

		if($whatIWant == "colors"){
			echoColors($availableColors);
		}else if($whatIWant == "name"){
			echo $name;
		}else if($whatIWant == "price"){
			echo $price . " USD";
		}else if($whatIWant == "image"){
			echo "<img src='pics/$availableImages[0]'>";
		}else if($whatIWant == "colorButton"){
			echoFirstColor($availableColors);
		}

	}

	function echoFirstColor($arr){
		$firstColor = $arr[0];
		echo "<div class='colorButton' style='background-color:$firstColor'></div>";
	}

	function echoColors($arr){

		for($i = 0;$i < count($arr);$i++){
			$color = $arr[$i];
			$id = $color . "Color";

			if($color == "brown"){
				$color = "#987854";
			}
			echo "<li class='list-inline-item'>
					<div class='inColorPicker' style='display:block;background-color:$color;' id='$id'></div>
				</li>";

		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart | CupWorm</title>
	<!-- BOOTSTRAP -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- JS -->
	<script type="text/javascript" src="js/script.js"></script>
	<!-- INTERNAL STYLING -->
	<style type="text/css"></style>
	<!-- STYLESHEET -->
	<link rel="stylesheet" href="style/style.css">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="font-awesome/css/all.css">
	<!-- ESSENTIAL META TAGS -->
	<meta name="viewport" content="width=device-width, intitial-scale=1, shrink-to-fit-no">
	<meta charset="utf-8">
</head>
<body>
<div class="centered"></div>
	<!-- CONTACT MODAL -->
	<div id="contactModal" class="centered">
		<i class="fas fa-times" id="contactClose"></i>
		<h2>Contact us</h2>
		<form action="php/contactHandle.php" method="POST" id="contactForm">
			<div class="contactInputWrap">
				<label>Email</label>
				<input type="email" name="email" id="contactEmail" class="form-control">
			</div>
			
			<div class="contactInputWrap">
				<label>Name</label>
				<input type="text" name="name" id="contactName" class="form-control">
			</div>

			<div class="contactInputWrap">
				<label>Message</label>
				<textarea class="form-control" id="contactMessage" name="message"></textarea>
			</div>

			<br>

			<p id="contactSubMessage">Your message has been sent!</p>
			<input type="submit" name="contactSubmit" class="btn btn-primary">
			<p style="font-family:var(--secondF);margin-top:10px;">We will get back to you in 48 hours</p>

		</form>
	</div>
	
	<div id="opacity" style="transition:.5s;">
	
		<!-- DESKTOP NAVIGATION -->
		<nav>
			<div class="col-md-12">
				<ul class="list-inline">
					<li class="list-inline-item">
						<a href="../" id="homeLink" style="color:var(--blue)">
							<i class="fas fa-home"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<span style="color:var(--blue)">Cup</span><span style="color:var(--yellow)">Worm</span>
					</li>
					<div style="float:right;" id="shopAndBrowse">
						<li class="list-inline-item">
							<a href="#" id="browseLink">
								<p>Browse</p>
							</a>
						</li>
						<li class="list-inline-item">
							<p id="contactUs">Contact us</p>
						</li>
						<li class="list-inline-item">
							<a href="#" id="cartLink">
								<i class="fas fa-shopping-cart"></i>
							</a>
							<span style="font-size:50%;border-radius:180px;border:hidden;">
								<?php
									echo $count;
								?>
							</span>
						</li>
					</div>
				</ul>
			<i class="fas fa-bars" id="mobileNavButton"></i>
			</div>
		</nav>
		<!-- MOBILE NAVIGATION -->
		<div id="mobileNavPopout">
			<ul class="list-unstyled">
				<a href="#">
					<li>Browse</li>
				</a>
				<a href="#" id="contactUsMobile">
					<li>Contact us</li>
				</a>
				<a href="#">
					<li>Cart</li>
				</a>
			</ul>
		</div>
		<br><br><br><br>
		<h1 id="cartHeader">CART</h1>
		<a href="#" id="continueShop">
			<i class="fas fa-arrow-circle-left" ></i><span>Continue shopping</span>
		</a>

		<div id="cartInfo">
			<table style="width:100%;"> 
				<tr>
					<th>Remove item</th>
					<th></th>
					<th>Item</th>
					<th>Quanitity</th>
					<th>Price</th>
				</tr>
				<?php
					include("php/countCart.php");
					for($x = 0;$x < $count; $x++){

						$img = $_SESSION["cart"][$x]["Image"];
						$item = $_SESSION["cart"][$x]["Item_Name"];
						$quantity = $_SESSION["cart"][$x]["Quantity"];
						$price = $_SESSION["cart"][$x]["Price"];
						$color = $_SESSION["cart"][$x]["Color"];

						echo "<tr>";
						echo '<td><i class="fas fa-times removeItem"></i></td>';
						echo "<td><img src='pics/$img'></td>";
						echo "<td>" . $item . " ($color)" . "</td>";
						echo "<td>" . "<input type='number' value='$quantity' class='cartQuantity'>" . "</td>";
						echo "<td>" . $price * $quantity . " USD" . "</td>";
						echo "</tr>";

					}
				?>
			</table>
		</div>
		<!-- ************ DISCOUNT CODES ************ -->
		<!-- 
		<h2 id="discountText">Discount code</h2>
		<p id="tryDiscountCodeMessage" class="text-success" style="margin-left:12%;font-size:90%;padding-top:10px;padding-bottom:5px"></p>
		<div class="input-group mb-3" id="discountGroup">
			<input type="text" class="form-control" placeholder="Put discount code here..." aria-label="Recipient's username" aria-describedby="basic-addon2" id="inputDiscountCode">
			<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="button" id="tryDiscountCode">Try code</button>
			</div>
		</div>-->
		
		<button id="continueToCheckout" onclick="window.location.href = 'checkout.php'">Continue to checkout</button>
		<h2 id="cartPrice">
			<?php
				echo "Total price: " . "<span style='color:black'>" . $totalPrice  . " USD" . "</span>";
			?>
		</h2>
		<?php



		?>
			
		<!-- OTHER THINGS YOU MAY LIKE -->
		<h2 id="otherThingsHeader">Here's some other things you may like!</h2>
		<div class="row" id="braceletRow">

			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<?php
						getProduct(4, "image");
					?>
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<?php
						getProduct(4, "colorButton");
					?>
					<ul class="list-inline colorPicker">
						<?php
							getProduct(4, "colors");
						?>
					</ul>
				</div>
				
				<h2>
					<?php
						getProduct(4, "name");
					?>
				</h2>
				<p><?php
						getProduct(4, "price") . " USD";
					?>
				</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success cart_success_message" style="font-family:var(--secondF)"></p>
			</div>
			<!-- SECOND PRODUCT -->
			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<?php
						getProduct(5, "image") . " USD";
					?>
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<?php
						getProduct(5, "colorButton");
					?>
					<ul class="list-inline colorPicker">
						<?php
							getProduct(5, "colors");
						?>
					</ul>
				</div>
				

				<h2>
					<?php
						getProduct(5, "name");
					?>
				</h2>
				<p><?php
						getProduct(5, "price") . " USD";
					?>
				</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success cart_success_message" style="font-family:var(--secondF)"></p>
			</div>
			<!-- THIRD PRODUCT -->
			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<?php
						getProduct(6, "image") . " USD";
					?>
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<?php
						getProduct(6, "colorButton");
					?>
					<ul class="list-inline colorPicker">
						<?php
							getProduct(6, "colors");
						?>
					</ul>
				</div>
				

				<h2>
					<?php
						getProduct(6, "name");
					?>
				</h2>
				<p><?php
						getProduct(6, "price") . " USD";
					?>
				</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success cart_success_message" style="font-family:var(--secondF)"></p>
			</div>
			<!-- FOURTH PRODUCT -->
			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<?php
						getProduct(7, "image") . " USD";
					?>
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<?php
						getProduct(7, "colorButton");
					?>
					<ul class="list-inline colorPicker">
						<?php
							getProduct(7, "colors");
						?>
					</ul>
				</div>
				

				<h2>
					<?php
						getProduct(7, "name");
					?>
				</h2>
				<p><?php
						getProduct(7, "price") . " USD";
					?>
				</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success cart_success_message" style="font-family:var(--secondF)"></p>
			</div>
				
		</div>
		<br><br>
		<!-- FOOTER -->
		<footer>
			<div class="row">
				<div class="col-lg-6">
					<h2><span style="color:var(--blue)">CUP</span><span style="color:var(--yellow)">WORM</span></h2>
					<div style="text-align:center;">
						<img src="pics/CupWorm.png">
					</div>
				</div>
				<div class="col-lg-6">
					<h2>MORE</h2>
					<ul class="list-unstyled" id="footerUl">
						<li>
							<a href="">Bracelets</a>
						</li>
						<li>
							<a href="#">Cart</a>
						</li>
						<li>
							<a href="#">Necklaces</a>
						</li>
						<li>
							<a href="#" id="footerContact">Contact us</a>
						</li>
						<li>
							<a href="#">Browse</a>
						</li>
					</ul>
					
				</div>	
			</div>
		</footer>
		<!-- MY CREDIT -->
		<div class="col-lg-12" id="myCredit">
			<p>Website made by <a href="https://caleb-development.000webhostapp.com">Caleb Owens</a></p>
		</div>

</body>
</html>
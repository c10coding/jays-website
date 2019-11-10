<?php

	

	if(isset($_SESSION["cart"])){
		session_start();
		$cart = $_SESSION["cart"];
	}
	

	function getBracelet($num, $what){

		include("php/connection.php");
		$availableImages = array();
		$availableColors = array();

		$myRow = $num - 1;
		$sql = "SELECT * FROM product WHERE product_type='bracelet' LIMIT 1 OFFSET $myRow";
		$results = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($results);

		//Variables for each product
		$name = $row["product_name"];
		$price = $row["price"];
		
		$colors = array("black","white","red","orange","yellow","green","purple","pink","gray","brown");
		
		for($x = 0;$x < 10;$x++){
			$current = $row[$colors[$x]];
			if(!empty($current)){
				
				array_push($availableImages, $current);
				array_push($availableColors, $colors[$x]);

			}
		}

		if($what == "colors"){
			echoColors($availableColors);
		}else if($what == "name"){
			echo $name;
		}else if($what == "price"){
			echo $price;
		}else if($what == "image"){
			echo "<img src='pics/$availableImages[0]'>";
		}

	}
		
	function getNecklace($num,$what){

		include("php/connection.php");

		$availableImages = array();
		$availableColors = array();

		$myRow = $num - 1;
		$sql = "SELECT * FROM product WHERE product_type='necklace' LIMIT 1 OFFSET $myRow";
		$results = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($results);

		//Variables for each product
		$name = $row["product_name"];
		$price = $row["price"];
		
		$colors = array("black","white","red","orange","yellow","green","purple","pink","gray","brown");
		
		for($x = 0;$x < 10;$x++){
			$current = $row[$colors[$x]];
			if(!empty($current)){
				
				array_push($availableImages, $current);
				array_push($availableColors, $colors[$x]);
			}
		}

		if($what == "colors"){
			echoColors($availableColors);
		}else if($what == "name"){
			echo $name;
		}else if($what == "price"){
			echo $price;
		}else if($what == "image"){
			echo "<img src='pics/$availableImages[0]'>";
		}
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
	<title>CupWorm Jewelry</title>
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
						<a href="#" id="homeLink" style="color:var(--blue)">
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
							<a href="cart.php" id="cartLink">
								<i class="fas fa-shopping-cart"></i>
							</a>
							<span style="font-size:50%;border-radius:180px;border:hidden;">3</span>
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
		<!-- SLIDESHOW -->
		<div id="slideshow">
			<h3>Like what you see? Let's do business!</h3>
			<button>Shop for more!</button>
			<i class="fas fa-arrow-alt-circle-right" id="slideRightArrow"></i>
			<i class="fas fa-arrow-alt-circle-left" id="slideLeftArrow"></i>
			<img src="pics/testL.jpg" id="slideShowImg">
		</div>


		<!-- BRACELET -->
		<!-- FIRST PRODUCT -->
		<h1 id="braceleth1">Bracelets</h1>
		<div class="row" id="braceletRow">

			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<?php
						getBracelet(1,"image");
					?>
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<div class="colorButton"></div>
					<ul class="list-inline colorPicker">
						<?php
							getBracelet(1, "colors");
						?>
					</ul>
				</div>
				
				<h2>
					<?php
						getBracelet(1, "name");
					?>
				</h2>
				<p><?php
						echo getBracelet(1, "price") . " USD";
					?>
				</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success cart_success_message" style="font-family:var(--secondF)"></p>
			</div>
			<!-- SECOND PRODUCT -->
			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<?php
						getBracelet(2,"image");
					?>
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<div class="colorButton"></div>
					<ul class="list-inline colorPicker">
						<?php
							getBracelet(2, "colors");
						?>
					</ul>
				</div>
				

				<h2>
					<?php
						getBracelet(2, "name");
					?>
				</h2>
				<p><?php
						echo getBracelet(2, "price") . " USD";
					?>
				</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success cart_success_message" style="font-family:var(--secondF)"></p>
			</div>
			<!-- THIRD PRODUCT -->
			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<?php
						getBracelet(3,"image");
					?>
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<div class="colorButton"></div>
					<ul class="list-inline colorPicker">
						<?php
							getBracelet(3, "colors");
						?>
					</ul>
				</div>
				

				<h2>
					<?php
						getBracelet(3, "name");
					?>
				</h2>
				<p><?php
						echo getBracelet(3, "price") . " USD";
					?>
				</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success cart_success_message" style="font-family:var(--secondF)"></p>
			</div>
			<!-- FOURTH PRODUCT -->
			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<?php
						getBracelet(4,"image");
					?>
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<div class="colorButton"></div>
					<ul class="list-inline colorPicker">
						<?php
							getBracelet(4, "colors");
						?>
					</ul>
				</div>
				

				<h2>
					<?php
						getBracelet(4, "name");
					?>
				</h2>
				<p><?php
						echo getBracelet(4, "price") . " USD";
					?>
				</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success cart_success_message" style="font-family:var(--secondF)"></p>
			</div>
				
		</div>

		<!-- NECKLACES -->
		<h1 id="necklaceh1">Necklaces</h1>
		<div class="row" id="necklaceRow">
			
			<!-- THIRD PRODUCT -->
			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<?php
						getNecklace(1,"image");
					?>
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<div class="colorButton"></div>
					<ul class="list-inline colorPicker">
						<?php
							getNecklace(1, "colors");
						?>
					</ul>
				</div>
				

				<h2>
					<?php
						getNecklace(1, "name");
					?>
				</h2>
				<p><?php
						echo getNecklace(1, "price") . " USD";
					?>
				</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success cart_success_message" style="font-family:var(--secondF)"></p>
			</div>

			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<img src="pics/bracelet.jpg">
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<div class="colorButton"></div>
					<ul class="list-inline colorPicker">
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:blue;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:red;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:orange;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:black;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker"></div>
						</li>
					</ul>
				</div>
				

				<h2>Resin Octagonal Hoop Earrings</h2>
				<p>$22.50</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success" style="font-family:var(--secondF)" class="cart_success_message"></p>
			</div>

			<div class="col-lg-3">

				<div class="braceletImgWrap">
					<img src="pics/bracelet.jpg">
				</div>

				<div class="colors">
					<div class="colorButton"></div>
					<ul class="list-inline colorPicker">
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:blue;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:red;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:orange;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:black;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker"></div>
						</li>
					</ul>
				</div>
				
				<h2>Resin Octagonal Hoop Earrings</h2>
				<p>$22.50</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success" style="font-family:var(--secondF)" class="cart_success_message"></p>

			</div>

			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<img src="pics/bracelet.jpg">
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors">
					<div class="colorButton"></div>
					<ul class="list-inline colorPicker">
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:blue;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:red;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:orange;"></div>
						</li>
						<br>
						<li class="list-inline-item">
							<div class="inColorPicker" style="background-color:black;"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker"></div>
						</li>
						<li class="list-inline-item">
							<div class="inColorPicker"></div>
						</li>
					</ul>
				</div>
				

				<h2>Resin Octagonal Hoop Earrings</h2>
				<p>$22.50</p>
				<button class="add_to_cart">Add to cart</button>
				<p class="ml-2 mt-1 text-success" style="font-family:var(--secondF)" class="cart_success_message"></p>
			</div>

		</div>
		<br>
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
	</div>
	
</body>
</html>
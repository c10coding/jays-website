<?php 
	session_start();
	include("../php/countCart.php");

	function getNecklace($num, $what){

		include("../php/connection.php");
		$availableImages = array();
		$availableColors = array();

		$myRow = $num - 1;
		$sql = "SELECT * FROM product WHERE product_type='necklace' ORDER BY id DESC LIMIT 1 OFFSET $myRow" ;
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

		if($what == "colors"){
			echoColors($availableColors);
		}else if($what == "name"){
			echo $name;
		}else if($what == "price"){
			echo $price;
		}else if($what == "image"){
			echo "<img src='../pics/$availableImages[0]'>";
		}else if($what == "colorButton"){
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
	<title>Bracelets | CupWorm</title>
	<!-- BOOTSTRAP -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- JS -->
	<script type="text/javascript" src="../js/script.js"></script>
	<!-- INTERNAL STYLING -->
	<style type="text/css">
		#necklaceLink{
			line-height: 74px;
			height: 74px;
		}
		#contactUs{
			font-size:85%;
		}

		@media only screen and (max-width: 800px) {
			#shopAndBrowse{
				font-size:73%;
			}
			#cupWormNav{
				font-size:120%;
			}
		}
	</style>
	<!-- STYLESHEET -->
	<link rel="stylesheet" href="../style/style.css">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="../font-awesome/css/all.css">
	<!-- ESSENTIAL META TAGS -->
	<meta name="viewport" content="width=device-width, intitial-scale=1, shrink-to-fit-no">
	<meta charset="utf-8">
</head>

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
						<a href="../index.php" id="homeLink" style="color:var(--blue)">
							<i class="fas fa-home"></i>
						</a>
					</li>
					<li class="list-inline-item" id="cupWormNav">
						<span style="color:var(--blue)">Cup</span><span style="color:var(--yellow)">Worm</span>
					</li>
					<div style="float:right;" id="shopAndBrowse">
						<li class="list-inline-item">
							<a href="necklaces.php" id="necklaceLink">
								<p>Necklaces</p>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="bracelets.php" id="braceletLink">
								<p>Bracelets</p>
							</a>
						</li>
						<li class="list-inline-item">
							<p id="contactUs">Contact us</p>
						</li>
						<li class="list-inline-item">
							<a href="../cart.php" id="cartLink">
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
				<a href="#" id="browseLink">
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

		<!-- BROWSE TAB -->
		<div id="browseTab">
			
			<i class="fas fa-times" id="browseClose"></i>
			
			<ul class="list-inline">
				<li class="list-inline-item">	
					<a href="bracelets.php">Bracelets</a>
				</li>
				<li class="list-inline-item">
					<a href="necklaces.php">Necklaces</a>
				</li>
			</ul>

		</div>

		<!-- BRACELET -->
		<!-- FIRST PRODUCT -->
		<h1 id="necklaceh1">Necklaces</h1>
		
		<?php
			include("../php/connection.php");
			$sql = "SELECT * FROM product WHERE product_type='necklace'";
			$results = mysqli_query($con, $sql);
			$row = mysqli_fetch_assoc($results);
			$numRows = mysqli_num_rows($results);

			$count = 1;

			for($x = 0;$x < $numRows/4;$x++){
				echo "<div class=\"row\" id=\"braceletRow\">";
				for($i = 1;$i <= 4; $i++){
					
					echo "<div class=\"col-lg-3\">";
						echo "<div class=\"braceletImgWrap\">";
							//Image
							getNecklace($count,"image");
						echo "</div>";

						echo "<div class=\"colors\">";
							//ColorButton
							getNecklace($count, "colorButton");
							echo "<ul class=\"list-inline colorPicker\">";
							//Colors
								getNecklace($count, "colors");
							echo "</ul>";
						echo "</div>";

						echo "<h2>";
							getNecklace($count,"name");
						echo "</h2>";

						echo "<p>";
							echo getNecklace($count,"price") . " USD";
						echo "</p>";

						echo "<button class=\"add_to_cart\">Add to cart</button>";
						echo "<p class=\"ml-2 mt-1 text-success cart_success_message\" style=\"font-family:var(--secondF)\"></p>";

					echo "</div>";

					$count++;


				}
				echo "</div>";
			}
		?>

	<!-- FOOTER -->
		<footer>
			<div class="row">
				<div class="col-lg-6">
					<h2><span style="color:var(--blue)">CUP</span><span style="color:var(--yellow)">WORM</span></h2>
					<div style="text-align:center;">
						<img src="../pics/CupWorm.png">
					</div>
				</div>
				<div class="col-lg-6">
					<h2>MORE</h2>
					<ul class="list-unstyled" id="footerUl">
						<li>
							<a href="bracelets.php">Bracelets</a>
						</li>
						<li>
							<a href="../cart.php">Cart</a>
						</li>
						<li>
							<a href="necklaces.php">Necklaces</a>
						</li>
						<li>
							<a href="#" id="footerContact">Contact us</a>
						</li>
						<li>
							<a href="#" id="footerBrowseLink">Browse</a>
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


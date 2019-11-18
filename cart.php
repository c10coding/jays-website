<?php
	session_start();
	if(isset($_SESSION["cart"])){
		
		$cart = $_SESSION["cart"];

		$count = 0;
		foreach($_SESSION["cart"] as $product){
			$count+= count($product);
		}

		$count/=5;

	}else{
		$count = 0;
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
					$totalPrice = 0;
					for($x = 0;$x < $count; $x++){

						$img = $_SESSION["cart"][$x]["Image"];
						$item = $_SESSION["cart"][$x]["Item_Name"];
						$quanitity = $_SESSION["cart"][$x]["Quantity"];
						$price = $_SESSION["cart"][$x]["Price"];
						$color = $_SESSION["cart"][$x]["Color"];
						
						$totalPrice += $price;

						echo "<tr>";
						echo '<td><i class="fas fa-times removeItem"></i></td>';
						echo "<td><img src='pics/$img'></td>";
						echo "<td>" . $item . " ($color)" . "</td>";
						echo "<td>" . "<input type='number' step='1' value='$quanitity' class='cartQuantity'>" . "</td>";
						echo "<td>" . $price * $quanitity . " USD" . "</td>";
						echo "</tr>";

					}
				?>
				<!--
				<tr>
					<td><i class="fas fa-times"></i></td>
					
					<td>This is my first item</td>
					<td><input type="text" value="1"></td>
					<td>$1</td>
				</tr>
				<tr>
					<td><i class="fas fa-times"></i></td>
					<td><img src="pics/testL.jpg"></td>
					<td>Item1</td>
					<td>2</td>
					<td>$2</td>
				</tr>
				<tr>
					<td><i class="fas fa-times"></i></td>
					<td><img src="pics/testL.jpg"></td>
					<td>Item1</td>
					<td>3</td>
					<td>$50</td>
				</tr>-->
			</table>
		</div>

		<h2 id="discountText">Discount code</h2>
		<div class="input-group mb-3" id="discountGroup">
			<input type="text" class="form-control" placeholder="Put discount code here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="button">Try code</button>
			</div>
		</div>
		
		<button id="continueToCheckout" onclick="window.location.href = 'checkout.php'">Continue to checkout</button>
		<h2 id="cartPrice">
			<?php
				echo "Total price: " . "<span style='color:black'>" . $totalPrice  . " USD" . "</span>";
			?>
		</h2>
		<!-- OTHER THINGS YOU MAY LIKE -->
		<h2 id="otherThingsHeader">Here's some other things you may like!</h2>
		<div class="row" id="otherThings">
			<div class="col-lg-3">
				<img src="pics/testL.jpg">
				<h2>This is an item</h2>
				<p>$50</p>
				<button>Add to cart</button>
			</div>
			<div class="col-lg-3">
				<img src="pics/testL.jpg">
				<h2>This is another item</h2>
				<p>$50</p>
				<button>Add to cart</button>
			</div>
			<div class="col-lg-3">
				<img src="pics/testL.jpg">
				<h2>This is another item as well</h2>
				<p>$50</p>
				<button>Add to cart</button>
			</div>
			<div class="col-lg-3">
				<img src="pics/testL.jpg">
				<h2>This is the last item</h2>
				<p>$50</p>
				<button>Add to cart</button>
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
<!-- JS -->
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
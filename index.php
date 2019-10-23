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
			<label>Email</label>
			<input type="email" name="email" id="contactEmail" class="form-control">

			<label>Name</label>
			<input type="text" name="name" id="contactName" class="form-control">

			<label>Message</label>
			<textarea class="form-control" id="contactMessage" name="message"></textarea>

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
							<a href="#" id="cartLink">
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
				<a href="">
					<li>Browse</li>
				</a>
				<a href="">
					<li>Contact us</li>
				</a>
				<a href="">
					<li>Cart</li>
				</a>
			</ul>
		</div>
		<!-- SLIDESHOW -->
		<div id="slideshow">
			<i class="fas fa-arrow-alt-circle-right" id="slideRightArrow"></i>
			<i class="fas fa-arrow-alt-circle-left" id="slideLeftArrow"></i>
			<img src="pics/testL.jpg" id="slideShowImg">
		</div>
		<!-- BRACELET -->
		<h1 id="braceleth1">Bracelets</h1>
		<div class="row" id="braceletRow">

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
				<button onclick="window.location.href = '#'">Add to cart</button>
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
				<button onclick="window.location.href = '#'">Add to cart</button>
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
				<button onclick="window.location.href = '#'">Add to cart</button>
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
				<button onclick="window.location.href = '#'">Add to cart</button>
			</div>

		</div>

		<!-- NECKLACES -->
		<h1 id="necklaceh1">Necklaces</h1>
		<div class="row" id="necklaceRow">
			

			<div class="col-lg-3">
				<div class="braceletImgWrap">
					<img src="pics/bracelet.jpg">
				</div>

				<!-- THE THING THAT ALLOWS YOU TO CHANGE THE COLOR OF THE PICTURE -->
				<div class="colors" style="position:relative">
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
				<button onclick="window.location.href = '#'">Add to cart</button>
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
				<button onclick="window.location.href = '#'">Add to cart</button>
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
				<button onclick="window.location.href = '#'">Add to cart</button>

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
				<button onclick="window.location.href = '#'">Add to cart</button>
			</div>

		</div>
		
		<!-- FOOTER -->
		<footer>
			<div class="row">
				<div class="col-lg-6">
					<h2><span style="color:var(--blue)">CUP</span><span style="color:var(--yellow)">WORM</span></h2>
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
							<a href="#">Contact us</a>
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



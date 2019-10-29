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
</body>
</html>
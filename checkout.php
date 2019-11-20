<?php 
	session_start();
	echo $_SESSION["totalPrice"];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout | CupWorm</title>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- INTERNAL STYLING -->
	<style type="text/css"></style>
	<!-- STYLESHEET -->
	<link rel="stylesheet" href="style/chargeStyle.css">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="font-awesome/css/all.css">
	<!-- ESSENTIAL META TAGS -->
	<meta name="viewport" content="width=device-width, intitial-scale=1, shrink-to-fit-no">
	<meta charset="utf-8">
</head>
<body>
		
	<div class="container">
		<h2 class="my-4 text-center">Checkout</h2>
		<form action="php/charge.php" method="post" id="payment-form">
			<div class="form-row">
				<input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
				<input type="text" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name" name="last_name">
				<input type="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="example@gmail.com" name="email">

				<div id="card-element" class="form-control">
				  <!-- A Stripe Element will be inserted here. -->
				</div>

				<!-- Used to display form errors. -->
				<div id="card-errors" role="alert"></div>
			</div>

			<button>Submit Payment</button>
		</form>
	</div>
	
	<script src="https://js.stripe.com/v3/"></script>
	<script src="js/charge.js"></script>
</body>
</html>
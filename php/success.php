<?php
	if (!empty($_GET['tid']) && !empty($_GET['product'])) {
		$GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

		$tid = $GET['tid'];
		$product = $GET['product'];
	}else{
		header("Location: ../index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thank you!</title>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="container mt-4">
		<h2 class="text-center">Thank you for shopping!</h2>
		<p class="mt-1">You will recieve your order in 2 weeks. Check your email for information of your order. If you have any questions or concerns, please contact me!</p>
		<p><a href="../index.php" class="btn btn-light mt-2">Go back</a></p>
	</div>
</body>
</html>
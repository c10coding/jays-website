<?php
	session_start();
	$time = $_SERVER['REQUEST_TIME'];

	/**
	* for a 30 minute timeout, specified in seconds
	*/
	$timeout_duration = 604800;

	/**
	* Here we look for the user's LAST_ACTIVITY timestamp. If
	* it's set and indicates our $timeout_duration has passed,
	* blow away any previous $_SESSION data and start a new one.
	*/
	if (isset($_SESSION['LAST_ACTIVITY']) && 
	   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
	    session_unset();
	    session_destroy();
	    session_start();
	}

	/**
	* Finally, update LAST_ACTIVITY so that our timeout
	* is based on it and not the user's login time.
	*/
	$_SESSION['LAST_ACTIVITY'] = $time;

	//Logs out user
	if($_SESSION["logged_in"] == false){
		header("Location: ../index.php ");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control Panel | CupWorm</title>
	<!-- BOOTSTRAP -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- JS -->
	<script type="text/javascript" src="../js/script.js"></script>
	<!-- INTERNAL STYLING -->
	<style type="text/css"></style>
	<!-- STYLESHEET -->
	<link rel="stylesheet" href="../style/style.css">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="../font-awesome/css/all.css">
	<!-- ESSENTIAL META TAGS -->
	<meta name="viewport" content="width=device-width, intitial-scale=1, shrink-to-fit-no">
</head>
<body>
	<!-- Basic Colors

	Red, Orange, Yellow, Green, Blue, Purple, Pink, Gray, Black, White, Brown

	-->
	<h1 class="text-center text-primary mt-4 mb-4">Add new item</h1>
	<ul class="list-inline text-center">
		<li class="list-inline-item">
			<a href="allItems.php" class="text-primary">See all items</a>
		</li>
		<li class="list-inline-item">
			<a href="adminHandlers/logout.php?logout=true" class="text-primary" id="adminLogout" name="logout">Logout</a>
		</li>
	</ul>
	<div class="container">
		<form action="adminHandlers/addItem.php" method="POST" enctype="multipart/form-data">
			
			<label class="mb-2">Product name</label>
			<input type="text" class="form-control mb-2" placeholder="Item name goes here..." name="product_name">

			<label class="mb-2">Product type</label>
			<select name="product_type" id="" class="mb-2 form-control">
				<option value="bracelet">Bracelet</option>
				<option value="necklace">Necklace</option>
			</select>

			<label class="mb-2">Price</label>
			<input type="text" class="form-control mb-2" placeholder="Item name goes here..." name="product_price">
			<!-- IMAGES -->
			<label class="mb-2">Image (Black)</label>
			<input type="file" class="form-control mb-2" name="black_image">

			<label class="mb-2">Image (White)</label>
			<input type="file" class="form-control mb-2" name="white_image">

			<label class="mb-2">Image (Red)</label>
			<input type="file" class="form-control mb-2" name="red_image">

			<label class="mb-2">Image (Orange)</label>
			<input type="file" class="form-control mb-2" name="orange_image">

			<label class="mb-2">Image (Yellow)</label>
			<input type="file" class="form-control mb-2" name="yellow_image">

			<label class="mb-2">Image (Green)</label>
			<input type="file" class="form-control mb-2" name="green_image">

			<label class="mb-2">Image (Purple)</label>
			<input type="file" class="form-control mb-2" name="purple_image">

			<label class="mb-2">Image (Pink)</label>
			<input type="file" class="form-control mb-2" name="pink_image">

			<label class="mb-2">Image (Gray)</label>
			<input type="file" class="form-control mb-2" name="gray_image">

			<label class="mb-2">Image (Brown)</label>
			<input type="file" class="form-control mb-2" name="brown_image">

			<input type="submit" class="btn btn-primary btn-md mt-2" name="submit">
		</form>
	</div>
	<p id="temp"></p>
	<script>
		

	</script>

</body>
</html>
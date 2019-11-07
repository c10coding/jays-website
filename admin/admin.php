<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | CupWorm</title>
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
	<meta charset="utf-8">
</head>
<body>
	<div class="container">	
		<h2 class="text-center text-primary mt-4 mb-2">Login</h2>
		<a href="../index.php" class="text-center text-primary mt-3 mb-3" style="display: block;">Go back home</a>
	<form action="adminHandlers/login.php" method="POST">
		
		<label>Username</label>
		<input type="text" class="form-control mb-2" name="username" id="adminUsername">
		<label>Password</label>
		<input type="password" class="form-control mb-3" name="password" id="adminPassword">
		<input type="submit" class="btn btn-primary btn-md mb-4" name="submit" id="adminSubmit">
		<br>
		<label>Remember me for 1 week</label>
		<input type="checkbox" id="adminCheckbox">
		<p class="text-danger ml-2" id="admin_log_message"></p>
	</form>
	</div>
	
</body>
</html>
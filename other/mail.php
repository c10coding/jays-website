<!-- MAIL -->
<!DOCTYPE html>
<html>
<head>
	<title>This email has HTML tags!</title>
	<!-- FONT AWESOME -->
	<link rel='stylesheet' href='../font-awesome/css/all.css'>
	<style type='text/css'>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:300|Notable|Playfair+Display&display=swap');

		:root{
			/*FONTS*/
			--bigF: 'Notable', sans-serif;
			--secondF: 'Montserrat', sans-serif;
			--thirdF: 'Playfair Display', serif;
			/*COLORS*/
			--red: #EF5455;
			--yellow: #FAD744;
			--blue: #2B3252;
		}
		.col-lg-12{
			padding:10px;
			margin:0;
		}
		p{
			color:var(--blue);
			padding:5px;
		}
		i{
			padding:10px;
			color:var(--blue);
			font-size:200%;
		}
	</style>
	<!-- BOOTSTRAP -->
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
</head>
<body>
	<div class='col-lg-12' style='background-color:var(--red);'>
		<p style='font-family:var(--bigF)'><span style='color:var(--blue)'>Hi</span> <span style='color:var(--yellow)'>Jay!</span></p>
		<p style='font-family:var(--secondF)'>A new person has wanted to contact you from your website!</p>
		<p style='font-family:var(--secondF)'><span style='text-decoration:underline'>Name:</span> $name</p>

		<i class='far fa-envelope-open'></i>
	</div>

</body>
</html>
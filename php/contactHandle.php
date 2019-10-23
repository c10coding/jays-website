<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
//DBC TYPE STUFF
$host="localhost";
$user="root";
$password="";
$dbc= mysqli_connect($host,$user,$password);

//GETTING THE POST VARIABLES
$email = mysqli_escape_string($dbc,$_POST["email"]);
$jay = "calebotherstuff@gmail.com";
$message = mysqli_escape_string($dbc,$_POST["message"]);
$name = mysqli_escape_string($dbc,$_POST["name"]);
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$msg = "
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
			background-color:#EF5455;
		}
		p{
			color:white;
			padding:5px;
		}
		img{
			padding:10px;
		}
	</style>
	<!-- BOOTSTRAP -->
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
</head>
<body>

	<div class='col-lg-12'>
		<p><span style='#2B3252'>Hi</span> <span style='color:#FAD744'>Jay!</span></p>
		<p>A new person has wanted to contact you from your website!</p>
		<p>Name: $name</p>
		<p>Email: $email </p>
		<p>Message: </p>
		<p> $message </p>
	</div>

</body>
</html>
";


if(isset($_POST["contactSubmit"])){
	$mail = mail("calebotherstuff@gmail.com","Jay, a new person from your website wants to contact you!",$msg, $headers);
	mail("calebotherstuff@gmail.com","Jay, a new person from your website wants to contact you!",$msg, $headers);
	if ($mail) {
		$sent = true;
		echo "Your message has been sent!";
	}
	
}else{
	header("Location:../index.php");
}

?>

<script type="text/javascript">
	var sent = <?php echo $sent ?>
	if(sent == true){
		$("#contactSubMessage").css("display","block");
	}
</script>
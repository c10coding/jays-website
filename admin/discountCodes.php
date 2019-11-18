<?php
	include("../php/connection.php");
	$sql = "SELECT * FROM discountcode";
	$results = mysqli_query($con,$sql);
	$numRows = mysqli_num_rows($results);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Discount codes | CupWorm</title>
	<!-- BOOTSTRAP -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- JS -->
	<script type="text/javascript" src="../js/script.js"></script>
	<!-- INTERNAL STYLING -->
	<style type="text/css">
		td, th{
			text-align:center;
		}
		th{
			font-family:var(--bigF);
			padding: 10px 20px 10px 20px;

		}
		td{
			font-family:var(--secondF );
		}
		table{
			width:70%;
			text-align: center;
			/* TOP, RIGHT, BOTTOM, LEFT */
			margin: 75px auto 100px auto ;
		}
		i{
			font-size:110%;
			padding:10px;
			transition: .5s;

		}
		i:hover{
			transition: .5s;
			cursor: pointer;
			opacity: .8;
			font-size: 120%;
		}
	</style>
	<!-- INTERNAL JAVASCRIPT -->
	
	<!-- STYLESHEET -->
	<link rel="stylesheet" href="../style/style.css">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="../font-awesome/css/all.css">
	<!-- ESSENTIAL META TAGS -->
	<meta name="viewport" content="width=device-width, intitial-scale=1, shrink-to-fit-no">
</head>
<body>
	<div class="container">
		<h2 class="text-center mb-3 mt-3" style="font-family:var(--secondF)">Discount codes</h2>
		<div class="text-center">
			<a href="controlPanel.php" class="text-center mt-3 mb-3">Go back</a>
		</div>
		
		<table>
			<tr>
				<th>Remove code</th>
				<th>Code</th>
				<th>Percentage off</th>
				<th>Number of times code used</th>
			</tr>
			<?php

				for($x = 0;$x < $numRows;$x++){
					$row = mysqli_fetch_assoc($results);
					$code = $row["code"];
					$used = $row["used"];
					$percentage = $row["percentage"];
					echo "<tr>";
					echo "<td class='text-primary'>" . "<i class='fas fa-times removeCode'></i>" . "</td>";
					echo "<td class='text-primary'>" . $code . "</td>";
					echo "<td class='text-primary'>" . $percentage . "</td>";
					echo "<td class='text-primary'>" . $used . "</td>";

				} 

				
			?>
		</table>
		<label>Put in a new discount code for users to use here!</label>
		<input type="text" placeholder="Put code here..." class="form-control mt-2 mb-2" id="discountInput">
		<label>Percentage that you want the discount code to take off</label>
		<input type="text" placeholder="Example: 10 (Don't put the percentage sign!)" class="form-control mt-2 mb-2" id="discountPercentage">
		<label id="discountMessage"></label>
		<input type="submit" class="form-control mt-2 mb-2 btn btn-primary btn-md" id="discountAdd" value="Add code">

	</div>
	
</body>
</html>
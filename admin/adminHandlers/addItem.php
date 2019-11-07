<?php


if($_POST["submit"]){
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$con = mysqli_connect($dbhost,$dbuser,$dbpass,"CupWorm");
	$time = time();
	$currentDate = date('Y-m-d', $time);
	$product_name = $_POST["product_name"];
	$product_price = $_POST["product_price"];
	$black_image = $_FILES["black_image"]['name'];
	$white_image = $_FILES["white_image"]['name'];
	$red_image = $_FILES["red_image"]['name'];
	$orange_image = $_FILES["orange_image"]['name'];
	$yellow_image = $_FILES["yellow_image"]['name'];
	$green_image = $_FILES["green_image"]['name'];
	$purple_image = $_FILES["purple_image"]['name'];
	$pink_image = $_FILES["pink_image"]['name'];
	$gray_image = $_FILES["gray_image"]['name'];
	$brown_image = $_FILES["brown_image"]['name'];

	$name = $_FILES['black_image']['name'];

	$tmp = $_FILES["black_image"]["tmp_name"];
	$imageArray = array();
	array_push($imageArray, $black_image);
	array_push($imageArray, $white_image);
	array_push($imageArray, $red_image);
	array_push($imageArray, $orange_image);
	array_push($imageArray, $yellow_image);
	array_push($imageArray, $green_image);
	array_push($imageArray, $purple_image);
	array_push($imageArray, $pink_image);
	array_push($imageArray, $gray_image);
	array_push($imageArray, $brown_image);

	$rawImageName = array("black_image","white_image","red_image","orange_image","yellow_image", "green_image", "purple_image", "pink_image", "gray_image", "brown_image");


	foreach ($imageArray as  $image) {
		if(empty($image)){
			$image = null;
		}
	}
	$x = 0;
	foreach ($imageArray as  $image) {
		$x++;
		if($image ==! null){
			$target_dir = "../../pics/";
			$tmp = $_FILES[$rawImageName[$x]]["tmp_name"];
			move_uploaded_file($tmp, $target_dir.$image);

		}
	}

	$sql = "INSERT INTO product (product_name,created,price,black,white,red,orange,yellow,green,purple,pink,gray,brown) VALUES('$product_name','$currentDate','$product_price','$black_image','$white_image','$red_image','$orange_image','$yellow_image','$green_image','$purple_image','$pink_image','$gray_image','$brown_image')";
	$results = mysqli_query($con, $sql);

	echo mysqli_error($con);
}


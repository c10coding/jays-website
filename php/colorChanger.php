<?php

include("connection.php");

$name = $_POST["name"];
$sql = "SELECT * FROM product WHERE product_name='$name'";
$results = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($results);
//$colorRGB = array("rgb(0, 0, 0)");
$colors = array("black","white","red","orange","yellow","green","purple","pink","gray","brown");

$availableImages = array();
$availableColors = array();
$color = $_POST["color"];
for($x = 0;$x < 10;$x++){
	$current = $row[$colors[$x]];
	if(!empty($current)){
		
		array_push($availableImages, $current);
		array_push($availableColors, $colors[$x]);

	}
}

$index;

for($i = 0;$i < count($availableColors);$i++){
	if($availableColors[$i] == $color){
		$index = $i;
		break;
	}
}
$image = $availableImages[$index];

echo $image;
?>



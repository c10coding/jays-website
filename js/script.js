$(document).ready(function(){
	$(".colorButton").click(function(){
		var val = $(".colorPicker").css("display");
		
		if(val == "none"){
			$(".colorPicker").fadeIn();
		}else{
			$(".colorPicker").fadeOut();
		}
	});

	$(".inColorPicker").click(function(){
		var val = $(this).css("background-color");
		$(".colorButton").css("background-color",val);
		$(".colorPicker").fadeOut();
	});
});
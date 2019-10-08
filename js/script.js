$(document).ready(function(){
	$(".colorButton").click(function(){
		var val = $(this).next().css("display");

		if(val == "none"){
			$(this).next().fadeIn();
		}else{
			$(this).next().fadeOut();
		}
	});

	$(".inColorPicker").click(function(){
		var val = $(this).css("background-color");
		$(this).parent().parent().prev().css("background-color",val);
		$(".colorPicker").fadeOut();
	});
});
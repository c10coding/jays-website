
$(document).ready(function(){
	$(".colorButton").click(function(){
		var val = $(this).next().css("display");

		if(val == "none"){
			$(this).next().fadeIn();
		}else{
			$(this).next().fadeOut();
		}
	});

	$("#adminSubmit").click(function(e){
		e.preventDefault();
		e.stopPropagation();
		var username = $("#adminUsername").val();
		var password = $("#adminPassword").val();
		var checkbox = $("#adminCheckbox").val();
		$("#admin_log_message").load("adminHandlers/login.php",{
			username : username,
			password : password,
			checkbox : checkbox
		});

	});
	$(".inColorPicker").click(function(){
		var val = $(this).css("background-color");
		$(this).parent().parent().prev().css("background-color",val);
		$(".colorPicker").fadeOut();
	});

	//VARIABLES FOR SLIDESHOW
	var p1 = "pics/testL.jpg";
	var p2 = "pics/testL2.jpg";
	var p3 = "pics/bracelet.jpg";
	var p4 = "pics/necklace.jpg";
	var pics = [p1,p2,p3,p4];

	//#slideShowImg
	//NEXT SLIDE
	$("#slideRightArrow").click(function(){
		$("#slideShowImg").fadeOut();
			setTimeout(function(){
				var current = $("#slideShowImg").attr("src");
				if(current == p1){
					$("#slideShowImg").fadeIn();
					$("#slideShowImg").attr("src",pics[1]);
				}else if (current == p2){
					$("#slideShowImg").fadeIn();
					$("#slideShowImg").attr("src",pics[2]);
				}else if (current == p3){
					$("#slideShowImg").fadeIn();
					$("#slideShowImg").attr("src",pics[3]);
				}else if (current == p4){
					$("#slideShowImg").fadeIn();
					$("#slideShowImg").attr("src",pics[0]);
				}
			}, 250);
	});

	$("#slideLeftArrow").click(function(){
		$("#slideShowImg").fadeOut();
			setTimeout(function(){
				var current = $("#slideShowImg").attr("src");
				if(current == p1){
					$("#slideShowImg").fadeIn();
					$("#slideShowImg").attr("src",pics[3]);
				}else if (current == p2){
					$("#slideShowImg").fadeIn();
					$("#slideShowImg").attr("src",pics[0]);
				}else if (current == p3){
					$("#slideShowImg").fadeIn();
					$("#slideShowImg").attr("src",pics[1]);
				}else if (current == p4){
					$("#slideShowImg").fadeIn();
					$("#slideShowImg").attr("src",pics[2]);
				}
		}, 250);
	});
	$("#contactUs,#footerContact, #contactUsMobile").click(function(){
		var display = $("#contactModal").css("display");
		$("#opacity").css("opacity",".5");
		$("#contactModal").fadeIn("slow");
	});
	/*
	$("#footerContact").click(function(){
		var display = $("#contactModal").css("display");
		$("#opacity").css("opacity",".5");
		$("#contactModal").fadeIn("slow");
	});*/
	$("#contactClose").click(function(){
		$("#contactModal").fadeOut("slow");
		$("#opacity").css("opacity","1");
	});
	//Contact form
	$("#contactForm").submit(function(event){
		event.preventDefault();
		event.stopPropagation();
		var email = $("#contactEmail").val();
		var name = $("#contactName").val();
		var message = $("#contactMessage").val();

		$("#contactSubMessage").load("php/contactHandle.php",{
			email : email,
			name : name,
			message : message
		});
	});
	$("#mobileNavButton").click(function(){
		var value = $("#mobileNavPopout").css("right");

		if(value == "0px"){
			$("#mobileNavPopout").animate({right: '-200px'});
			$("#mobileNavPopout").fadeOut();
			$("#mobileNavButton").css("color","var(--yellow)");
		}else if(value == "-200px"){
			$("#mobileNavPopout").animate({right: '0px'});
			$("#mobileNavPopout").fadeIn();
			$("#mobileNavButton").css("color","white");
		}

	});

	$(".add_to_cart").click(function(){
		//FIX THIS
		var item_name = $(this).prev().prev().text();
		var price = $(this).prev().text();
		var add = true;
		console.log(item_name);
		var cart_message = $(this).next();
		$(cart_message).load("php/cartHandler.php",{
			item_name : item_name,
			add : add,
			price : price
		});
	});

});


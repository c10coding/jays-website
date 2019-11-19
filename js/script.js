
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
		var colorPicker = $(this);
		var name = $(this).parent().parent().parent().next().text();
		//.trim()
		var color = this.style.backgroundColor;
		$.ajax({
	  		url: "php/colorChanger.php",
	  		type: "POST",
	  		data:{"name":name.trim(),"color":color}
		}).done(function(data) {
			var temp = data.trim();
			var img = colorPicker.parent().parent().parent().prev().children();
			var path = "pics/" + temp;
			$(img).attr("src", path);
		});

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

		var arr = price.split(" ");
		price = arr[0]; 

		var add = true;
		var color = $(this).prev().prev().prev().children(":first").css("background-color");
		var image = $(this).parent().children(":first").children(":first").attr("src");

		var imgSrc = image.substring(5);

		var cart_message = $(this).next();
		console.log(color);
		$(cart_message).load("php/cartHandler.php",{
			item_name : item_name,
			add : add,
			price : price,
			color : color,
			imgSrc : imgSrc
		});
	});
	$("#adminLogout").click(function(){
		var logout = true;
		$("#temp").load("adminHandlers/logout.php", {
			logout : logout
		});
	});
	$(".cartQuantity").blur(function(){
		var value = $(this).val();
		var item = $(this).parent().prev().text();
		var arr = item.trim().split(" ");
		var pricePosition = $(this).parent().next();
		var color = arr[arr.length-1];
		//Gets the color without the parentheses
		color = color.substring(1);
		color = color.substring(0,color.length-1);
		item = "";

		for(var x = 0;x < arr.length-1; x++){
			item += arr[x];
			item += " ";
		} 
		
		$.ajax({
	  		url: "php/cartHandler.php",
	  		type: "POST",
	  		data:{"value":value,"cartItemName":item.trim(),"color":color.trim()}
		}).done(function(data) {
			var temp = data.trim();
			console.log(temp);
			$(pricePosition).text(temp + " USD");
		});
	});
	$(".removeItem").click(function(){
		var remove = $(this).parent().next().next().text();
		var color;

		var arr = remove.trim().split(" ");
		remove = "";
		for(var x = 0;x < arr.length-1;x++){
			remove += arr[x];
			remove += " ";
		}
		color = arr[arr.length-1];
		color = color.substring(1, color.length-1);
		
		
		$.ajax({
	  		url: "php/cartHandler.php",
	  		type: "POST",
	  		data:{"color":color.trim(),"remove":remove.trim()}
		}).done(function(data) {
			var removed = data;
			if(removed == true){
				location.reload();
			}
		});
	});

	$("#discountAdd").click(function(){
		var discountCode = $("#discountInput").val();
		var discountPercentage = $("#discountPercentage").val();
		discountCode = discountCode.toUpperCase();
		$.ajax({
	  		url: "adminHandlers/addDiscountCode.php",
	  		type: "POST",
	  		data:{"discountCode":discountCode.trim(),"discountPercentage":discountPercentage}
		}).done(function(data) {
			var bool = data;
			if(bool == true){
				location.reload();
			}
		});

	});

	$(".removeCode").click(function(){
		var code = $(this).parent().next().text();
		
		$.ajax({
	  		url: "adminHandlers/removeDiscountCode.php",
	  		type: "POST",
	  		data:{"code":code.trim()}
		}).done(function(data) {
			var bool = data;
			if(bool == true){
				location.reload();
			}
		});

	});

	$("#tryDiscountCode").click(function(){
		var code = $("#inputDiscountCode").val();
		$("#tryDiscountCodeMessage").load("php/tryDiscountCode.php",{
			code : code
		});
	});

});


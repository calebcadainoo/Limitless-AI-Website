$(function(){
	// form validation
	function formValidation(id){
		 $("."+id).keyup(function(){
            if($(this).val() == ""){
            	alert("Please Fill All the Fields");
            }
        });
	}  
	$('#bizinc').click(function(){
		// $('#checkbox').is(":checked");
		alert('checked');
	});

	function isNumber(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}

	function isDate(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 47 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}

	function preventZeroFirstChar(id, e){
		var input = event.currentTarget.value;

	    if(input.search(/^0/) != -1){
	         // alert("you have started with a 0");
	         $(this).val(null);
	    }
	}

	$('.num_only').keypress(function(){
		return isNumber(event);
	});

	$('.date_driven').keypress(function(){
		return isDate(event);
	});

	$('#phoneField').keypress(function(){
		return isNumber(event);
		// suppress zero as first character
	});

	$('#phoneField').keyup(function(e){
		var input = event.currentTarget.value;
		if(input.search(/^0/) != -1){
	         // alert("you have started with a 0");
	         $(this).val(null);
	    }
	});

	$('#digit1').keypress(function(){
		return isNumber(event);
	});

	$('#digit2').keypress(function(){
		return isNumber(event);
	});

	$('#bizPIN').keypress(function(){
		return isNumber(event);
	});

	$('#bizPIN2').keypress(function(){
		return isNumber(event);
	});

	$('#bizPIN3').keypress(function(){
		return isNumber(event);
	});

	// country code and flag
	// $("#phoneField").CcPicker();
	// $("#phoneField1").CcPicker();

	// $("#phoneField").CcPicker({"countryCode":"us"});
	// $("#phoneField1").CcPicker({"countryCode":"us"});

	// $("#phoneField").CcPicker({
	// 	dataUrl: "data.json"
	// });

	function matchPasswords(pass1, pass2, msg){
		$("#"+pass2).focusout(function(){
			var pass = $("#"+pass1).val();
			var pass2 = $("#"+pass2).val();
            if (pass != pass2) {
            	// $(".pass_match").text("Passwords Do Not Match");
            	$(".error_log").html("<pre><div class='app_warn_msg magictime vanishIn'>"+msg+"</div></pre>");
            }

            if(pass == pass2){
            	$('.magictime').removeClass('vanishIn');
				$('.magictime').addClass('vanishOut');
            }
        });
	}

	setTimeout(function() {
		$('.magictime').removeClass('vanishIn');
		$('.magictime').addClass('vanishOut');
	}, 10000); // <-- time in milliseconds

	// $('.app_warn_msg').click(function(){
	// 	$('.app_warn_msg').removeClass('vanishIn');
	// 	$('.app_warn_msg').addClass('vanishOut');
	// });

	// personal passwords
	// matchPasswords("pass1", "pass2", "Passwords Do Not Match");
	// personal PINs
	// matchPasswords("digit1", "digit2", "Digit PINs Do Not Match");
	// business passwords
	// matchPasswords("bizPass", "bizPass2", "Passwords Do Not Match");
	// business PINs
	// matchPasswords("bizPIN", "bizPIN2", "Digit PINs Do Not Match");

	formValidation("app_icon input");
	// alert("Hello");

	// time and greeting
	setInterval(function(){
		var now = new Date();
		Date.UTC(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(),
 		now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds());
		var hh = now.getUTCHours();
		var mm = now.getUTCMinutes();
		var ss = now.getUTCSeconds();
		var td = "";
		if (mm < 10) {mm = '0'+mm}
		if (ss < 10) {ss = '0'+ss}
		if (hh < 23 && hh < 12) {
			var greeting = "Good Morning!";
		}else if (hh >= 12 && hh <= 16) {
			var greeting = "Good Afternoon!";
		}else if (hh > 16 && hh <= 23) {
			var greeting = "Good Evening!";
		}
		td = "GMT";
		// if (hh > 12) {td = "PM"; hh = hh%12;}else{td = "AM"}
		timenow = hh + ':' + mm + ':' + ss + ' '+ td;
		$('.bar_greet').text(greeting);
		$('.bar_time').text(timenow);
	}, 10);
	// end of time and greeting

	$('#sign_pers').click(function(){
		$('#sign_biz').removeClass('sign_active');
		$('#sign_pers').addClass('sign_active');
		$('.app_personal').show();
		$('.app_business').hide();
	});
	
	// hide business sign up by default
	$('.app_business').hide();

	$('#sign_biz').click(function(){
		$('#sign_pers').removeClass('sign_active');
		$('#sign_biz').addClass('sign_active');
		$('.app_personal').hide();
		$('.app_business').show();
	});

	// tap menu
	$('.tap_menu').click(function(){
		$('.left_pane').addClass('menu_in');
		$('.plain_overlay').fadeIn(200);
		// alert("haha");
	});

	$('.plain_overlay').click(function(){
		$('.left_pane').removeClass('menu_in');
		$('.plain_overlay').fadeOut(200);
	});


});

/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
// particlesJS.load('particles-js', 'particles.json', function() {
//   console.log('callback - particles.js config loaded');
// });
$(function(){

	// smooth anchor click animation
	var $root = $('html, body');
	$('a[href^="#"]').click(function () {
	    $root.animate({
	        scrollTop: $( $.attr(this, 'href') ).offset().top
	    }, 500);

	    return false;
	});
	// end of smooth anchor click animation

	function prepareNslider(){
		// slider rules
		var Nsw = $('.Nholder').width();

		windowsize = $(window).width();

		if (windowsize > 700) {
			Nsw = Nsw * 0.4166; //normal screen size
			// $('.book').text("A");
		}else if (windowsize < 700 && windowsize > 650) {
			Nsw = Nsw * 0.5833; //less than 700px
			// $('.book').text("B");
		}else if (windowsize < 650 && windowsize > 480) {
			Nsw = Nsw * 0.7; //less than 650px
			// $('.book').text("C");
		}else if (windowsize < 480) {
			Nsw = Nsw * 0.93; //less than 480px
			// $('.book').text("D");
			$('.device_image').height($('.device_image').width());
			$('.image_viewer_box').height($('.device_image').width());
		}
		
		Ncount = $('.news_grid_box').length;
		// do calculation of widths (holder and slider)
		$('.Nslide_container').css({"width": ((Nsw + 10) * Ncount) + "px"});
		$('.news_grid_box').css({"width": Nsw + "px"});
		// slider function
		function slideNews() {
			
			function slideAnimator(){
				slide = 0;
				timerSlide = setInterval(function() {
					if (slide < (-Nsw * (Ncount - 1))) {
						slide = 0;
					}
					$('.Nslide_container').animate({left: slide + 'px'});
					slide -= Nsw;
					// $('.book').text(slide);
				}, 7000);
			}
			slideAnimator();
			
			$('.slidePrev').click(function(){
				clearInterval(timerSlide);
				if (slide != 0) {slide += Nsw;}
				$('.Nslide_container').animate({left: slide + 'px'});
				slideAnimator();
			});

			i = 0;
			$('.slideNext').click(function(){
				clearInterval(timerSlide);
				i++;
				if (i > 3) { i = 0}
				slide =  (-Nsw * i);
				// $('.book').text(slide +" "+i);
				$('.Nslide_container').animate({left: slide + 'px'});
				slideAnimator();
			});
		}
		// start slider
		slideNews();
	}

	prepareNslider();

	$(window).resize(function(){
		prepareNslider();
	});


	var isDragging = false;
	$('.news_grid')
	.mousedown(function() {
	    isDragging = false;
	})
	.mousemove(function() {
	    isDragging = true;
	    // $(".book").text(isDragging);
	 })
	.mouseup(function() {
	    var wasDragging = isDragging;
	    isDragging = false;
	    if (!wasDragging) {
	        // $(".book").text(isDragging);
	    }
	});
	
	// device viewing rules
	prevA = $('#prevA');
	prevB = $('#prevB');
	prevC = $('#prevC');
	devicePic = $('#device-pic');

	prevD = $('#prevD');
	prevE = $('#prevE');
	prevF = $('#prevF');
	devicePicB = $('#device-picB');

	prevG = $('#prevG');
	prevH = $('#prevH');
	prevI = $('#prevI');
	devicePicC = $('#device-picC');

	prevJ = $('#prevJ');
	prevK = $('#prevK');
	prevL = $('#prevL');
	devicePicD = $('#device-picD');

	// remove all selections
	function removePrevSelect(){
		prevA.removeClass("selected_prev");
		prevB.removeClass("selected_prev");
		prevC.removeClass("selected_prev");

		prevD.removeClass("selected_prev");
		prevE.removeClass("selected_prev");
		prevF.removeClass("selected_prev");

		prevG.removeClass("selected_prev");
		prevH.removeClass("selected_prev");
		prevI.removeClass("selected_prev");

		prevJ.removeClass("selected_prev");
		prevK.removeClass("selected_prev");
		prevL.removeClass("selected_prev");
	}
	// click events for previews
	function getSrc(el,device){
		removePrevSelect();
		el.addClass("selected_prev");
		selected = $('.selected_prev img');
		val = selected.attr('src');
		device.attr('src', val);
		return val;
	}

	prevA.click(function(){
		getSrc(prevA, devicePic);
	});

	prevB.click(function(){
		getSrc(prevB, devicePic);
	});

	prevC.click(function(){
		getSrc(prevC, devicePic);
	});

	prevD.click(function(){
		getSrc(prevD, devicePicB);
	});

	prevE.click(function(){
		getSrc(prevE, devicePicB);
	});

	prevF.click(function(){
		getSrc(prevF, devicePicB);
	});

	prevG.click(function(){
		getSrc(prevG, devicePicC);
	});

	prevH.click(function(){
		getSrc(prevH, devicePicC);
	});

	prevI.click(function(){
		getSrc(prevI, devicePicC);
	});

	prevJ.click(function(){
		getSrc(prevJ, devicePicD);
	});

	prevK.click(function(){
		getSrc(prevK, devicePicD);
	});

	prevL.click(function(){
		getSrc(prevL, devicePicD);
	});

	// color type device loadings
	black = $('#colorA');
	green = $('#colorB');
	red = $('#colorC');
	yellow = $('#colorD');

	// remove all color types
	function removeColorSelect(){
		black.removeClass("select_color");
		green.removeClass("select_color");
		red.removeClass("select_color");
		yellow.removeClass("select_color");
	}

	function hideOtherDevices(){
		$('.green_device').hide();
		$('.black_device').hide();
		$('.red_device').hide();
		$('.yellow_device').hide();
		removeColorSelect();
	}

	black.click(function(){
		// loadColorType(black);
		hideOtherDevices();
		$('.black_device').show();
		black.addClass('select_color');
	});

	green.click(function(){
		// loadColorType(green);
		hideOtherDevices();
		$('.green_device').show();
		green.addClass('select_color');
	});

	red.click(function(){
		// loadColorType(red);
		hideOtherDevices();
		$('.red_device').show();
		red.addClass('select_color');
	});

	yellow.click(function(){
		// loadColorType(yellow);
		hideOtherDevices();
		$('.yellow_device').show();
		yellow.addClass('select_color');
	});

	//Sets the copyright year
	if (new Date().getFullYear() == 2018)
		year_range = "2018" + author_name;
	else
		year_range = "Limitless AI &copy; " + new Date().getFullYear();

	$('.page_footer').prepend(year_range);


	
});

	// const sliderB = document.querySelector('.Nslide_container');
	// let isDown = false;
	// let startX;
	// let scrollLeft;

	// sliderB.addEventListener('mousedown', function(e) {
	// 	isDown = true;
	// 	console.log(e);
	// 	startX = e.pageX - sliderB.offset();
	// 	scrollLeft = sliderB.scrollLeft;
	// 	console.log(startX);
	// });

	// sliderB.addEventListener('mouseleave', function() {
	// 	isDown = false;
	// });

	// sliderB.addEventListener('mouseup', function() {
	// 	isDown = false;
	// });

	// sliderB.addEventListener('mousemove', function() {
	// 	if (!isDown) return;
	// 	console.count(isDown);
	// });
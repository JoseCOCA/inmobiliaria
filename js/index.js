jQuery(document).on('ready', function($){
	$=jQuery;

	$('.checkbox-1 input[type="checkbox"]').attr('checked','');

	$('#slippry').slippry({
		slippryWrapper: '<div class="slippry-main sy-box" />',
		transition: 'fade',
		easing: 'easeOutExpo',
		continuous: false
	});

	$('.sy-pager').append('<h5 class="contact">'+contact+'</h5>');


	var $isoContainer = $('.iso');
	$isoContainer.isotope({
		filter: '*',
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false,
			resizable: true, // disable normal resizing
			// set columnWidth to a percentage of container width
			masonry: { columnWidth: $isoContainer.width() / 5 }
		}
	});
	$('#isotope-cont #nav a').click(function(e){
		e.preventDefault();
		$('.nav-iso-active').removeClass('nav-iso-active');
		$(this).addClass('nav-iso-active');
		var selector = $(this).attr('data-filter');
		$isoContainer.isotope({ filter: selector })
	});

	// update columnWidth on window resize
	$(window).smartresize(function(){
	  $isoContainer.isotope({
	    // update columnWidth to a percentage of container width
	    masonry: { columnWidth: $isoContainer.width() / 5 }
	  });
	});

	$('.showInfo').each(function() {
		$(this).on('click', function (e){
			var getID = $(this).attr("data-cont");
			data = {
				id : getID
			}
			$.ajax({
				url: base_url+'welcome/increase',
				data: data,
				type : 'POST',
				cache: false
			}).done(function (data){
				console.log(data);
			}).fail(function (status, statusText, responseXML){
				console.log(statusText);
			});
			// $('.visible').removeClass('.visible').addClass('oculto');
			// $('#'+getID).removeClass('oculto').addClass('visible');

			// $('#este-'+getID +' #slider').data('rhinoslider').play();
		})
	});

	// $('.checkbox-1').each(function(){
	// 	$(this).on('click', function(event){
	// 		event.stopImmediatePropagation();
	// 		// event.preventDefault();
	// 		var este = $(this);
	// 		var checkbox = este.find('input[type="checkbox"]');
	// 		// var cont = $('.cont');
	// 		console.log(checkbox);
	// 		if(checkbox.is(':checked')){
	// 			este.closest('.notificationForm').show();
	// 		}else{
	// 			este.closest('.notificationForm').hide()
	// 		};

	// 	})
	// })

	$('.slider-cont').rhinoslider({
		autoPlay: false,
		changeBullets: 'before',
		controlsPlayPause: false,
		effect: 'kick',
		showBullets: 'always',
		showControls: 'always',
		slideNextDirection: 'toLeft',
		slidePrevDirection: 'toRight'
	});

	$('.slider-recomedados').rhinoslider({
		autoPlay: true,
		easing: 'easeInExpo',
		effect: 'turnOver',
		effectTime: 2000,
		pauseOnHover: false,
		showTime: 15000,
		showBullets: 'never',
		showControls: 'never',
		slideNextDirection: 'toLeft',
		slidePrevDirection: 'toRight'
	});

	/*Stickybar*/
	$('.menu_block').sticky({topSpacing:0});
});

	$('.menu_block').on('sticky-start', function (e) {
		e.preventDefault();
		var altura = document.querySelector('.menu_block').offsetHeight;
		$('#nav').sticky({topSpacing:46}).css({'z-index': '1', 'width': '100%'});
	});

function goToByScroll(id){$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');}
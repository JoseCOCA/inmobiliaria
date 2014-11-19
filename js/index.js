$(document).on('ready', function($){
	$=jQuery;

	$('.iso').isotope({
		filter: '*',
		animationOptions: {
		duration: 750,
		easing: 'linear',
		queue: false,
		}
	});

	$('#slippry').slippry({
		slippryWrapper: '<div class="slippry-main sy-box" />'
	});

	$('.sy-pager').append('<h5 class="contact">'+contact+'</h5>');


	$('#nav a').click(function(){
		var selector = $(this).attr('data-filter');
		$('.iso').isotope({
			filter: selector,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false,
			}
		});
		return false;
	});

	$('.showInfo').each(function() {
		$(this).on('click', function (e){
			var getID = $(this).attr("data-cont");
			$('.visible').removeClass('.visible').addClass('oculto');
			$('#'+getID).removeClass('oculto').addClass('visible');

			$('#este-'+getID +' #slider').data('rhinoslider').play();
		})


	});

	$('.slider-cont').rhinoslider({
		effect: 'kick',
		controlsPlayPause: false,
		autoPlay: false,
		showBullets: 'always',
		changeBullets: 'before',
		showControls: 'always',
		slidePrevDirection: 'toRight',
		slideNextDirection: 'toLeft'
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
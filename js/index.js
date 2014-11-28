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
			if($('ul#slider').data('rhinoslider')){
				$('.slide-cont').empty();
				$('<div/>', {
					id: 'slide',
					class: 'slide'
				}).appendTo('.slide-cont');
				$('<ul/>', {
					id: 'slider',
					class: 'slider-cont'
				}).appendTo('.slide-cont #slide');
			}
			var getID = $(this).attr("data-cont");
			data = {
				id : getID
			}
			$.ajax({
				url: base_url+'ajax/index',
				data: data,
				type : 'POST',
				cache: false
			}).done(function (data){
				var dataA = data;
				data = JSON.parse(data);
				console.log(data);
				var datos = data[0];
				for (var i = 1; i < data.length; i++) {
					var url = data[i]['url'];
					var name = data[i]['nombre'];
					var image = '<li><img src="' + base_url + url + '" alt="' + name + '" class="image_slide"></li>';
					$('ul#slider').append(image);
				};
				$('ul#slider').rhinoslider({
					autoPlay: true,
					changeBullets: 'before',
					controlsPlayPause: false,
					effect: 'kick',
					showBullets: 'always',
					showControls: 'always',
					slideNextDirection: 'toLeft',
					slidePrevDirection: 'toRight'
				});
				// {"ID":"13","url":"images\/filtros\/house.jpg","nombre":"house.jpg","Descripcion":"Casa bonita.\r\nQue tenga una bonita vista","Tipo":"Oficina","Condicion":"venta","Condiciones":"Que se quede como esta.\r\nQue tenga una bonita vista","Filtro":"F1","CalleNo":"Av. El Durazno, And. 45","Colonia":"El Durazno","Delegacion":"Miguel hidalgo","CP":"1340","Dimension":"1000 m2","Precio":"100900","Status":"NO DISPONIBLE"} 	ESTOS SON LOS DATOS QUE RECIBE
				$('.checkbox-1 input[type="checkbox"]').attr('checked', false);
				$('#tipo-propiedad').html(datos['Tipo']);
				$('#condicion-propiedad').html(datos['Condicion']);
				$('#ubicacion-propiedad').html(datos['CalleNo']+' '+datos['Colonia']+' '+datos['Delegacion']+' '+datos['CP']);
				$('#desc').html(datos['Descripcion']);
				$('#condiciones-propiedad-compra').html(datos['Condiciones']);


				$('.checkbox-1').on('click', function(event){
					event.stopImmediatePropagation();
					// event.preventDefault();
					var este = $(this);
					var checkbox = este.find('input[type="checkbox"]');
					// var cont = $('.cont');
					$(checkbox).change(function(e){
						e.stopImmediatePropagation();
						if(checkbox.is(':checked')){
							$('#descripcion').slideUp('slow', function(){

								$('#notificationForm').slideDown('slow');
								
							});
							// $('#notificationForm, #descripcion').fadeToggle();
						}else{
							$('#notificationForm').slideUp('slow', function(){
								$('#descripcion').slideDown('slow');
							});
							// $('#notificationForm, #descripcion').fadeToggle();
						};
					})
				})

			}).fail(function (status, statusText, responseXML){
				console.log(statusText);
				console.log(responseXML);
			});
			// $('.visible').removeClass('.visible').addClass('oculto');
			// $('#'+getID).removeClass('oculto').addClass('visible');

			// $('#este-'+getID +' #slider').data('rhinoslider').play();
		})
	});


	/*$('.slider-cont').rhinoslider({
		autoPlay: false,
		changeBullets: 'before',
		controlsPlayPause: false,
		effect: 'kick',
		showBullets: 'always',
		showControls: 'always',
		slideNextDirection: 'toLeft',
		slidePrevDirection: 'toRight'
	});*/

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
		slidePrevDirection: 'toRight',

		callBackNext : function(){
		var ids = $('.imgRec').map(function(i) {
		    return this.id;
		});

		}
	});

	/*Stickybar*/
	$('.menu_block').sticky({topSpacing:0});
});

	$('.menu_block').one('sticky-start', function (e) {
		e.preventDefault();
		var altura = document.querySelector('.menu_block').offsetHeight;
		$('#nav').sticky({topSpacing:46, getWidthFrom: '#isotope-cont'}).css({'z-index': '10', });
	});

function goToByScroll(id){$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');}

function resetForm () {
	document.getElementById("notif").reset();
}
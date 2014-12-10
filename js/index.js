jQuery(document).on('ready', function($){
	$=jQuery;

	$('.checkbox-1 input[type="checkbox"]').attr('checked','');

	$('#slippry').slippry({
		slippryWrapper: '<div class="slippry-main sy-box" />',
		transition: 'fade',
		easing: 'easeOutExpo',
		continuous: false,
		adaptiveHeight: false
	});

	$('.sy-pager').append('<h5 class="contact">'+contact+'</h5>');


	var $isoContainer = $('.iso');
	$isoContainer.imagesLoaded( function () {
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
			//console.log(base_url);
			data = {
				id : getID
			}
			$.ajax({
				url: base_url+'ajax',
				data: data,
				type : 'POST',
				cache: false,
				croosDomain: true,
				//dataType: 'jsonp',
			}).done(function (data){
				var dataA = data;
				//console.log(data);
				//data = JSON.parse(data);
				var filtro = data[0]['Filtro'];
				//console.log(filtro);
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
				$('#status-prop').html(datos['Status']);
				$('#notiFiltro').val(filtro);
				
				if(datos['Status']=='Disponible'){
					$('.checkbox-1, #check-text').hide();
				}else{
					$('.checkbox-1, #check-text').show();
				}

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
		effect: 'fade',
		effectTime: 2000,
		pauseOnHover: false,
		showTime: 10000,
		controlsMousewheel: false,
		showBullets: 'never',
		showControls: 'never',
		slideNextDirection: 'toLeft',
		slidePrevDirection: 'toRight',
		initID: '', // variable para el filtro de inicio

		callBackInit : function(){
			var containerWidth = $('.slide-recomendados').css("width");
			var containerHeight = $('.slide-recomendados').css("height");
			$('.rhino-container').css("width",containerWidth);
			$('.rhino-container').css("height",containerHeight);
			//console.log($('.rhino-container').css("width"));
			//console.log($('.rhino-container').css("height"));

			var initID = $('.slider-recomedados').find('.rhino-active>a>img').attr('id');

			$('#'+initID+'.specs').removeClass('oculto').addClass('visible');
			$('#'+initID+'.tr').removeClass('oculto').addClass('visible');
			 $(this)[0].initID = initID;
			 console.log($(this)[0].initID);  
		},
		callBackNext : function(data){

			var imageID = $('.rhino-active').next().find('a>img').attr('id');

			if(imageID){
				$('.specs').each(function () {
					var thisID = $(this).attr('id');
					if (imageID == thisID ) {
					$('.visible').removeClass('.visible').addClass('oculto');
				    $('#'+thisID+'.specs').removeClass('oculto').addClass('visible');
				    $('#'+thisID+'.tr').removeClass('oculto').addClass('visible');			
					};
				});				
			}else{
				var initID = $(this)[0].initID;
				$('.visible').removeClass('.visible').addClass('oculto');
				$('#'+initID+'.specs').removeClass('oculto').addClass('visible');
				$('#'+initID+'.tr').removeClass('oculto').addClass('visible');

			}

		},

		callBeforeNext : function(data) {
			//console.log($('.slider-recomedados').next().find('a>img'));
			//console.log($('.slider-recomendados').find('li.rhino-active').index());
			//alert("call before next");
		},


	});

	/*Stickybar*/
	$('.menu_block').sticky({topSpacing:0});
});

	$('.menu_block').on('sticky-start', function (e) {
		e.preventDefault();
		var altura = $('.menu_block').innerHeight();
		console.log(altura);
		$('#nav').sticky({topSpacing:altura, getWidthFrom: '#isotope-cont', responsiveWidth: true}).css({'z-index': '9'});
	});


function goToByScroll(id){$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');}

function resetForm () {
	document.getElementById("notif").reset();
	$('#notificationForm').slideUp('slow', function(){
			$('#descripcion').slideDown('slow');
	});

}
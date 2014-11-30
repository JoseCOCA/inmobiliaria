jQuery(document).on('ready', function($){
	$=jQuery;
    $('#admin-menu, .showInfo').sidr({speed: 500});
 	// $('#simple-menu').sidr();

 	var loader = '<div class="loader">'+
	  '<div class="side"></div>'+
	  '<div class="side"></div>'+
	  '<div class="side"></div>'+
	  '<div class="side"></div>'+
	  '<div class="side"></div>'+
	  '<div class="side"></div>'+
	  '<div class="side"></div>'+
	  '<div class="side"></div>'+
	  '</div>';

	  $('h1.add-propiety').click(function (e){
	  	e.stopImmediatePropagation();
	  	$('form#nuevaPropiedad').slideDown();
	  });


 	/* INICIO */

 	$('#home').click(function (e){
 		muestraLoadr(e);
		$('#main>div:not(#welcome)').delay(1000).hide(0);
		$('#welcome').delay(1000).show(0);
 		muestraLoadr(e);
 	});

 	$('select#seccion').on('change', function (e) {
 		e.stopImmediatePropagation();
 		var cual = $(this).val();
 		var datos = {padre : cual};
 		$.ajax({
 			url : base_url+"ajax/getContentData",
 			data : datos,
 			cache : false,
 			beforeSend : function(){
 				$('#contenidos-principales').empty();
 				$('#contenidos-principales').append(loader);
 			}
 		}).done(function (data){
 			data = typeof(data)!='object' ? JSON.parse(data) : data;
 			console.log(data);
 			for (var i = 0; i < data.length; i++) {
 				var elID = data[i].ID;
 				var suPa = data[i].padre;
 				var contenido = data[i].contenido;
 				var summerOtions = {
 					height : 400,
 					maxHeight : 400,
 					lang: 'es-ES',
 					toolbar: [
					    //[groupname, [button list]]
					    ['style', ['bold', 'italic', 'underline', 'clear']],
					    ['font', ['strikethrough']],
					    ['fontsize', ['fontsize']],
					    // ['color', ['color']],
					    ['para', ['ul', 'ol', 'paragraph']],
					    ['picture',['picture']],
					    ['codeview', ['codeview']]
					    // ['height', ['height']],
				  	],
			  		onImageUpload: function(files, editor, $editable) {
						console.log('image upload:', files, editor, $editable);
					},
					onInit: function(contents, $editable) {
					    console.log($editable);
					}
 				}
 				$('<textarea />',{id:elID, class: 'wysiwyg', 'data-padre' : suPa}).val(contenido).appendTo('#contenidos-principales').each(function(){
 					$(this).summernote(summerOtions);
 					// console.log($(this).next('.note-editor'));
 					var $toolbar = $($(this).next('.note-editor'));
 					var $sendBtn = $('<div class="btn-group"><button data-original-title="Enviar" data-parent="'+elID+'" type="button" class="btn btn-default btn-sm btn-small submit-contenido" title="">Guardar</button></div>');
 					$sendBtn.appendTo($toolbar);
   					actualizaContenido();
				});
			};
 		}).fail(function (status, statusText, responseXML){
 			console.log(statusText);
			console.log(responseXML);
 		});
 	});

	function actualizaContenido(){
		$('button.submit-contenido').each(function (){
			$(this).click(function (e){
				e.preventDefault();
				e.stopImmediatePropagation();
				var este = $(this);
				var suID = este.data('parent');
				var cont = este.parent().parent().find('.note-editable').html();
				console.log(cont);
				var arguments = {id : suID, adminPanel : 'Modifica seccion', contenido : cont};
				$.ajax({
					url : base_url+'admin/getData',
					data : arguments,
					type : 'POST',
					cache : false,
					beforeSend : function (e){
						este.fadeOut();
					}
				}).done(function (data){
					console.log(data);
				}).fail(function (status, statusText, responseXML){
					console.log(statusText);
					console.log(responseXML);
				});
			})
		})
	}

 	/* INICIO */

	/* BANNERS */

 	$('#bannersEdit').click(function (e){
 		muestraLoadr(e);
		$('#main>div:not(#panelBanner)').delay(1000).hide(0);
		$('#panelBanner').delay(1000).show(0);
 		muestraLoadr(e);
 		$.ajax({
 			url : base_url+'ajax/getBanners',
 			cache : false,
 			beforeSend : function (e) {
 				$('#contenido-banner-principal ul').empty();
 			}
 		}).done(function (data){
 			data = typeof(data)!='object' ? JSON.parse(data) : data;
 			// console.log(data);
 			var principales = data.principal;
 			var recomendados = data.recomendados;
 			/* PRINCIPAL */
 			for (var i = 0; i < principales.length; i++) {
 				var url = principales[i].url;
 				var name = principales[i].nombre;
 				var image = '<li><div class="elimina-img butn" data-id="'+principales[i]['ID']+'">Eliminar</div><img src="' + base_url + url + '" alt="' + name + '" class="image_slide"></li>';
 				// console.log(image);
 				$(image).appendTo('#contenido-banner-principal ul');
 			};

 			/* 	NUEVO BANNER */
			$('form#newMainBanner').fileupload({
		        dataType: 'json',
		        dropZone: $('#image_preview_main_ban'),
		        add: function (e, data) {
		        	$('button.submit').remove();
		        	if (data.files && data.files[0]) {
				        var reader = new FileReader();
				        reader.onload = function(e) {
				            $('#previewing_main_ban').attr('src', e.target.result);
				        }
				    }
				    var propiedad = $(this).find('select#seccion-banner-p').val();
				    $('select#seccion-banner-p').on('change', function(){
				    	propiedad = $(this).val();
				    })

				    console.log(propiedad);
		        	reader.readAsDataURL(data.files[0]);
		            data.context = $('<button/>',{class:'submit'}).text('Cargar')
		                .appendTo($(this).find('#selectImage'))
		                .click(function (e) {
		                	e.preventDefault();
		                    // data.context = $('<p/>').text('Uploading...').replaceAll($(this));
		                    if(propiedad==''||propiedad==null||propiedad==undefined){
		                    	alert('debe elegir una propiedad');
		                    }else{
		                    	data.submit();
			                    data.context.fadeOut();
		                    }

		                });
		        },
		        done: function (e, data) {
		        	data = typeof(data)!='object' ? JSON.parse(data) : data;
		            // console.log(data.result);
		            var status = data.result.status;
		            if(status == "success"){
						// Filtro
						// nombre
						// url
						// principal
						// recomendado
						var filtro = $('select#seccion-banner-p').val(),
						nombre     = data.result.nombre,
						imagen     = nombre,
						dats       = {
							Filtro : filtro,
							nombre : nombre,
							imagen : imagen,
							recomendado : 0,
							principal : 1,
							adminPanel : 'Nuevo banner'
						};
		            	$.ajax({
		            		url : base_url+'admin/getData',
		            		cache :false,
		            		type : 'POST',
		            		data : dats,
		            		beforeSend : function(){
		            			$('#previewing_main_ban').removeAttr('src');
				            	$('button.submit').remove();
				            	$('form#nuevaPropiedad').slideUp(1000);
		            		}
		            	}).done(function (data){
		            		alert('Imagen agregada');
		     //        		console.log(data);
		            		// var nueva = '<li><div class="elimina-img butn" data-id="'+principales[i]['ID']+'">Eliminar</div><img src="' + base_url + url + '" alt="' + name + '" class="image_slide"></li>';

							// $(nueva).hide().appendTo("#lista-propiedades").fadeIn(1000);

		            	}).fail(function (status, statusText, responseXML){
		            		console.log(statusText);
							console.log(responseXML);
		            	});
		            }else{
		            	alert(status);
		            	data.context.fadeIn();
		            }
		        },
		        fail: function (e, data){
		        	 data.context.addClass('error');
		        	 // data.context.addClass('error');
		        }
		    });

 			/* RECOMENDADOS */
 			for (var r = 0; r < recomendados.length; r++) {
 				var url = recomendados[r].url;
 				var name = recomendados[r].nombre;
 				var image = '<li><div class="elimina-img butn" data-id="'+recomendados[r]['ID']+'">Eliminar</div><img src="' + base_url + url + '" alt="' + name + '" class="image_slide"></li>';
 				// console.log(image);
 				$(image).appendTo('#contenido-banner-recomendado ul');
 			};
 			/* 	NUEVO BANNER RECOMENDADO */
			$('form#newRecomendBanner').fileupload({
		        dataType: 'json',
		        dropZone: $('#image_preview_recomend_ban'),
		        add: function (e, data) {
		        	$('button.submit').remove();
		        	if (data.files && data.files[0]) {
				        var reader = new FileReader();
				        reader.onload = function(e) {
				            $('#previewing_recomend_ban').attr('src', e.target.result);
				        }
				    }
				    var propiedad = $(this).find('select#seccion-banner-r').val();
				    $('select#seccion-banner-r').on('change', function(){
				    	propiedad = $(this).val();
				    })

				    // console.log(propiedad);
		        	reader.readAsDataURL(data.files[0]);
		            data.context = $('<button/>',{class:'submit'}).text('Cargar')
		                .appendTo($(this).find('#selectImage'))
		                .click(function (e) {
		                	e.preventDefault();
		                    // data.context = $('<p/>').text('Uploading...').replaceAll($(this));
		                    if(propiedad==''||propiedad==null||propiedad==undefined){
		                    	alert('debe elegir una propiedad');
		                    }else{
		                    	data.submit();
			                    data.context.fadeOut();
		                    }

		                });
		        },
		        done: function (e, data) {
		        	data = typeof(data)!='object' ? JSON.parse(data) : data;
		            // console.log(data.result);
		            var status = data.result.status;
		            if(status == "success"){
						// Filtro
						// nombre
						// url
						// principal
						// recomendado
						var filtro = $('select#seccion-banner-r').val(),
						nombre     = data.result.nombre,
						imagen     = nombre,
						dats       = {
							Filtro : filtro,
							nombre : nombre,
							imagen : imagen,
							recomendado : 1,
							principal : 0,
							adminPanel : 'Nuevo banner'
						};
		            	$.ajax({
		            		url : base_url+'admin/getData',
		            		cache :false,
		            		type : 'POST',
		            		data : dats,
		            		beforeSend : function(){
		            			$('#previewing_recomend_ban').removeAttr('src');
				            	$('button.submit').remove();
		            		}
		            	}).done(function (data){
		            		alert('Imagen agregada');
		     //        		console.log(data);
		     //        		var nueva = '<li><a href="#sidr" id="'+filtro+'" class="configFilter showInfo" data-cont="'+filtro+'"><img src="images/filtros/'+imagen+'" /><p>'+nombre+'</p></a></li>';

							// $(nueva).hide().appendTo("#lista-propiedades").fadeIn(1000);

		            	}).fail(function (status, statusText, responseXML){
		            		console.log(statusText);
							console.log(responseXML);
		            	});
		            }else{
		            	alert(status);
		            	data.context.fadeIn();
		            }
		        },
		        fail: function (e, data){
		        	 data.context.addClass('error');
		        	 // data.context.addClass('error');
		        }
		    });

	  $('#panelBanner .elimina-img').click(function(){
	  	alert("Error al procesar la solicitud en el servidor \n Intente de nuevo o verifique la configuración");
	  })

 		}).fail(function (status, statusText, responseXML){
 			console.log(satus);
 			console.log(statusText);
 		})
 	});



	/* BANNERS */


 	/* PROPIEDADES */

	$(".input_btn_file").on('click',function (e){
		e.preventDefault();
	  	$(this).prev('input[type="file"]').click();
	});

	// $('.showInfo').each(function() {
		$('.showInfo').live('click', function (e){
			muestraLoadr(e);
			$(this).sidr({speed: 500});
 			$('#main>div:not(.config_container)').delay(1000).hide(0);
			$('.config_container').delay(1000).show(0);

		// $(this).live('click', function (e){
			var getID = $(this).attr("data-cont");
			data = {
				id : getID
			}
			$.ajax({
				url: base_url+'ajax/index',
				data: data,
				type : 'POST',
				cache: false,
				beforeSend: function (){
					$('.config_container .carrusel').empty();
					$('form#upload ul').empty();
					$('.config_container #saveChanges').remove();
				}
			}).done(function (data){
				var dataA = data;
				data = typeof(data)!='object' ? JSON.parse(data) : data;
				console.log(data);
				var datos = data[0];
				for (var i = 1; i < data.length; i++) {
					var url = data[i]['url'];
					var name = data[i]['nombre'];
					var image = '<li><div class="elimina-img butn" id="'+data[i]['nombre']+'">Eliminar</div><img src="' + base_url + url + '" alt="' + name + '" class="image_slide"></li>';
					$('.config_container .carrusel').append(image);
				};
				$('#condiciones').html(datos['Condiciones']);
				$('#calleNo').html(datos['CalleNo']);
				$('#colonia').html(datos['Colonia']);
				$('#delegacion').html(datos['Delegacion']);
				$('#dimension').html(datos['Dimension']);
				$('#cp').html(datos['CP']);
				$('#precio').html(datos['Precio']);
				$('#descripcion').html(datos['Descripcion']);
				$('#tipo').val(datos['Tipo']);
				$('#status').val(datos['Status']);
				$('#filtro-hd').val(datos['Filtro']);
				$('form#upload').append('<input type="hidden" id="propiedad" value="true" name="propiedad" />');

				$('<div/>', {
					id: 'saveChanges',
					class: 'saveChanges butn',
					'data-filtro': datos['Filtro']
				}).html('Guardar').appendTo('.config_container');
				eliminaImagen();
				muestraLoadr(e);
				$('#saveChanges').on('click', function (e) {
					// e.preventDefault();
					var condiciones = $('#condiciones').html(),
					calleNo = $('#calleNo').html(),
					colonia = $('#colonia').html(),
					delegacion = $('#delegacion').html(),
					dimension = $('#dimension').html(),
					cp = $('#cp').html(),
					precio = $('#precio').html(),
					descripcion = $('#descripcion').html(),
					tipo = $('#tipo').val(),
					status = $('#status').val(),
					filtro = $(this).attr('data-filtro');
					var dats = {
						condiciones : condiciones,
						CalleNumero : calleNo,
						Colonia : colonia,
						Delegacion : delegacion,
						dimensiones : dimension,
						CodigoPostal : cp,
						precio : precio,
						descripcion : descripcion,
						inmueble : tipo,
						Status : status,
						adminPanel: 'Modificar',
						Filtro : filtro
					};
					actualizaRegistro(dats);
				});

			}).fail(function (status, statusText, responseXML){
				console.log(statusText);
				console.log(responseXML);
			});
			// $('.visible').removeClass('.visible').addClass('oculto');
			// $('#'+getID).removeClass('oculto').addClass('visible');

			// $('#este-'+getID +' #slider').data('rhinoslider').play();
		});
	// });


	function actualizaRegistro (ars) {
		$.ajax({
			url : base_url+'admin/getData',
			cache : false,
			type : 'POST',
			data : ars,
			beforeSend : function (){
				$('#saveChanges').hide('slow').attr('disabled', true);
			}
		}).done(function (data){
			if (data=='ok') {
					$('#saveChanges').delay(1000).show(100,function(){
						$('<div>',{class:'success'}).html('Registro actualizado').insertBefore('#saveChanges');
						$('.success').delay(3000).animate({'opacity':'0'},500,function(){
							$(this).remove();
						})
					}).attr('disabled', false);

			}else{
				$('#saveChanges').delay(1000).show(100,function(){
						$('<div>',{class:'warning'}).html(data).insertBefore('#saveChanges');
						$('.warning').delay(3000).animate({'opacity':'0'},500,function(){
							$(this).remove();
						})
					}).attr('disabled', false);
			}

		}).fail(function (status, statusText, responseXML){
				console.log(statusText);
				console.log(responseXML);
			});
	}


/*		NUEVA PROPIEDAD */
	//

	$('form#nuevaPropiedad').fileupload({
        dataType: 'json',
        dropZone: $('#image_preview'),
        add: function (e, data) {
        	$('button.submit').remove();
        	if (data.files && data.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function(e) {
		            $('#previewing').attr('src', e.target.result);
		        }
		    }
        	reader.readAsDataURL(data.files[0]);
            data.context = $('<button/>',{class:'submit'}).text('Cargar')
                .appendTo($(this).find('#selectImage'))
                .click(function (e) {
                	e.preventDefault();
                    // data.context = $('<p/>').text('Uploading...').replaceAll($(this));
                    data.context.fadeOut();
                    data.submit();
                });
        },
        done: function (e, data) {
        	data = typeof(data)!='object' ? JSON.parse(data) : data;
            // console.log(data.result);
            var status = data.result.status;
            if(status == "success"){
				// Filtro
				// nombre
				// imagen
				var filtro = data.result.filtro,
				nombre     = data.result.nombre,
				imagen     = data.result.imagen,
				dats       = {
					Filtro : filtro,
					nombre : nombre,
					imagen : imagen,
					adminPanel : 'Nueva Propiedad'
				};
            	$.ajax({
            		url : base_url+'admin/getData',
            		cache :false,
            		type : 'POST',
            		data : dats,
            		beforeSend : function(){
            			$('#previewing').removeAttr('src');
		            	$('button.submit').remove();
		            	$('form#nuevaPropiedad').slideUp(1000);
            		}
            	}).done(function (data){
            		console.log(data);
            		var nueva = '<li><a href="#sidr" id="'+filtro+'" class="configFilter showInfo" data-cont="'+filtro+'"><img src="images/filtros/'+imagen+'" /><p>'+nombre+'</p></a></li>';

					$(nueva).hide().appendTo("#lista-propiedades").fadeIn(1000);

            	}).fail(function (status, statusText, responseXML){
            		console.log(statusText);
					console.log(responseXML);
            	});
            }else{
            	alert(status);
            }
        },
        fail: function (e, data){
        	 data.context.addClass('error');
        	 // data.context.addClass('error');
        }
    });
	/* ENVIA INFO DE NUEVA PROPIEDAD */

	// $("form#nuevaPropiedad").on('submit',(function (e) {
	// 	e.preventDefault();
	// 	$("#message").empty();
	// 	$('#loading').show();
	// 	var datos = new FormData();
	// 	var propiedad = $('#propiedad-nueva').val();
	// 	datos.append("propiedad", "propiedad");
	// 	// datos.append(document.getElementById("file").files[0]);
	// 	// var datos = $(this).serialize();
	// 	console.log(datos);
	// 	$.ajax({
	// 		url: base_url+'php/upload_images.php',
	// 		type: "POST",
	// 		data : datos,
	// 		// data: new FormData(this),
	// 		cache: false,
	// 		processData:false,
	// 		success: function(data){
	// 			$('#loading').hide();
	// 			$("#message").html(data);
	// 			console.log(data);
	// 		},
	// 		error: function(status, statusText, responseXML){
	// 			console.log(statusText);
	// 			console.log(responseXML);
	// 		}
	// 	});
	// }));


	/*NUEVA PROPIEDAD*/

 	/* PROPIEDADES */


});


 	/* PROPIEDADES */

function eliminaImagen(){
	$('.elimina-img').each(function () {
		$(this).click(function (e){
			e.stopImmediatePropagation();
			e.preventDefault();
			var este = $(this);
			var suId = este.attr('id');
			var data = {
				adminPanel : 'Eliminar Imagenes',
				delete : [suId]
			};
			if(confirm('¿Desea eliminar este registro?')){
				$.ajax({
					url : base_url+'admin/getData',
					cache : false,
					type : 'POST',
					data : data
				}).done(function (data){
					este.parent().hide('slow',function(){
						$(this).remove();
					});
				}).fail(function (status, statusText, responseXML){
					console.log(statusText);
					console.log(responseXML);
				});
			}

		})
	})
}

function agregaImages (ars){
	// ars = JSON.parse(ars);
	ars = typeof(ars)!='object' ? JSON.parse(ars) : ars;
	ars['Filtro'] = $('#filtro-hd').val();
	ars['adminPanel'] = $('#add-hd').val();
	// console.log(ars);
	$.ajax({
		url : base_url+'admin/getData',
		data : ars,
		cache : false,
		type : 'POST'
	}).done(function (data){
		console.log(data);
	}).fail(function (status, statusText, responseXML){
		console.log(statusText);
		console.log(responseXML);
	});
}

 	/* PROPIEDADES */

	function muestraLoadr (e){
		e.preventDefault();
		e.stopImmediatePropagation();
		var overlay = $('#overlay-loading');
		var dom = $('html, body');
		dom.queue(function(){
			$(this).toggleClass('no-overflow');
			$(this).dequeue();
		}).delay(1000);
		// dom.toggleClass('no-overflow').delay(1000);
		overlay.slideToggle().delay(1000);
	}
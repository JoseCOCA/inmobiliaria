jQuery(document).on('ready', function($){
	$=jQuery;
	$("#input_btn").on('click',function(e){
		e.preventDefault();
	  	$("#file-upl").click();  
	});
    $('#admin-menu, .showInfo').sidr({speed: 500});
 	// $('#simple-menu').sidr();

 	$('#bannersEdit').click(function(){
 		alert('warning! \n Critical error!! \n Aorry an error has ocurred. Please try your request later\n Status error[40092] Unknown request service in front page');
 	});

	// $('.showInfo').each(function() {
		$('.showInfo').live('click', function (e){
			$(this).sidr({speed: 500});
			$('#welcome').hide();
			$('.config_container').slideDown(500);
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
				data = JSON.parse(data);
				console.log(data);
				var datos = data[0];
				for (var i = 1; i < data.length; i++) {
					var url = data[i]['url'];
					var name = data[i]['nombre'];
					var image = '<li><div class="elimina-img btn" id="'+data[i]['nombre']+'">Eliminar</div><img src="' + base_url + url + '" alt="' + name + '" class="image_slide"></li>';
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
					class: 'saveChanges btn',
					'data-filtro': datos['Filtro']
				}).html('Guardar').appendTo('.config_container');
				eliminaImagen();
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
            console.log(data.result);
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

});

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
	ars = JSON.parse(ars);
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


	
jQuery(document).on('ready', function($){
	$=jQuery;

    $('#admin-menu, .showInfo').sidr({speed: 500});
 	// $('#simple-menu').sidr();

	$('.showInfo').each(function() {
		$(this).on('click', function (e){
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
		})
	});

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



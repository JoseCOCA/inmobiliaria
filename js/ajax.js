
$('#submit').click(function(e){
	e.preventDefault();
	var form_data = { 
		name : $('#nombre').val(), 
		tel : $('#telefono').val(), 
		cel : $('#celular').val(), 
		email : $('#correo').val(), 
		emp : $('#empresa').val(), 
		com : $('#comentarios').val() 
		},
		url = $('#notif').attr('action');


	console.log(url);
	$.ajax({

		url: 	url+'notificacion/obtenerDatos',
		type:  	'POST',
		data:  	form_data,
		success: function (msg) {
			$('.form-message').append(msg);
			document.getElementById("notif").reset();
		}

	});

	return false;

});
jQuery(document).on('ready', function($){
	$=jQuery;

    $('#admin-menu').sidr();
 	// $('#simple-menu').sidr();
 	$('.add_more').click(function(e){
        e.preventDefault();
        $(this).before("<input name='file[]' type='file'/>");
    });
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

				};


			}).fail(function (status, statusText, responseXML){
				console.log(statusText);
				console.log(responseXML);
			});
			// $('.visible').removeClass('.visible').addClass('oculto');
			// $('#'+getID).removeClass('oculto').addClass('visible');

			// $('#este-'+getID +' #slider').data('rhinoslider').play();
		})
	});


});


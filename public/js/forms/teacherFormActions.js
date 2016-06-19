$(document).ready(function() {
	// Parte de mostrar el tutor
	var tutor = $('#tutor');
	var oculto = $('#oculto');

	// si existe crearemos eventos
	if (tutor.length > 0) {
		// existe
		tutor.on( 'click', function() {
			if(tutor.is(':checked') ){
				if (oculto.length > 0) {
					// exite
					oculto.removeClass('hide').fadeIn(500);
				}
			} else {
				oculto.addClass('hide').fadeIn(500);
			}
		});
	}

});
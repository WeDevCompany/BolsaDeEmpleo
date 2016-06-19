$(document).ready(function() {
	// Parte de mostrar el tutor
	var tutor = $('#tutor');
	var oculto = $('#oculto');
	var buttonTutor = $('#newTutor');

	// si existe crearemos eventos
	if (tutor.length > 0) {
		// existe
		tutor.on( 'click', function() {
			if(tutor.is(':checked') ){
				if (oculto.length > 0) {
					// exite
					oculto.removeClass('hide').fadeIn(500);
				}

				if(buttonTutor.length > 0) {
					buttonTutor.removeClass('hide').fadeIn(750);
					validaciones.submitEnable(buttonTutor);
				}
			} else {
				oculto.addClass('hide').fadeIn(500);
				buttonTutor.addClass('hide').fadeIn(750);
				validaciones.submitDisable(buttonTutor);
			}
		});
	}

});
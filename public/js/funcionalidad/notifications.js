$('document').ready(function() {
	// cogemos el <ul> que contiene todos los <li> para sumar
	var notifications = $('#notifications');
	// cogemos el <span> del resultado
	var resultado = $('#resultado');

	var suma = 0;
	// comprobamos que esxisten las notificaciones sobre las que escribir
	if (notifications.length > 0) {
		// Iteramos todos los
		$('#notifications li a span').each(function(i)
		{

			// comprobamos que son súmeros y son positivos
			if($(this).html() !== null && parseInt($(this).html()) > 0){
				if (parseInt($(this).html()) > 99) {
					suma += parseInt($(this).html());
					$(this).html('99+')
				} else {
					suma += parseInt($(this).html());
				}


			}
		});
		// Casteamos el total por si acaso
		suma = parseInt(suma);
		// Comprobamos que si el medidor de notificacíones
		// es superior a 999 se pondrá 999+
		if(suma > 999) {
			resultado.html('999+');
		} else {
			resultado.html(suma);
		}
	}// comprobación de si existen las notificaciones

});
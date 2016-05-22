/*
 * Clase spin, esta clase contendrá un objeto de tipo spin encargado de controlar 
 * todos los spin junto con sus variables para los diferentes tipos.
 * @author Eduardo López Pardo
 * @version  21/05/16
 */

	// Objeto spin
	var spin = {
		spinOn : function (type, variable, bool, identifier) {
			// Compruebo si se han recibido los parametros
			if (typeof type == "undefined" || typeof variable == "undefined"){
				return false;
			} else {
				// Si el campo booleano es true añado tambien el div contenedor del spinner donde se indique
				if(typeof bool != "undefined" && bool) {
					if (typeof identifier != "undefined") {
						$('#'+identifier).append('<div id="spinner'+type+variable+'" class="spinner'+type+'"></div>');
					} else {
						return false;
					}
				}
				// Obtenemos el elemento donde vamos a meter el spinner
				target = document.getElementById('spinner'+type+variable);
				// Depende del tipo que sea lo iniciamos con unos parametros u otros
				switch(type) {
				    case 'F':
				        spinnerF = new Spinner(optsF).spin(target);
				        break;
				    case 'C':
				        spinnerC = new Spinner(optsC).spin(target);
				        break;
				    default:
				        spinner = new Spinner().spin(target);
				}
				return true;
			}
		}, // spinOn

		spinOff : function (type, variable, bool) {
			// Compruebo si se han recibido los parametros
			if (typeof type == "undefined" || typeof variable == "undefined"){
				return false;
			} else {
				// Si el campo booleano es true eliminamos tambien el div contenedor del spinner donde se indique
				if(typeof bool != "undefined" && bool) {
					$('#spinner'+type+variable).remove();
				}
				// Depende del tipo que sea paramos un spinner u otro
				switch(type) {
				    case 'F':
				        spinnerF.stop();
				        break;
				    case 'C':
				        spinnerC.stop();
				        break;
				    default:
				        spinner.stop();
				}
				return true;
			}
		} // spinOff
	}; // spin

 	// Variables para el spin ciclos
	var optsC = {
		lines: 15 // Lineas dibujadas
		, length: 15 // Longitud de la linea
		, width: 10 // Anchura de las lineas
		, radius: 31 // Radio del circulo
		, scale: 0.25 // Escala
		, color: '#000' // Color
		, opacity: 0.3 // Opacidad de las lineas
		, rotate: 0 // Rotación
		, direction: 1 // 1: Sentido agujas del reloj, -1: Sentido contrario a las agujas del reloj
		, speed: 1 // Velocidad de rotacion
		, trail: 60 // Velocidad de giro
		, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
		, zIndex: 2e9 // The z-index (defaults to 2000000000)
		, className: 'spinnerC' // Nombre de la clase a la que se asignara el spinner
		, top: '50%' // Posicion relativa TOP
		, left: '50%' // Posicion relativa LEFT
		, shadow: false // Sombra
		, hwaccel: false // Whether to use hardware acceleration
		, position: 'relative' // Tipo de posicion
	}; // optsC

	// Variables para el spin de familias profesionales
	var optsF = {
		lines: 15 // Lineas dibujadas
		, length: 15 // Longitud de la linea
		, width: 10 // Anchura de las lineas
		, radius: 31 // Radio del circulo
		, scale: 0.25 // Escala
		, color: '#000' // Color
		, opacity: 0.3 // Opacidad de las lineas
		, rotate: 0 // Rotación
		, direction: 1 // 1: Sentido agujas del reloj, -1: Sentido contrario a las agujas del reloj
		, speed: 1 // Velocidad de rotacion
		, trail: 60 // Velocidad de giro
		, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
		, zIndex: 2e9 // The z-index (defaults to 2000000000)
		, className: 'spinnerF' // Nombre de la clase a la que se asignara el spinner
		, top: '50%' // Posicion relativa TOP
		, left: '50%' // Posicion relativa LEFT
		, shadow: false // Sombra
		, hwaccel: false // Whether to use hardware acceleration
		, position: 'relative' // Tipo de posicion
	}; // optsF
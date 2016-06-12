var prevIdentifiers = [];

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

	// Carga de las asignaturas
	/* $('#cycle1').on('change', function(e) {
		
		$('#subjects').attr('disabled', 'disabled');

		// Esperamos 1/4 de segundo para seguir ya que debemos dar
		// un margen debido a que al borrar un ciclo, si no se da ese
		// margen puede que aún tome el ciclo borrado como seleccionado
		setTimeout(function(){

			// Obtengo los nombres de los ciclos
			names = $('#cycle1_chosen').children('ul[class=chosen-choices]').children('li[class=search-choice]').children('span').text();
			// Separo cada ciclo
			aux = names.split("[");
			
			// Declaro las variables que usare
			selectedCycles = [];
			cycleId = [];
			method_params = [];

			if(prevIdentifiers.length == 0) {

				// Los recorro y obtengo su id
				for(i = 0; i < aux.length-1; i++) {
					// Obtengo los ciclos seleccionados
					selectedCycles[i] = "[" + aux[i+1];

					// Obtengo los ids de dichos ciclos
					cycleId[i] = $('option:contains(' + selectedCycles[i] + ')')[0].value;

					method_params[0] = null; 

					//console.log("Busqueda: " + $('#cycle1_chosen').children('.chosen-choices').children('.search-choice').children('a[data-option-array-index=' + cycleId[i] + ']').attr('data-option-array-index'));
					console.log("Id: " + cycleId[i]);

					// Buscamos el id del ciclo para comprobar si ya lo tenemos cargado
					method_params[1] = "subjects";
					method_params[2] = "";
					method_params[3] = cycleId[i];
					method_params[4] = selectedCycles[i];

					// Iniciamos el spin de las familias
					spin.spinOn('T', 0, true, 'subjectsDiv');

					// Lanzamos la peticion AJAX para obtener las asignaturas de dichos ciclos
					ajax.callAjax('GET', '/json/subjects/' + cycleId[i], "reloadSubjects", "addSubjects", method_params);	
					
					// La primera vez almacenamos todos los Ids
					prevIdentifiers = cycleId;

					// Muestro el select de asignaturas
					$('#cycle1').parent().next().removeClass("hidden");

					$('#subjects').attr('disabled', 'disabled');
				}
			} else {

			}

			// Recorro los optgroup de las asignaturas. Si ya no esta uno de ellos lo elimina.
			for(j = 0; j < cycleId.length; j++) {

			}

			// Test
			if(selectedCycles.length != 0) {
				//console.log($('#cycle1_chosen').children('ul[class=chosen-choices]').children('li[class=search-choice]').length);
				//console.log($('#subjects_chosen').children('ul[class=chosen-choices]').children('li[class=search-choice]').length);				
			}
		}, 125);
	}); */

	

});
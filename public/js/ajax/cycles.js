var p = 0;

var estadoCycles;
var estadoFamily;
var fechaInicio;
var fechaFin;
var target = document.getElementById('spinner');
var spinner = new Spinner(opts).spin(target);

$(document).ready(function () {
	// Almaceno el valor des primer option que aparezca en el select
	var familyId = $('#family0').children('option:first').val();

	// Si no se ha introducido nada raro, llevo a cabo todo lo demas
	if(typeof familyId === 'string') {
		estadoFamily = true;

		// Peticion Ajax
		// Tomo los datos de la ruta establecida a la que le concateno el identificador
		$.get('/json/cycles/' + familyId, function(data){
			$('#fieldCycles').append('<div class="row"><div class="input-field col-md-12"><label for="cycles" style="margin-top: -3em">Ciclos cursados</label><select name="cycles[' + p + ']" class="form-control" id="cycles' + p + '"></select>' +
			'<section">' +
	        '<div class="input-field col-md-6"  style="padding-top: 5px">' +
	            '<label for="yearFrom[' + p + ']" style="margin-top: -2em">A&ntilde;o de inicio</label>' +
				funciones.generarSelectYears('yearFrom[' + p + ']', 1990) +
	        '</div>' +
	        '<div class="input-field col-md-6">' +
	            '<label for="yearTo[' + p + ']" style="margin-top: -2em">A&ntilde;o de fin</label>' +
	            funciones.generarSelectYears('yearTo[' + p + ']', 1990) +
	        '</div>' +
	    '</section>');

			$('#cycles'+p).empty();
			
			basico = true;
			medio = true;
			superior = true;
			$.each(data, function(index, cycleObj){
				if ( cycleObj.level === "Básico") {
					if( basico === true ) {
						$('#cycles'+p).append('<optgroup label="Grados básicos" id="basico'+p+'"></optgroup>');
						basico = false;
					}
					$('#basico'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
				} else if ( cycleObj.level === "Medio" ) {
					if ( medio === true ) {
						$('#cycles'+p).append('<optgroup label="Grados medios" id="medio'+p+'"></optgroup>');
						medio = false;
					}
					$('#medio'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
				} else if ( cycleObj.level === "Superior" ) {
					if ( superior === true ) {
						$('#cycles'+p).append('<optgroup label="Grados superiores" id="superior'+p+'"></optgroup>');
						superior = false;
					}
					$('#superior'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
				}
				
			});

			estadoCycles = true;
			if (estadoFamily && estadoCycles) {
				// si existen los campos habilitamos el botón
				// porque no podemos acceder a un elemento generado
				// ya que no sabemos cuando va a ser generado dicho elemento
				fechaInicio = $('#yearFrom[' + p + ']');
				fechaFin = $('#yearTo[' + p +']');

				if(fechaInicio && fechaFin){
					$('#btnAddFamilyCycle').addClass("waves-effect  waves-light");
			        $('#btnAddFamilyCycle').prop('disabled', false);
			        $('#spinner').remove();
			        spinner.stop();
				}
		    }
		});
	}
});

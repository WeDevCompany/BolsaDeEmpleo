/* AÑADE A CHOSEN LOS DATOS (FALLA)
$('#family').on('change', function(e) {
	console.log(e);

	// Almaceno el valor que ha tomado el select
	var familyId = e.target.value;

	// Peticion Ajax
	// Tomo los datos de la ruta establecida a la que le concateno el identificador
	$.get('/json/cycles/' + familyId, function(data){
		console.log(data);
        $('#select_chosen_chosen.chosen-results').empty();
        $('<ul class="chosen-results">')
		$.each(data, function(index, cycleObj){
        	$('#select_chosen_chosen.chosen-results').append('<li class="active-result result-selected" data-option-array-index="' + cycleObj.id + '">' + cycleObj.name + '</li>');
			$('#select-chosen').append('<option value="' + cycleObj.id + '">' + cycleObj.name + '</option>')
		});
	});
}); */

/* GENERA EL SELECT ENTERO

 $('#family').on('change', function(e) {
	console.log(e);

	// Almaceno el valor que ha tomado el select
	var familyId = e.target.value;

	// Peticion Ajax
	// Tomo los datos de la ruta establecida a la que le concateno el identificador
	$.get('/json/cycles/' + familyId, function(data){
		console.log(data);
        $('#selectCycles').append('<label for="cycles" style="margin-top: -3em">Ciclos cursados</label>');
		$('#selectCycles').append('<select name="cycles" class="chosen-select form-control" id="select-chosen">');
		$.each(data, function(index, cycleObj){
			$('#select-chosen').append('<option value="' + cycleObj.id + '">' + cycleObj.name + '</option>')
		});
		$('#selectCycles').append('</select>');
	});
});
*/

/* SELECT NORMAL YA CREADO - AÑADE LOS OPTION CORRECTAMENTE (VERSION ESTABLE)
$('#family').on('change', function(e) {
	//console.log(e);

	// Almaceno el valor que ha tomado el select
	var familyId = e.target.value;

	// Peticion Ajax
	// Tomo los datos de la ruta establecida a la que le concateno el identificador
	$.get('/json/cycles/' + familyId, function(data){
		//console.log(data);
		$('#cycles').empty();
		$.each(data, function(index, cycleObj){
			$('#cycles').append('<option value="' + cycleObj.id + '">' + cycleObj.name + ' [' + cycleObj.level + ']' + '</option>')
		});
	});
}); */

/* SELECT NORMAL YA CREADO - AÑADE EL CAMPO CICLOS ENTERO Y SI YA EXISTE AÑADE LOS OPTION */

var p = 0;
var cont = 0;

var estadoCycles;
var estadoFamily;
var fechaInicio;
var fechaFin;

$('#family'+p).on('change', function(e) {
	//console.log(e);

	// Almaceno el valor que ha tomado el select
	var familyId = e.target.value;
	estadoFamily = true;

	// Peticion Ajax
	// Tomo los datos de la ruta establecida a la que le concateno el identificador
	$.get('/json/cycles/' + familyId, function(data){
		//console.log(data);

		if(cont < 1){
			$('#fieldCycles').removeClass('hidden');
			$('#fieldCycles').append('<div class="row"><div class="input-field col-md-12"><label for="cycles" style="margin-top: -3em">Ciclos cursados</label><select name="cycles[' + p + ']" class="form-control" id="cycles' + p + '"></select>' +
			'<section">' +
            '<div class="input-field col-md-6"  style="padding-top: 5px">' +
                '<label for="yearFrom[' + p + ']" style="margin-top: -2em">A&ntilde;o de inicio</label>' +
				generarSelectYears('yearFrom[' + p + ']', 1990) +
            '</div>' +
            '<div class="input-field col-md-6">' +
                '<label for="yearTo[' + p + ']" style="margin-top: -2em">A&ntilde;o de fin</label>' +
                generarSelectYears('yearTo[' + p + ']', 1990) +
            '</div>' +
        '</section>');
			$('#cycles'+p).empty();
			$.each(data, function(index, cycleObj){
				$('#cycles'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
			});
			cont++;
			estadoCycles = true;
		} else {
			$('#cycles'+p).empty();
			$.each(data, function(index, cycleObj){
				$('#cycles'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
			});
			estadoCycles = true;
		}
		if (estadoFamily && estadoCycles) {
			// si existen los campos habilitamos el botón
			// porque no podemos acceder a un elemento generado
			// ya que no sabemos cuando va a ser generado dicho elemento
			fechaInicio = $('#yearFrom[' + p + ']');
			fechaFin = $('#yearTo[' + p +']');

			if(fechaInicio && fechaFin){
				$('#btnAddFamilyCycle').addClass("waves-effect  waves-light");
		        $('#btnAddFamilyCycle').prop('disabled', false);
			}
	    }
	});
});

function generarSelectYears(id, end){
	console.log(id);
	var anyo = (new Date).getFullYear();
	var select = '<select class="form-control" name="' + id + '" id="' + id + '">';
	for (k = end; k <= anyo; k++)
    {
        select += '<option value="' + k + '">' + k + '</option>';
    }
	select += "</select>";
	console.log(select);
	return select;
}

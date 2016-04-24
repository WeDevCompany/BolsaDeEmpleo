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

/* SELECT NORMAL YA CREADO - AÑADE LOS OPTION CORRECTAMENTE (VERSION ESTABLE) */
$('#family').on('change', function(e) {
	console.log(e);

	// Almaceno el valor que ha tomado el select
	var familyId = e.target.value;

	// Peticion Ajax
	// Tomo los datos de la ruta establecida a la que le concateno el identificador
	$.get('/json/cycles/' + familyId, function(data){
		console.log(data);
		$('#cycles').empty();
		$.each(data, function(index, cycleObj){
			$('#cycles').append('<option value="' + cycleObj.id + '">' + cycleObj.name + ' [' + cycleObj.level + ']' + '</option>')
		});
	});
});
var p = 0;

$(document).ready(function () {
	// Bloqueamos el boton de añadir ciclos.
	validaciones.submitDisable($('#btnAddFamilyCycle'));

	// Almaceno el valor des primer option que aparezca en el select
	familyId = $('#family0').children('option:first').val();

	// Si no se ha introducido nada raro, llevo a cabo todo lo demas
	if (typeof familyId == "undefined" || familyId.length == 0) {
		$('#spinnerC'+p).remove();
		$('#family'+p).remove();
		$('#fieldCycles').remove();
		$('#fieldFamilies').children('div').remove();
        spinnerC.stop();
        $('#fieldFamilies').append('<span class="ajaxError">Se ha producido un error, intente registrarse más tarde.</span>');
		console.log("No se han detectado familias profesionales.");
	} else {
		// Primera peticion ajax
		estadoFamily = true;
		ajax = ajax.callAjax('GET', '/json/cycles/'+familyId, 'addCycle', '#fieldCycles', p);
		p++;
	}
});
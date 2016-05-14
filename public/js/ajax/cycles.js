
$(document).ready(function () {
	// Almaceno el valor des primer option que aparezca en el select
	familyId = $('#family0').children('option:first').val();

	// Si no se ha introducido nada raro, llevo a cabo todo lo demas
	if (typeof familyId !== 'string') {
		console.log("No se han detectado familias profesionales.");
	} else {
		// Peticion ajax
		estadoFamily = true;
		ajax.callAjax('GET', '/json/cycles/'+familyId, 'addCycle', '#fieldCycles');
	}
});

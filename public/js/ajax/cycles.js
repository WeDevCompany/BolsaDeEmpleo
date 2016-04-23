$('#family').on('change', function(e) {
	console.log(e);

	// Almaceno el valor que ha tomado el select
	var familyId = e.target.value;

	// Peticion Ajax
	// Tomo los datos de la ruta establecida a la que le concateno el identificador
	$.get('/ajax/cycles?familyId=' + familyId, function(data){
		console.log(data);
		$('#select-chosen').empty();
		$.each(data, function(index, cycleObj){
			$('#select-chosen').append('<option value="' + cycleObj.id + '">' + cycleObj.name + '</option>')
		})
	})

});
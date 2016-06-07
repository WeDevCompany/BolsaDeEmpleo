// Evento que cambia las filas de las tablas de sitio.
$('tbody').on('click', 'i', function(e){
    // Obtengo el id de la asignatura
    asignatura = e.target.id;

    // Si existe y es valido
    if (asignatura.length && asignatura != 'cabeceras') {

        // Obtengo su contenido
        valor = $('#'+asignatura).parent().parent().text();
        valor = jQuery.trim(valor);

        // Localizo el lado en que está y lo cambio de lado.
        if($('#mySubjects').find("#"+asignatura).length){
            nuevaUbicacion = 'allSubjects';
            direccion = 'right';
            col1 = '<th class="col-md-11" style="width:100%; word-wrap: break-word;">' + valor + '</th>';
            col2 = '<th class="col-md-1" style="font-size: 180%; text-align:center; vertical-align: middle; padding:0"><i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-' + direccion + '"></i><input type="checkbox" checked="checked" name="' + nuevaUbicacion + '[' + asignatura + ']"></th>';
        } else if($('#allSubjects').find("#"+asignatura).length) {
            nuevaUbicacion = 'mySubjects';
            direccion = 'left';
            col1 = '<th class="col-md-1" style="font-size: 180%; text-align:center; vertical-align: middle; padding:0"><i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-' + direccion + '"></i><input type="checkbox" checked="checked" name="' + nuevaUbicacion + '[' + asignatura + ']"></th>';
            col2 = '<th class="col-md-11" style="width:100%; word-wrap: break-word;">' + valor + '</th>';
        }

        //Habilito el botón al haber cambios
        validaciones.submitEnable($('#submit'));

        // Creo la nueva fila
        $('#'+nuevaUbicacion).append('<tr>' + col1 + col2 + '</tr>');

        // Borro la fila anterior
        $(this).parent().parent().remove();

    }
    
});

// Evento que cambia las filas de las tablas de sitio.
$('tbody').on('click', 'i', function(e){
    // Obtengo el id de la asignatura
    asignatura = e.target.id;

    // Si existe y es valido
    if (asignatura.length && asignatura != 'cabeceras') {

        // Obtengo su contenido
        valor = $('#'+asignatura).parent().parent().parent().text();
        valor = jQuery.trim(valor);

        // Localizo el lado en que está y lo cambio de lado.
        if($('#mySubjects').find("#"+asignatura).length){
            // Selecciono la nueva ubicacion de la fila
            nuevaUbicacion = 'allSubjects';

            // Añado el nuevo contenido
            $('#'+nuevaUbicacion).append(
                '<tr>' +
                    '<td class="col-md-11 subjectName">' + valor + '</td>' +
                    '<td class="col-md-1 subjectArrow no-padding">' +
                        '<div class="show-responsive">' +
                            '<i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-down"></i><input class="hidden" type="text" value="' + asignatura + '" name="allSubjects[' + asignatura + ']">' +
                        '</div>' +
                        '<div class="hidden-media">' +
                            '<i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-right"></i><input class="hidden" type="text" value="' + asignatura + '" name="allSubjects[' + asignatura + ']">' +
                        '</div>' +
                    '</td>' +
                '</tr>'
            );            
        } else if($('#allSubjects').find("#"+asignatura).length) {
            // Selecciono la nueva ubicacion de la fila
            nuevaUbicacion = 'mySubjects';

            // Añado el nuevo contenido
            $('#'+nuevaUbicacion).append(
                '<tr>' +
                    '<td class="col-md-1 subjectArrow no-padding">' +
                        '<div class="show-responsive">' +
                            '<i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-up"></i><input class="hidden" type="text" value="' + asignatura + '" name="mySubjects[' + asignatura + ']">' +
                        '</div>' +
                        '<div class="hidden-media">' +
                            '<i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-left"></i><input class="hidden" type="text" value="' + asignatura + '" name="mySubjects[' + asignatura + ']">' +
                        '</div>' +
                    '</td>' +
                    '<td class="col-md-11 subjectName">' + valor + '</td>' +
                    '<td class="col-md-1"></td>'+
                '</tr>'
            );
            
        }

        //Habilito el botón al haber cambios
        validaciones.submitEnable($('#submit'));

        // Borro la fila anterior
        $(this).parent().parent().parent().remove();

    }
    
});

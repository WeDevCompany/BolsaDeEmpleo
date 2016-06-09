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
                    '<th class="col-md-11 subjectName">' + valor + '</th>' +
                    '<th class="col-md-1 subjectArrow no-padding">' +
                        '<div class="show-responsive">' +
                            '<i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-down"></i><input class="hidden" type="text" value="' + asignatura + '" name="allSubjects[' + asignatura + ']">' +
                        '</div>' +
                        '<div class="hidden-media">' +
                            '<i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-right"></i><input class="hidden" type="text" value="' + asignatura + '" name="allSubjects[' + asignatura + ']">' +
                        '</div>' +
                    '</th>' +
                '</tr>'
            );            
        } else if($('#allSubjects').find("#"+asignatura).length) {
            // Selecciono la nueva ubicacion de la fila
            nuevaUbicacion = 'mySubjects';

            // Añado el nuevo contenido
            $('#'+nuevaUbicacion).append(
                '<tr>' +
                    '<th class="col-md-1 subjectArrow no-padding">' +
                        '<div class="show-responsive">' +
                            '<i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-up"></i><input class="hidden" type="text" value="' + asignatura + '" name="mySubjects[' + asignatura + ']">' +
                        '</div>' +
                        '<div class="hidden-media">' +
                            '<i id="' + asignatura + '" class="fa fa-btn fa-arrow-circle-left"></i><input class="hidden" type="text" value="' + asignatura + '" name="mySubjects[' + asignatura + ']">' +
                        '</div>' +
                    '</th>' +
                    '<th class="col-md-11 subjectName">' + valor + '</th>' +
                    '<th class="col-md-1"></th>'+
                '</tr>'
            );
            
            /*nuevaUbicacion = 'allModals';

            $('#'+nuevaUbicacion).append('<div>' +
                    '<div class="modal fade" id="myModal' + asignatura + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                        '<div class="modal-dialog" role="document">' +
                            '<form url="profesor/tags/' + asignatura + '" method="POST" id="tag-form">' +
                                '<div class="modal-content border-orange">' +
                                    '<div class="modal-header text-center no-padding-bottom">' +
                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                                            '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                        '<h4 class="modal-title titleTag" id="myModalLabel">Editar Tags</h4>'+
                                    '</div>' +
                                    '<div class="modal-body">' +
                                        '<h5 class="text-center">' + valor + '</h5>' +
                                        '<div class="control-group">' +
                                            '<div class="row">' +
                                                '<div class="input-field col-md-12">' +
                                                    '<textarea name="body" id="body[' + asignatura + ']" class="border-blue textAreaTags"></textarea>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="modal-footer">' +
                                        '<div class="col-md-6">' +
                                            '<button type="button" class="btn btn-secondary waves-effect waves-light pull-left" data-dismiss="modal">' +
                                                '<div class="show-responsive">' +
                                                    '<i class="fa fa-times" aria-hidden="true"></i>' +
                                                '</div>' +
                                                '<div class="hidden-media">' +
                                                    '<i class="fa fa-times"></i> <span class="hidden-media">Cerrar</span>' +
                                                '</div>' +
                                            '</button>' +
                                        '</div>' +
                                        '<div class="col-md-6">' +
                                            '<button type="submit" class="btn btn-warning waves-effect waves-light">' +
                                                '<div class="show-responsive">' +
                                                    '<i class="fa fa-btn fa-user" aria-hidden="true"></i>' +
                                                '</div>' +
                                                '<div class="hidden-media">' +
                                                    '<i class="fa fa-btn fa-user"></i> <span class="hidden-media">Editar</span>' +
                                                '</div>' +
                                            '</button>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</form>' +
                        '</div>' +
                    '</div>' +
                '</div>'
            );    */
        }

        //Habilito el botón al haber cambios
        validaciones.submitEnable($('#submit'));

        // Borro la fila anterior
        $(this).parent().parent().parent().remove();

    }
    
});

// Evento que obtiene los datos de los tags
$('hoverable').on('click', function(e){

    
});
    var i = 1;
    var texto = "Ciclo - ";
    var error = 0;
    $('#btnAddFamilyCycle').click(function(){
            var divAddFamilyCycle = $('#divAddFamilyCycle');
        if(i < 8){
            // obtenemos el div tras el cual
            // colocaremos los futuros ciclos

            divAddFamilyCycle.after(
            '<div>'+
            '<fieldset>' +
                '<legend style="width: auto;">Familia Profesional</legend>' +
                    '<select name="family" class="family form-control" id="family'+ i + '">' +
                    '</select>' +
            '</fieldset>' +
            '<fieldset class="addFamilyCycle" id="' + i + '"> ' +
                    '<legend style="width:auto;">' + texto + i + '</legend>' +
                    '<div class="form-group">' +
                        '<div class="row">' +
                            '<div class="input-field col-md-12">' +
                                '<label for="cycles[' + i +']" style="margin-top: -3em">Ciclos cursados</label>' +
                                '<select name="cycles[' + i +']" class="form-control" id="cycles'+ i +'">' +
                                '</select>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +

                '<div class="input-field col-md-6">' +
                    '<label for="yearFrom[' + i + ']">A&ntilde;o de inicio</label>' +
                    '<input name="yearFrom[' + i + ']" type="text" id="yearFrom[' + i + ']">' +
                '</div>' +
                '<div class="input-field col-md-6">' +
                    '<label for="yearTo[' + i + ']">A&ntilde;o de fin</label>' +
                    '<input name="yearTo[' + i + ']" type="text" id="yearTo[' + i + ']">' +
                '</div>' +
            '</fieldset>' +
            '<div class="text-center">' +
                '<button type="button" value="'+ i +'" id="btnRemoveFamilyCycle" class="btn-danger btn btn-login-media waves-effect waves-light text-center">' +
                    '<div class="show-responsive">' +
                        '<i class="fa fa fa-times" aria-hidden="true"></i>' +
                    '</div>' +
                    '<div class="hidden-media">' +
                        '<i class="fa fa-btn fa fa-times"></i> <span class="hidden-media">Eliminar ciclo</span>' +
                    '</div>' +
                '</button>' +
            '</div>' +
            "</div>").fadeIn("slow");
        } else {

            var mensaje = "Has excedido el máximo número de ciclos si quieres añadir más hazlo una vez registrado/a";
            if(error < 1){
                divAddFamilyCycle.after('<div id="error-prof-family" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>').fadeIn("slow");
            }
            error++;
        }

        $('#btnRemoveFamilyCycle').click( function(e){
            //console.log(e);
            $(this).parent().parent().remove();
        });

        $.get('/json/profFamilies', function(data){
            //console.log(data);
            $('#family'+i).empty();
            $('#family'+i).append('<option value="0" disabled="disabled" selected="selected">Selecciona una familia profesional</option>');
            $.each(data, function(index, familyObj){
                $('#family'+i).append('<option value="' + familyObj.id + '">' + familyObj.familia + '</option>');
            });
            i++;
        });
    });

    $('.family-cycle').on('change', function(e) {
        //console.log(e);

        // Almaceno el valor que ha tomado el select
        var familyId = e.target.value;

        var identifier = e.target.id;

        if( identifier.substring(0,6) == 'family' ){
            identifier = identifier.substring(6,7);
            // Peticion Ajax
            // Tomo los datos de la ruta establecida a la que le concateno el identificador
            $.get('/json/cycles/' + familyId, function(data){
                //console.log(data);
                $('#cycles'+identifier).empty();
                $.each(data, function(index, cycleObj){
                    $('#cycles'+identifier).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                });
            });
        }
    });

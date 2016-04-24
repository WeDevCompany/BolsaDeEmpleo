    var i = 1;
    var texto = "Ciclo - ";
    $('#btnAddFamilyCycle').click(function(){
        // obtenemos el div tras el cual
        // colocaremos los futuros ciclos
        var divAddFamilyCycle = $('#divAddFamilyCycle');

        divAddFamilyCycle.after('<fieldset class="addFamilyCycle" id="' + texto + i + '"> ' +
                '<legend style="width:auto;">' + texto + i + '</legend>' +
                '<div class="form-group{{ $errors->has("cycles[' + texto + i +']") ? " has-error" : "" }}">' +
                    '<div class="row">' +
                        '<div class="input-field col-md-12">' +
                            '<label for="cycles[' + texto + i +']" style="margin-top: -3em">Ciclos cursados</label>' +
                            '<select name="cycles[' + texto + i +']" class="form-control">' +
                                '<option value="1">A</option><option value="2">B</option><option value="50">C</option><option value="4">D</option><option value="5">E</option><option value="6">F</option>' +
                            '</select>' +
                        '</div>' +
                    '</div>' +
                '</div>' +

            '<div class="input-field col-md-6">' +
                '<label for="yearFrom[' + texto + i + ']">A&ntilde;o de inicio</label>' +
                '<input name="yearFrom[' + texto + i + ']" type="text" id="yearFrom[' + texto + i + ']">' +
            '</div>' +
            '<div class="input-field col-md-6">' +
                '<label for="yearTo[' + texto + i + ']">A&ntilde;o de fin</label>' +
                '<input name="yearTo[' + texto + i + ']" type="text" id="yearTo[' + texto + i + ']">' +
            '</div>' +
            '<div class="text-center">' +
                '<button type="button" value="'+ texto + i +'" id="btnRemoveFamilyCycle" class="btn-danger btn btn-login-media waves-effect waves-light text-center">' +
                    '<div class="show-responsive">' +
                        '<i class="fa fa fa-times" aria-hidden="true"></i>' +
                    '</div>' +
                    '<div class="hidden-media">' +
                        '<i class="fa fa-btn fa fa-times"></i> <span class="hidden-media">Eliminar ciclo</span>' +
                    '</div>' +
                '</button>' +
            '</div>' +
        '</fieldset>').fadeIn("slow");

        i++;
        $('#btnRemoveFamilyCycle').click( function(e){
            $(this).parent().parent().remove();
        });
    });

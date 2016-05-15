/**
 * Cuando el formulario se carge se deshabilitará el botón
 * para añadir más ciclos hasta que se validen los campos dentro de el
 */

// ==============================================
// Generamos los campos input según el evento click
// Esto solo funcionará tras haber rellenado el primer formulario
// ==============================================
var error = 0;
// variable que ayuda a validar el estado de los ciclos

$('#btnAddFamilyCycle').click(function(){

    validaciones.submitDisable($('#btnAddFamilyCycle'));

    // Almacenamos su valor en una variable para el after
    var divAddFamilyCycle = $('#divAddFamilyCycle');
    
    // No permitimos mas de 7 ciclos extra
    if(p < 8){
        // Creamos la estructura html
        divAddFamilyCycle.after(
        '<div>'+
        '<fieldset><div id="spinnerF' + p + '" class="spinnerF"></div>' +
            '<legend style="width: auto;">Familia Profesional</legend>' +
                '<div class="form-group">' +
                    '<div class="row">' +
                        '<div class="input-field col-md-12">' +
                           '<label for="family'+ p + '" class="hidden" style="margin-top: -2.5em">Familia profesional perteneciente al ciclo</label>' +
                            '<select name="family" class="family form-control hidden" id="family'+ p + '"></select>' +
                        '</div>' +
                    '</div>' +    
                '</div>' +
        '</fieldset>' +
        '<fieldset class="addFamilyCycle" id="' + p + '"><div id="spinnerC' + p + '" class="spinnerc"></div>' +
                '<legend style="width:auto;">' + texto + p + '</legend>' +
                '<div class="form-group hidden">' +
                    '<div class="row">' +
                        '<div class="input-field col-md-12">' +
                            '<label for="cycles[' + p +']" style="margin-top: -2.5em">Ciclos cursados</label>' +
                            '<select name="cycles[' + p +']" class="form-control hidden" id="cycles'+ p +'">' +
                            '</select>' +
                        '</div>' +
                    '</div>' +
                '</div>' +

            '<div class="input-field col-md-6 hidden"  style="padding-top: 5px">' +
                '<label for="yearFrom[' + p + ']" style="margin-top: -2em">A&ntilde;o de inicio</label>' +
                funciones.generarSelectYears('yearFrom[' + p + ']', 1990) +
            '</div>' +
            '<div class="input-field col-md-6 hidden">' +
                '<label for="yearTo[' + p + ']" style="margin-top: -2em">A&ntilde;o de fin</label>' +
                funciones.generarSelectYears('yearTo[' + p + ']', 1990) +
            '</div>' +
        '</fieldset>' +
        '<div class="text-center">' +
            '<button type="button" value="'+ p +'" id="btnRemoveFamilyCycle" class="btn-danger btn btn-login-media waves-effect waves-light text-center">' +
                '<div class="show-responsive">' +
                    '<i class="fa fa fa-times" aria-hidden="true"></i>' +
                '</div>' +
                '<div class="hidden-media">' +
                    '<i class="fa fa-btn fa fa-times"></i> <span class="hidden-media">Eliminar ciclo</span>' +
                '</div>' +
            '</button>' +
        '</div>' +
        "</div>").fadeIn("slow");
        
        // Iniciamos los spinners
        targetF = document.getElementById('spinnerF'+p);
        spinnerF = new Spinner(optsF).spin(targetF);
    } else {
        // Si se ha alcanzado el limite de 7 ciclos mostramos un error
        var mensaje = "Has excedido el máximo número de ciclos si quieres añadir más hazlo una vez registrado/a";
        if(error < 1){
            divAddFamilyCycle.after('<div id="error-prof-family" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>').fadeIn("slow");
        }
        error++;
    }

    /*
        Borramos el elemento abuelo (el div que contiene al ciclo y su familia profesional)
        del boton que haya dado lugar a un evento click
     */
    $('#btnRemoveFamilyCycle').click( function(e){
        $(this).parent().parent().remove();
        if(p < 8) {
            validaciones.submitEnable($('#btnAddFamilyCycle'));
        }
    });

    /*
        Obtenemos la información por JSON
        con las familias profesionales
     */
    // Llamar a objeto AJAX
    $.get('/json/profFamilies', function(data){
        
        // Paramos el primer spin y borramos el div que lo contenia.
        $('#spinnerF'+p).remove();
        spinnerF.stop();
        
        // Mostramos el select con las familias profesionales ya listo.
        $('#family'+p).removeClass('hidden');
        $('label[for="family'+p+'"]').removeClass('hidden');

        // Iniciamos el segundo spin.
        targetC = document.getElementById('spinnerC'+p);
        spinnerC = new Spinner(optsC).spin(targetC);


        $('#family'+p).empty();

        // Por cada familia añadimos un option al select de familias profesionales
        $.each(data, function(index, familyObj){
            $('#family'+p).append('<option value="' + familyObj.id + '">' + familyObj.familia + '</option>');
        });

        // Confirmamos la insercion de los option
        estadoFamily = true;

        // Declaramos las variables para los distintos optgroups 
        basico = true;
        medio = true;
        superior = true;

        // Lanzamos la peticion de los ciclos
        $.get('/json/cycles/' + data[0].id, function(data){
            // Clasificamos dentro del select de ciclos cada resultado
            $.each(data, function(index, cycleObj){
                if ( cycleObj.level === "Básico") {
                    if( basico === true ) {
                        $('#cycles'+p).append('<optgroup label="Grados básicos" id="basico'+p+'"></optgroup>');
                        basico = false;
                    }
                    $('#basico'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                } else if ( cycleObj.level === "Medio" ) {
                    if ( medio === true ) {
                        $('#cycles'+p).append('<optgroup label="Grados medios" id="medio'+p+'"></optgroup>');
                        medio = false;
                    }
                    $('#medio'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                } else if ( cycleObj.level === "Superior" ) {
                    if ( superior === true ) {
                        $('#cycles'+p).append('<optgroup label="Grados superiores" id="superior'+p+'"></optgroup>');
                        superior = false;
                    }
                    $('#superior'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                }

                // Borramos el contenedor del spin y lo paramos
                $('#spinnerC'+p).remove();
                spinnerC.stop();
                
                // Mostramos el select con los ciclos.
                $('#cycles'+p).removeClass('hidden');
                $('fieldset[id="'+p+'"]').children('div').removeClass('hidden');
            });
            
            // Confirmamos la insercion de los option
            estadoCycles = true;

            // Si los option de ambos select se han insertado bien añadimos las fechas
            if (estadoFamily && estadoCycles) {
                // si existen los campos habilitamos el botón
                // porque no podemos acceder a un elemento generado
                // ya que no sabemos cuando va a ser generado dicho elemento
                fechaInicio = $('#yearFrom[' + p + ']');
                fechaFin = $('#yearTo[' + p +']');

                if(fechaInicio && fechaFin){
                    // Devolvemos el boton de añadir ciclos a la normalidad
                    validaciones.submitEnable($('#btnAddFamilyCycle'));
                }
            }
            p++;
        });
    });
});

$('.family-cycle').on('change', function(e) {

    // Almaceno el valor que ha tomado el select
    var familyId = e.target.value;
    var identifier = e.target.id;

    if( identifier.substring(0,6) == 'family' ){
        identifier = identifier.substring(6,7);
        
        // Oculto el select
        $('#cycles'+identifier).before('<div id="spinnerC'+identifier+'" class="spinnerF"></div>');
        $('#cycles'+identifier).addClass('hidden');

        // Inicio el spin
        targetC = document.getElementById('spinnerC'+identifier);
        spinnerC = new Spinner(optsC).spin(targetC);
        
        // Peticion Ajax
        // Tomo los datos de la ruta establecida a la que le concateno el identificador
        $.get('/json/cycles/' + familyId, function(data){
            $('#cycles'+identifier).empty();
            basico = true;
            medio = true;
            superior = true;
            $.each(data, function(index, cycleObj){
                if ( cycleObj.level === "Básico") {
                    if( basico === true ) {
                        $('#cycles'+identifier).append('<optgroup label="Grados básicos" id="basico'+identifier+'"></optgroup>');
                        basico = false;
                    }
                    $('#basico'+identifier).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                } else if ( cycleObj.level === "Medio" ) {
                    if ( medio === true ) {
                        $('#cycles'+identifier).append('<optgroup label="Grados medios" id="medio'+identifier+'"></optgroup>');
                        medio = false;
                    }
                    $('#medio'+identifier).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                } else if ( cycleObj.level === "Superior" ) {
                    if ( superior === true ) {
                        $('#cycles'+identifier).append('<optgroup label="Grados superiores" id="superior'+identifier+'"></optgroup>');
                        superior = false;
                    }
                    $('#superior'+identifier).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                }
            });

            // Paro el spin, elimino su div y muestro el campo select
            spinnerC.stop();
            $('#spinnerC'+identifier).remove();
            $('#cycles'+identifier).removeClass('hidden');
        });
    }
});
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

		//ajax = ajax.callAjax('GET', '/json/cycles/'+familyId);

		method_params = [null, '#fieldCycles', p];
		
		ajax.callAjax('GET', '/json/cycles/'+familyId, "familyCycles", "addCycle", method_params);
		p++;
	}
});	

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
                '<div id="newFamilyCycle' + variable + '">' +
                    '<fieldset id="fieldFamilies' + variable + '">' + 
                        '<div id="spinnerF' + variable + '" class="spinnerF"></div>' +
                        '<legend style="width: auto;">Familia Profesional</legend>' +
                    '</fieldset>' +
                    '<fieldset class="addFamilyCycle" id="fieldCycles' + variable + '">' +
                        '<div id="spinnerC' + variable + '" class="spinnerc"></div>' +
                        '<legend style="width:auto;">' + texto + variable + '</legend>' +
                    '</fieldset>' +
                    '<div class="text-center">' +
                        '<button type="button" value="'+ variable +'" id="btnRemoveFamilyCycle" class="btn-danger btn btn-login-media waves-effect waves-light text-center">' +
                            '<div class="show-responsive">' +
                                '<i class="fa fa fa-times" aria-hidden="true"></i>' +
                            '</div>' +
                            '<div class="hidden-media">' +
                                '<i class="fa fa-btn fa fa-times"></i> <span class="hidden-media">Eliminar ciclo</span>' +
                            '</div>' +
                        '</button>' +
                    '</div>' +
                '</div>').fadeIn("slow");
        
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
var p = 0;
// Iniciamos el spin de ciclos
var targetC = document.getElementById('spinnerC0');
var spinnerC = new Spinner(optsC).spin(targetC);

$(document).ready(function () {
	// Bloqueamos el boton de añadir ciclos.
	validaciones.submitDisable($('#btnAddFamilyCycle'));

	// Almaceno el valor des primer option que aparezca en el select
	familyId = $('#family'+p).children('option:first').val();

	// Si no se ha introducido nada raro, llevo a cabo todo lo demas
	if (typeof familyId == "undefined" || familyId.length == 0) {
		$('#spinnerC'+p).remove();
		$('#family'+p).remove();
		$('#fieldCycles'+p).remove();
		$('#fieldFamilies'+p).children('div').remove();
        $('#fieldFamilies'+p).append('<span class="ajaxError">Se ha producido un error, intente registrarse más tarde.</span>');
		console.log("Problema al cargar las familias.");
	} else {
		// La familia0 esta correcta
		estadoFamilies = true;

		// Preparamos los parametros del metodo postAjax, el primero sera null para sustituirlo por el json
		method_params = [null, '#fieldCycles'+p, p];

		// Lanzamos la peticion de los primeros ciclos.
	    ajax.callAjax('GET', '/json/cycles/'+familyId, "familyCycles", "addCycle", method_params);
        
        // Comprobamos si ha funcionado
        cycle = document.getElementById('cycles'+p);

        if (cycle) {
            // Paramos el primer spin y borramos el div que lo contenia.
            //$('#spinnerC0').remove();
            //  spinnerC.stop();
            identifier = '#fieldDates'+p;
            date = familyCycles.addDate(identifier, p);
            if (date == true) {
                validaciones.submitEnable($('#btnAddFamilyCycle'));
                if (spinnerC) {
                    $('#spinnerC').remove();
                    spinnerC.stop();
                }
                p++;
            } else {
                console.log("Problema al cargar los años.");
            }
        } else {
            console.log("Problema al cargar los ciclos.");
        }
	}
});	// $(document).ready

$('#btnAddFamilyCycle').click(function(){
	// Desactivamos el boton de añadir
    validaciones.submitDisable($('#btnAddFamilyCycle'));

    newFamilyCycle = familyCycles.addStructure("#divAddFamilyCycle", p);

    if(newFamilyCycle == true) {
        $('#btnRemoveFamilyCycle').click( function(e){
            $(this).parent().parent().remove();
            if(p < 8) {
                validaciones.submitEnable($('#btnAddFamilyCycle'));
            }
        });

        method_params = [null, '#fieldFamilies'+p, p];

        // Lanzamos la peticion de las familias
        ajax.callAjax('GET', '/json/profFamilies', "familyCycles", "addFamily", method_params);

        // Comprobamos si ha funcionado
        family = document.getElementById('family'+p);

        if (family) {
            // Obtengo el identificador del primer option de familias
            familyId = $('#family'+p).children('option:first').val();
            
            // Preparo los parametros
            method_params = [null, '#fieldCycles'+p, p];

            // Lanzo la peticion ajax con los ciclos
            ajax.callAjax('GET', '/json/cycles/'+familyId, "familyCycles", "addCycle", method_params);

            // Comprobamos si ha funcionado
            cycle = document.getElementById('cycles'+p);

            if (cycle) {
                identifier = '#fieldDates'+p;
                date = familyCycles.addDate(identifier, p);
                if (date == true) {
                	validaciones.submitEnable($('#btnAddFamilyCycle'));
                    p++;
                } else {
                    console.log("Problema al cargar los nuevos años.");
                }
            } else {
                console.log("Problema al cargar el nuevo ciclo.");
            }
        } else {
            console.log("Problema al cargar la nueva familia.");
        }
    } else {
        console.log("Problema al añadir el nuevo ciclo.");
    }
}); // $('#btnAddFamilyCycle').click

$('.family-cycle').on('change', function(e) {

    // Almaceno el valor que ha tomado el select
    var familyId = e.target.value;
    var variable = e.target.id;

    if( variable.substring(0,6) == 'family' ){
        variable = variable.substring(6,7);
        
        // Oculto el select
        $('#cycles'+variable).before('<div id="spinnerC'+variable+'" class="spinnerF"></div>');
        $('#cycles'+variable).addClass('hidden');

        // Borramos todo el campo
        $('#fieldCycles'+variable).children('div').remove();

        // Preparo los parametros
        method_params = [null, '#fieldCycles'+variable, variable];

        // Lanzo la peticion ajax con los ciclos
        ajax.callAjax('GET', '/json/cycles/'+familyId, "familyCycles", "addCycle", method_params);
        
        // Comprobamos si ha funcionado
        cycle = document.getElementById('cycles'+variable);

        if (cycle) {
            identifier = '#fieldDates'+variable;
            date = familyCycles.addDate(identifier, variable);
            if (date == false) {
                console.log("Problema al cargar los nuevos años.");
            }
        } else {
            console.log("Problema al cargar el nuevo ciclo.");
        }
    
    }
}); // $('.family-cycle').on
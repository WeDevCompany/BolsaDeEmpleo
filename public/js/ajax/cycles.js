var p = 0;
var familyId;

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
        method_params = [null, 'fieldCycles'+p, p];

        // Iniciamos el spin de ciclos
        targetC = document.getElementById('spinnerC'+p);
        spinnerC = new Spinner(optsC).spin(targetC);

        // Lanzamos la peticion de los primeros ciclos.
        ajax.callAjax('GET', '/json/cycles/'+familyId, "familyCycles", "addCycle", method_params);
        
        validaciones.submitEnable($('#btnAddFamilyCycle'));
        
        p++;

    }
}); // $(document).ready

$('#btnAddFamilyCycle').click(function(){
    // Desactivamos el boton de añadir
    validaciones.submitDisable($('#btnAddFamilyCycle'));

    familyCycles.addStructure("divAddFamilyCycle", p);

    $('#btnRemoveFamilyCycle').click( function(e){
        $(this).parent().parent().remove();
        if(p < 8) {
            validaciones.submitEnable($('#btnAddFamilyCycle'));
        }
    });

    method_params = [null, 'fieldFamilies'+p, p];

    // Iniciamos el spin de las familias
    targetF = document.getElementById('spinnerF'+p);
    spinnerF = new Spinner(optsF).spin(targetF);

    // Lanzamos la peticion de las familias
    ajax.callAjax('GET', '/json/profFamilies', "familyCycles", "addFamily", method_params);
    
    // Preparo los parametros
    method_params = [null, 'fieldCycles'+p, p];

    // Iniciamos el spin de ciclos
    targetC = document.getElementById('spinnerC'+p);
    spinnerC = new Spinner(optsC).spin(targetC);

    // Lanzo la peticion ajax con los ciclos
    ajax.callAjax('GET', '/json/cycles/'+familyId, "familyCycles", "addCycle", method_params);
    
    validaciones.submitEnable($('#btnAddFamilyCycle'));
    p++;
            
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
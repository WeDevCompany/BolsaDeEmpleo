var p = 1;
var familyId;
var msg = "Ha ocurrido un error en el servidor. Por favor póngase en contacto con un administrador";

$(document).ready(function () {
    // Almaceno el valor del primer option que aparezca en el select
    familyId = $('#family0').children('option:first').val();

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
    spin.spinOn('F', p);

    // Lanzamos la peticion de las familias
    ajax.callAjax('GET', '/json/profFamilies', "familyCycles", "addFamily", method_params);
    
    // Preparo los parametros
    method_params = [null, 'fieldCycles'+p, p];

    // Iniciamos el spin de ciclos
    spin.spinOn('C', p);

    if(typeof familyId == "undefined") {
        $('#fieldCycles'+p).remove();
        $('#fieldFamilies'+p).children('div').remove();
        $('#fieldFamilies'+p).append('<span class="ajaxError">' + msg + '</span>');
    } else {
        // Lanzo la peticion ajax con los ciclos
        ajax.callAjax('GET', '/json/cycles/'+familyId, "familyCycles", "addCycle", method_params);
    }
    p++;
    
    $('.addFamilyCycle').on('change', function(){
        if(p < 8) {
            validaciones.submitEnable($('#btnAddFamilyCycle'));
        }
    });

}); // $('#btnAddFamilyCycle').click

$('.family-cycle').on('change', function(e) {
    if (p < 8) {
        validaciones.submitEnable($('#btnAddFamilyCycle'));
    }

    // Almaceno el valor que ha tomado el select
    var familyId = e.target.value;
    var variable = e.target.id;

    if( variable.substring(0,6) == 'family' ){
        variable = variable.substring(6,7);
        
        // Borramos todo el campo
        $('#fieldCycles'+variable).children('div').remove();

        // Iniciamos el spin de ciclos
        spin.spinOn('C', variable, true, 'fieldCycles'+variable);

        // Preparo los parametros
        method_params = [null, 'fieldCycles'+variable, variable];

        // Lanzo la peticion ajax con los ciclos
        ajax.callAjax('GET', '/json/cycles/'+familyId, "familyCycles", "addCycle", method_params);
    }
}); // $('.family-cycle').on

$('#submit').on('click', function(e) {

    // Iniciamos el spin de ciclos
    spin.spinOn('S', '', true, 'submit');

})
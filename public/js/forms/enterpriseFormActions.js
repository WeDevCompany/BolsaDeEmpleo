var e = 1;
var msg = "Ha ocurrido un error en el servidor. Por favor póngase en contacto con un administrador";
var error = 0;

$('#btnAddEnterpriseResponsable').click(function(){
    // Desactivamos el boton de añadir
    validaciones.submitDisable($('#btnAddEnterpriseResponsable'));

    if(e < 10) {
        // Añado la estructura HTML del nuevo responsable
        enterpriseResponsable.addStructure("divAddResponsable", e);

        $('#btnRemoveEnterpriseResponsable').click( function(){
            $(this).parent().parent().remove();
            validaciones.submitEnable($('#btnAddEnterpriseResponsable'));
        });
    
        // Espero 5 segundos hasta volver a habilitar el botón.
        setTimeout(function(){
            e++;
            validaciones.submitEnable($('#btnAddEnterpriseResponsable'));
        }, 5000);
    } else {
        identificador = $('#btnAddEnterpriseResponsable');
        if(error < 1){
            identificador.after('<div id="error-prof-family" class="text-center"><span class="help-block"><strong>Ha alcanzado el número máximo de responsables permitidos.<strong></span></div>').fadeIn("slow");
        }
        error++;
    }

}); // $('#btnAddEnterpriseResponsable').click

$('#state').on('change', function(e) {

    // Almaceno el valor que ha tomado el select
    var stateId = e.target.value;
    var variable = e.target.id;

    if( variable.substring(0,5) == 'state' ){

        // Borramos todo el campo
        $('#restore-citie').children().remove();

        // Iniciamos el spin de ciclos
        //spin.spinOn('C', null, true, 'restore-citie');

        // Preparo los parametros
        method_params = [null, 'restore-citie'];

        // Lanzo la peticion ajax con los ciclos
        ajax.callAjax('GET', '/json/cities/'+stateId, "cities", "addCity", method_params);
    }
}); // $('#state').on
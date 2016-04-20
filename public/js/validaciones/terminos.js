
    // =============================
    // variables
    // =============================
    // obtenemos los terminos
    var terminos   = $('#terminos');
    var submit  = $('#submit');
    var mensaje = "Debe aceptar los terminos y condiciones de la aplicación";

    // modificaciones con el evento click
    terminos.on( 'click', function() {
    if(terminos.is(':checked') ){
        submit.addClass("waves-effect waves-light");
        submit.prop('disabled', false);
    } else if (terminos.val() != "acepto") {
        submit.removeClass("waves-effect waves-light");
        terminos.removeAttr('checked');
        submit.prop('disabled', true);
    } else {
        submit.removeClass("waves-effect  waves-light");
        terminos.removeAttr('checked');
        submit.prop('disabled', true);
    }
});

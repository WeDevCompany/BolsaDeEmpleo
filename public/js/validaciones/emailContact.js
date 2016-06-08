
// Cuando pierda el foco validamos el emailContact
$('#emailContact').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el emailContact
    var emailContact   = $('#emailContact');
    var submit  = $('#submit');
    var idError = 'error-emailContact';

    // =============================
    // lógica
    // =============================
    // Si el emailContact está vacio
    if(!validaciones.isEmpty(emailContact, idError, 'empty', 'email de contacto')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(emailContact, idError, 'short', 'email de contacto')) {    // Si el emailContact es muy corto
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(emailContact, idError, 'email', 'email de contacto', 'regexEmail')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        emailContact.text($.trim(emailContact.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #emailContact

// código para resetear los errores del emailContact
$('#emailContact').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-emailContact';
    var emailContact = $('#' + idError);
    var errorEmailContact = $('#' + idError);
    if(errorEmailContact){
        errorEmailContact.fadeOut("fast");
    }
    emailContact.removeClass('invalid');
})// resetear emailContact


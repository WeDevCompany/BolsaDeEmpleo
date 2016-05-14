// Cuando pierda el foco validamos el password_confirmation
$('#password_confirmation').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el password_confirmation
    var password_confirmation = $('#password_confirmation');
    var password = $('#password');
    var submit  = $('#submit');
    var idError = 'error-password_confirmation';

    // =============================
    // lógica
    // =============================
    // Si el password_confirmation está vacio
    if(!validaciones.isEmpty(password_confirmation, idError, 'empty', 'confirmar contraseña')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(password_confirmation, idError, 'short', 'confirmar contraseña')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectHighLength(password_confirmation, idError, 'long', 'confirmar contraseña')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(password_confirmation, idError, 'pass', 'contraseña', 'regexPass')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.validPasswordConfirmation(password_confirmation, idError, 'passConfirm', 'confirmar contraseña', password)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        password_confirmation.text($.trim(password_confirmation.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #password_confirmation

// código para resetear los errores del password_confirmation
$('#password_confirmation').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-password_confirmation';
    var password_confirmation = $('#' + idError);
    var errorPassword_confirmation = $('#' + idError);
    if(errorPassword_confirmation){
        errorPassword_confirmation.fadeOut("fast");
    }
    password_confirmation.removeClass('invalid');
})// resetear password_confirmation
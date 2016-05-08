// Cuando pierda el foco validamos el password
$('#password').blur(function(){
    // ==============================
    // variables
    // =============================
    // obtenemos el password
    var password = $('#password');
    var submit  = $('#submit');
    var idError = 'error-password';

    // Si el password está vacio
    if(!validaciones.isEmpty(password, idError, 'empty', 'contraseña')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(password, idError, 'short', 'contraseña')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        //return result;
    } else if (!validaciones.objectValid(password, idError, 'pass', 'contraseña', 'regexPass')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        password.text($.trim(password.val()));
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;

    }
})// Validar #password

// código para resetear los errores de la contraseña
$('#password').focus(function(){
    var idError = 'error-password';
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var password = $('#password');
    var errorPassword = $('#' + idError);

    if(errorPassword){
        errorPassword.fadeOut("fast");
    }
    password.removeClass('invalid');
})// resetear password


// Cuando pierda el foco validamos el email
$('#email').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el email
    var email   = $('#email');
    var submit  = $('#submit');

    // =============================
    // lógica
    // =============================
    // Si el email está vacio
    if(!validaciones.isEmpty(email, 'error-email', 'empty', 'email')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(email, 'error-email', 'short', 'email')) {    // Si el email es muy corto
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(email, 'error-email', 'email', 'email', 'regexEmail')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        email.text($.trim(email.val()));
        // invertimos el resultado
        result = (validaciones.submitDisable(submit)) ? true : false;
        return result;
    }
})// Validar #email

// código para resetear los errores del email
$('#email').focus(function(){
    var email = $('#email');
    var errorEmail = $('#error-email');
    if(errorEmail){
        errorEmail.fadeOut("fast");
    }
    email.removeClass('invalid');
})// resetear email



// Cuando pierda el foco validamos el phone
$('#phone').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el phone
    var phone   = $('#phone');
    var submit  = $('#submit');
    var idError = 'error-phone';

    // =============================
    // lógica
    // =============================
    // Si el phone está vacio
    if(!validaciones.isEmpty(phone, idError, 'empty', 'phone')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(phone, idError, 'short', 'phone', 9)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectHighLength(phone, idError, 'long', 'phone', 9)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(phone, idError, 'phone', 'phone', 'regexPhone')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        phone.text($.trim(phone.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #phone

// código para resetear los errores del phone
$('#phone').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-phone';
    var phone = $('#' + idError);
    var errorPhone = $('#' + idError);
    if(errorPhone){
        errorPhone.fadeOut("fast");
    }
    phone.removeClass('invalid');
})// resetear phone
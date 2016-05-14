
// Cuando pierda el foco validamos el address
$('#address').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el address
    var address   = $('#address');
    var submit  = $('#submit');
    var idError = 'error-address';

    // =============================
    // lógica
    // =============================
    // Si el address está vacio
    if(!validaciones.isEmpty(address, idError, 'empty', 'address')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(address, idError, 'short', 'address')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectHighLength(address, idError, 'long', 'address', 225)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(address, idError, 'address', 'address', 'regexAddress')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        address.text($.trim(address.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #address

// código para resetear los errores del address
$('#address').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-address';
    var address = $('#' + idError);
    var errorAddress = $('#' + idError);
    if(errorAddress){
        errorAddress.fadeOut("fast");
    }
    address.removeClass('invalid');
})// resetear address
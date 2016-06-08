
// Cuando pierda el foco validamos el nameWorkCenter
$('#nameWorkCenter').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el nameWorkCenter
    var nameWorkCenter   = $('#nameWorkCenter');
    var submit  = $('#submit');
    var idError = 'error-nameWorkCenter';

    // =============================
    // lógica
    // =============================
    // Si el nameWorkCenter está vacio
    if(!validaciones.isEmpty(nameWorkCenter, idError, 'empty', 'nameWorkCenter')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(nameWorkCenter, idError, 'short', 'nombre del centro', 2)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectHighLength(nameWorkCenter, idError, 'long', 'nombre del centro', 40)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(nameWorkCenter, idError, 'firstName', 'nombre del centro', 'regexName')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        nameWorkCenter.text($.trim(nameWorkCenter.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #nameWorkCenter

// código para resetear los errores del nameWorkCenter
$('#nameWorkCenter').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-nameWorkCenter';
    var nameWorkCenter = $('#' + idError);
    var errorNameWorkCenter = $('#' + idError);
    if(errorNameWorkCenter){
        errorNameWorkCenter.fadeOut("fast");
    }
    nameWorkCenter.removeClass('invalid');
})// resetear nameWorkCenter
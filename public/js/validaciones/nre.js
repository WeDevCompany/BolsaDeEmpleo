
// Cuando pierda el foco validamos el nre
$('#nre').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el nre
    var nre   = $('#nre');
    var submit  = $('#submit');
    var idError = 'error-nre';

    // =============================
    // lógica
    // =============================
    // Si el nre está vacio
    if(!validaciones.isEmpty(nre, idError, 'empty', 'nre')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(nre, idError, 'short', 'nre', 7)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectHighLength(nre, idError, 'long', 'nre', 7)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(nre, idError, 'nre', 'nre', 'regexNre')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        nre.text($.trim(nre.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #nre

// código para resetear los errores del nre
$('#nre').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-nre';
    var nre = $('#' + idError);
    var errorNre = $('#' + idError);
    if(errorNre){
        errorNre.fadeOut("fast");
    }
    nre.removeClass('invalid');
})// resetear nre
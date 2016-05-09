
// Cuando pierda el foco validamos el dni
$('#dni').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el dni
    var dni   = $('#dni');
    var submit  = $('#submit');
    var idError = 'error-dni';

    // =============================
    // lógica
    // =============================
    // Si el dni está vacio
    if(!validaciones.isEmpty(dni, idError, 'empty', 'dni')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(dni, idError, 'DNI', 'dni', 'regexIdent')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.validDNI(dni, idError, 'DNI', 'dni')) {    // Si el dni es muy corto
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        dni.text($.trim(dni.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #dni

// código para resetear los errores del dni
$('#dni').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-dni';
    var dni = $('#' + idError);
    var errorDni = $('#' + idError);
    if(errorDni){
        errorDni.fadeOut("fast");
    }
    dni.removeClass('invalid');
})// resetear dni
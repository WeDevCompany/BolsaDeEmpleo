
// Cuando pierda el foco validamos el lastName
$('#lastName').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el lastName
    var lastName   = $('#lastName');
    var submit  = $('#submit');
    var idError = 'error-lastName';

    // =============================
    // lógica
    // =============================
    // Si el lastName está vacio
    if(!validaciones.isEmpty(lastName, idError, 'empty', 'lastName')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(lastName, idError, 'short', 'lastName', 2)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectHighLength(lastName, idError, 'long', 'lastName', 75)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(lastName, idError, 'lastName', 'lastName', 'regexName')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        lastName.text($.trim(lastName.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #lastName

// código para resetear los errores del lastName
$('#lastName').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-lastName';
    var lastName = $('#' + idError);
    var errorLastName = $('#' + idError);
    if(errorLastName){
        errorLastName.fadeOut("fast");
    }
    lastName.removeClass('invalid');
})// resetear lastName
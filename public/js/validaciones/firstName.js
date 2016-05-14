
// Cuando pierda el foco validamos el firstName
$('#firstName').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el firstName
    var firstName   = $('#firstName');
    var submit  = $('#submit');
    var idError = 'error-firstName';

    // =============================
    // lógica
    // =============================
    // Si el firstName está vacio
    if(!validaciones.isEmpty(firstName, idError, 'empty', 'firstName')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(firstName, idError, 'short', 'firstName', 2)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectHighLength(firstName, idError, 'long', 'firstName', 40)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(firstName, idError, 'firstName', 'firstName', 'regexName')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        firstName.text($.trim(firstName.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #firstName

// código para resetear los errores del firstName
$('#firstName').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-firstName';
    var firstName = $('#' + idError);
    var errorFirstName = $('#' + idError);
    if(errorFirstName){
        errorFirstName.fadeOut("fast");
    }
    firstName.removeClass('invalid');
})// resetear firstName
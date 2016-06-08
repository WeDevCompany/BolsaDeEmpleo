
// Cuando pierda el foco validamos el address
$('#description').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el description
    var description   = $('#description');
    var submit  = $('#submit');
    var idError = 'error-description';

    // =============================
    // lógica
    // =============================
    // Si el description está vacio
    if(!validaciones.isEmpty(description, idError, 'empty', 'description')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(description, idError, 'short', 'description')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectHighLength(description, idError, 'long', 'description', 225)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(description, idError, 'description', 'description', 'regexAddress')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        description.text($.trim(description.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #description

// código para resetear los errores del description
$('#description').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-description';
    var description = $('#' + idError);
    var errorDescription = $('#' + idError);
    if(errorDescription){
        errorDescription.fadeOut("fast");
    }
    description.removeClass('invalid');
})// resetear description
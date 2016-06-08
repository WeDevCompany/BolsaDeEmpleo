
// Cuando pierda el foco validamos el name
$('#name').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el name
    var name   = $('#name');
    var submit  = $('#submit');
    var idError = 'error-name';

    // =============================
    // lógica
    // =============================
    // Si el name está vacio
    if(!validaciones.isEmpty(name, idError, 'empty', 'name')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectShortLength(name, idError, 'short', 'nombre', 2)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectHighLength(name, idError, 'long', 'nombre', 40)){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(name, idError, 'name', 'nombre', 'regexName')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        name.text($.trim(name.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #name

// código para resetear los errores del name
$('#name').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-name';
    var name = $('#' + idError);
    var errorName = $('#' + idError);
    if(errorName){
        errorName.fadeOut("fast");
    }
    name.removeClass('invalid');
})// resetear name
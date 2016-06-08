
// Cuando pierda el foco validamos el cif
$('#cif').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el cif
    var cif   = $('#cif');
    var submit  = $('#submit');
    var idError = 'error-cif';

    // =============================
    // lógica
    // =============================
    // Si el cif está vacio
    if(!validaciones.isEmpty(cif, idError, 'empty', 'cif')){
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.objectValid(cif, idError, 'CIF', 'cif', 'regexIdent')) {
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else if (!validaciones.validCIF(cif, idError, 'CIF', 'cif')) {    // Si el cif es muy corto
        result = (validaciones.submitDisable(submit)) ? false : true;
        return result;
    } else {
        // realizamos el saneamiento del campo
        cif.text($.trim(cif.val()));
        // invertimos el resultado
        result = (validaciones.submitEnable(submit)) ? true : false;
        return result;
    }
})// Validar #cif

// código para resetear los errores del cif
$('#cif').focus(function(){
    var submit = $('#submit');
    validaciones.submitDisable(submit);
    var idError = 'error-cif';
    var cif = $('#' + idError);
    var errorCif = $('#' + idError);
    if(errorCif){
        errorCif.fadeOut("fast");
    }
    cif.removeClass('invalid');
})// resetear cif
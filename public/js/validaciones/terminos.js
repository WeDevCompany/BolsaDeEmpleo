// validamos el estado de los terminos
$('#terminos').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el email
    var terminos   = $('#terminos');
    var submit  = $('#submit');
    // Si los terminos están vacio
    if(!terminosVacio(terminos)){
        submit.prop('disabled', true);
        return false;   // devuelvo false
    } else if (!terminosErroneos(terminos)) {    // Si el email es muy corto
        submit.prop('disabled', true);
        return false;   // devuelvo false
    } else {
        // realizamos el saneamiento del campo
        email.text($.trim(email.val()));
        submit.prop('disabled', false);
        return true;
    }
})// Validar #terminos

// código para resetear los errores del email
$('#terminos').focus(function(){
    var email = $('#terminos');
    var errorEmail = $('#error-terminos');
    if(errorEmail){
        errorEmail.fadeOut("fast");
    }
    email.removeClass('invalid');
})// resetear email


/**
 * Función que valida el valor que se le envia a PHP con los terminos
 * @param  {Object} email Email a validar
 * @return {Boolean}      True = si no hay error, False = Si hay error
 */
function terminosVacio(terminos){
    if($.trim(terminos.val()) === "" || email.val() === null){
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "Debe aceptar los terminos";
        // Añadimos justo después del campo email, el mensaje de error
        email.after( '<div id="error-terminos" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        email.addClass('invalid');
        return false;
    }
    return true;
}// emailVacio()


/**
 * Método que comprueba la longitud del email
 * @param  {Object} email Email a validar
 * @return {Boolean}      True =  si cumple la expresión, False =  si la incumple.
 */
function terminosErroneos(terminos){
    if (email.val().length < 6) {
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El email es demasiado corto";
        // Añadimos justo después del campo email, el mensaje de error
        email.after( '<div id="error-terminos" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        email.addClass('invalid');
        return false;
    }
    return true;
}// emailCorto()


/**
 * Método que comprueba si el email cumple el formato
 * @param  {Object} email Email a validar
 * @return {Boolean}      True =  si cumple la expresión, False =  si la incumple.
 */
function emailValido(email){
    // comproamos si el email es valido
    if (!validarEmail(email.val())) {
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El email no es valido";
        // Añadimos justo después del campo email, el mensaje de error
        email.after( '<div id="error-terminos" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        email.addClass('invalid');
        return false;
    }
    return true;
} // emailValido()

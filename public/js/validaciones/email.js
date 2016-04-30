
// Cuando pierda el foco validamos el email
$('#email').blur(function(){
    // =============================
    // variables
    // =============================
    // obtenemos el email
    var email   = $('#email');
    var submit  = $('#submit');
    // Si el email está vacio
    if(!emailVacio(email)){
        submit.removeClass("waves-effect waves-light");
        submit.prop('disabled', true);
        return false;   // devuelvo false
    } else if (!emailCorto(email)) {    // Si el email es muy corto
        submit.removeClass("waves-effect waves-light");
        submit.prop('disabled', true);
        return false;   // devuelvo false
    } else if (!emailValido(email)) {
        submit.removeClass("waves-effect waves-light");
        submit.prop('disabled', true);
        return false;   // devuelvo false
    } else {
        // realizamos el saneamiento del campo
        email.text($.trim(email.val()));
        submit.addClass("waves-effect  waves-light");
        submit.prop('disabled', false);
        return true;
    }
})// Validar #email

// código para resetear los errores del email
$('#email').focus(function(){
    var email = $('#email');
    var errorEmail = $('#error-email');
    if(errorEmail){
        errorEmail.fadeOut("fast");
    }
    email.removeClass('invalid');
})// resetear email


/**
 * función que comprueba si un email es valido o no
 * @param  {String} email Email a validar
 * @return {Boolean}      True =  si cumple la expresión, False =  si la incumple.
 */
function validarEmail(email){
    var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return regex.test(email);
}// validarEmail()

/**
 * Función que valida la longitud de un email
 * @param  {Object} email Email a validar
 * @return {Boolean}      True = si no hay error, False = Si hay error
 */
function emailVacio(email){
    if($.trim(email.val()) === "" || email.val() === null){
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El email esta vacio";
        // Añadimos justo después del campo email, el mensaje de error
        email.after( '<div id="error-email" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
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
function emailCorto(email){
    if (email.val().length < 6) {
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El email es demasiado corto";
        // Añadimos justo después del campo email, el mensaje de error
        email.after('<div id="error-email" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
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
        email.after( '<div id="error-email" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        email.addClass('invalid');
        return false;
    }
    return true;
} // emailValido()

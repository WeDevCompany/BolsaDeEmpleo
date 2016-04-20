// Cuando pierda el foco validamos el password
$('#password').blur(function(){
    // ==============================
    // variables
    // =============================
    // obtenemos el password
    var password = $('#password');
    var submit  = $('#submit');
    // Si el password está vacio
    if(!passwordVacio(password)){
        submit.removeClass("waves-effect waves-light");
        submit.prop('disabled', true);
        return false;   // devolvemos false
    } else if (!passwordCorto(password)) {
        submit.removeClass("waves-effect waves-light");
        submit.prop('disabled', true);
        return false;
    } else if (!passwordValido(password)) {
        submit.removeClass("waves-effect waves-light");
        submit.prop('disabled', true);
        return false;
    } else {
        submit.addClass("waves-effect waves-light");
        // realizamos el saneamiento del campo
        password.text($.trim(password.val()));
        submit.prop('disabled', false);
        return true;

    }
})// Validar #password

// código para resetear los errores de la contraseña
$('#password').focus(function(){
    var password = $('#password');
    var errorPassword = $('#error-password');
    if(errorPassword){
        errorPassword.fadeOut("fast");
    }
    password.removeClass('invalid');
})// resetear password

/**
 * Método que comprueba si la contraseña cumple o no el formato
 * @param  {String} str String a comprobar
 * @return {Boolean}    True = Si es valido False = Si no es valido
 */
function regexPass(str){
    var regex = "/^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z-_$@ñÑáéíóúÁÉÍÓÚÀÈÌÒÙäëïöüÄËÏÖÜ]{6,20}$/";
    return regex.test(str);
}// regexPass()

/**
 * Método que comprueba si un password está vacio
 * @param  {Object} password Password a comprobar
 * @return {Boolean}         True si no está vacío, False si está vacío
 */
function passwordVacio(password){
    if($.trim(password.val()) === "" || password.val() === null){
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El password esta vacio";
        // Añadimos justo después del campo password, el mensaje de error
        password.after( '<div id="error-password" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        password.addClass('invalid');
        return false;
    }
    return true;
}// passwordVacio()

/**
 * Método que comprueba si un password es demasiado corto o no
 * @param  {Object} password Password a comprobar
 * @return {Boolean}         True si no está vacío, False si está vacío
 */
function passwordCorto(password){
    if (password.val().length < 6) {
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El password es demasiado corto";
        // Añadimos justo después del campo password, el mensaje de error
        password.after( '<div id="error-password" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        password.addClass('invalid');
        return false;
    }
    return true;
}// passwordCorto()

/**
 * Método que comprueba si un password cumple o no el formato
 * @param  {Object} password Password a comprobar
 * @return {Boolean}         True si no está vacío, False si está vacío
 */
function passwordValido(password){
    if (!regexPass(password.val())) {
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El password puede contener, minúsculas, mayúsculas, números y caracteres especiales";
        // Añadimos justo después del campo password, el mensaje de error
        password.after( '<div id="error-password" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        password.addClass('invalid');
        return false;
    }
    return true;
}// passwordValido()

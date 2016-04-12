// Cuando pierda el foco validamos el password
$('#password').blur(function(){
    // ==============================
    // variables
    // =============================
    // obtenemos el password
    var password = $('#password');
    // Si el password está vacio
    if($.trim(password.val()) === "" || password.val() === null){
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El password esta vacio";
        // Añadimos justo después del campo password, el mensaje de error
        password.after( '<div id="error-password" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        password.addClass('invalid');
        return false;
    } else if (password.val().length < 6) {
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El password es demasiado corto";
        // Añadimos justo después del campo password, el mensaje de error
        password.after( '<div id="error-password" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        password.addClass('invalid');
        return false;
    } else if (!regexPass(password.val())) {
        // Escribimos el mensaje de error de forma que en el futuro
        // podamos modificarlo
        var mensaje = "El password es no cumple el formato mínimo";
        // Añadimos justo después del campo password, el mensaje de error
        password.after( '<div id="error-password" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
        password.addClass('invalid');
        return false;
    } else {
        // realizamos el saneamiento del campo
        password.value = $.trim(password.val());
        password.value = password.text(password.val());
        password.removeClass('invalid');
    }
})// Validar #password

// código para resetear los errores de la contraseña
$('#password').focus(function(){
    var password = $('#password');
    var errorPassword = $('#error-password');
    if(errorPassword){
        errorPassword.fadeOut("fast");
    }
})// resetear password

/**
 * Método que comprueba si la contraseña cumple o no el formato
 * @param  {String} str String a comprobar
 * @return {Boolean}    True = Si es valido False = Si no es valido
 */
function regexPass(str){
    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/;
    return regex.test(str);
}

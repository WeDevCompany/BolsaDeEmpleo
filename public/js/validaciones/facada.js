/**
 * Este archivo es una fachada desarrollada para
 * automatizar la validación de cualquier formulario
 * mediante la inclusión de la validación de los campos
 * que contiene dicho formulario.
 *
 * Esto favorece a la reutilización del código
 * optimización de la carga de la web y el mantenimiento
 * del código
 *
 * @author Emmanuel Valverde Ramos
 *
 */
$(document).ready(function(){
    // Comprobamos en
    // que formulario nos encontramos
    // y dependiendo de eso
    // cargamos una validaciones u otras
    if ((login = $('#login-form'))) {
        // Cargamos las validaciones del email
        login.after('<script src="/js/validaciones/email.js" charset="utf-8"></script>');
        // Cargamos las validaciones de la contraseña
        login.after('<script src="/js/validaciones/password.js" charset="utf-8"></script>');

        // Declaramos las variables del formulario
        email = $('#email');
        password = $('#password');

        // Deshabilitamos el botón si los campos estan vacios
        $("#submit").mouseover(function(){
            if($.trim(email.val()) === "" || $.trim(email.val()) === null || $.trim(password.val()) === "" || $.trim(password.val()) === null ){
                $("#submit").prop('disabled', true);
            }
        });

        // Deshabilitamos el botón de login si el email da error
        $("#submit").mouseover(function(){
            if((email = $('#email'))){
                if (email.hasClass('invalid')) {
                    $("#submit").prop('disabled', true);
                }
            }
        });

        // Deshabilitamos el botón de login si el password da error
        $("#submit").mouseover(function(){
            if((password = $('#password'))){
                if (password.hasClass('invalid')) {
                    $("#submit").prop('disabled', true);
                }
            }
        });
    }// Comprobación de si el formulario es el de login

    // Comprobamos si el formulario
    // es el formulario de send-email-reset
    if((form = $('#send-email-reset'))){
        // Cargamos las validaciones del email
        form.after('<script src="/js/validaciones/email.js" charset="utf-8"></script>');
        // Deshabilitamos el botón si los campos estan vacios
        $("#submit").mouseover(function(){
            if($.trim(email.val()) === "" || $.trim(email.val()) === null){
                $("#submit").prop('disabled', true);
            }
        });
    }
})

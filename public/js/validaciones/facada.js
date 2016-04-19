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
            }else {
                $("#submit").prop('disabled', false);
            }
        });
    }

    // Comprobamos si el formulario
    // es el formulario de registro de profesores
    if((teacherRegisterForm = $('#teacher-register-form'))) {

        // Script Drag and Drop Personalizado
        teacherRegisterForm.after('<script src="/js/dragDrop.js" charset="utf-8"></script>');

        // Script de chosen (select multiple)
        teacherRegisterForm.after('<script src="/plugin/chosen/chosen.jquery.js"></script>');

        // Script personalizado de chosen
        teacherRegisterForm.after('<script src="/plugin/chosen/chosenConfig.js"></script>');

    }

    // Comprobamos si el formulario
    // es el formulario de registro de alumnos
    if((studentRegisterForm = $('#student-register-form'))) {

        // Script Drag and Drop Personalizado
        studentRegisterForm.after('<script src="/js/dragDrop.js" charset="utf-8"></script>');

        // Script de chosen (select multiple)
        studentRegisterForm.after('<script src="/plugin/chosen/chosen.jquery.js"></script>');

        // Script personalizado de chosen
        studentRegisterForm.after('<script src="/plugin/chosen/chosenConfig.js"></script>');

    }

    // Comprobamos si el formulario
    // es el formulario de registro de empresas
    if((enterpriseRegisterForm = $('#enterprise-register-form'))) {
        
        // Script Drag and Drop Personalizado
        enterpriseRegisterForm.after('<script src="/js/dragDrop.js" charset="utf-8"></script>');

        // Script de chosen (select multiple)
        enterpriseRegisterForm.after('<script src="/plugin/chosen/chosen.jquery.js"></script>');

        // Script personalizado de chosen
        enterpriseRegisterForm.after('<script src="/plugin/chosen/chosenConfig.js"></script>');

    }
})

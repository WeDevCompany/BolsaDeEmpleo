
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

    //Deshabilitamos el botón de submit de forma
    //que no se pueda enviar un formulario vacio
    submit = $('#submit');
    submit.prop('disabled', true);
    // quitamos efectos que generan un bug
    submit.removeClass("waves-effect  waves-light");


    // Declaración de variables
    // =================================
    email = $('#email');
    password = $('#password');
    terminos = $('#termnos');

    // Declaración de formularios
    // ==============================
    login = $('#login-form');
    form = $('#send-email-reset');
    teacherRegisterForm = $('#teacher-register-form');
    studentRegisterForm = $('#student-register-form');
    enterpriseRegisterForm = $('#enterprise-register-form');


    // Comprobamos en
    // que formulario nos encontramos
    // y dependiendo de eso
    // cargamos una validaciones u otras
    if (login.length) {

        // Cargamos el archivo que se encarga únicamente de cargar los cambios
        login.after('<script src="/js/validaciones/includes/loginForm.js" charset="utf-8"></script>');

    }// Comprobación de si el formulario es el de login

    // Comprobamos si el formulario
    // es el formulario de send-email-reset
    if(form.length){
        // Cargamos las validaciones del email
        form.after('<script src="/js/validaciones/email.js" charset="utf-8"></script>');
    }

    // Comprobamos si el formulario
    // es el formulario de registro de profesores
    if(teacherRegisterForm.length) {

        // Script Drag and Drop Personalizado
        teacherRegisterForm.after('<script src="/js/dragDrop.js" charset="utf-8"></script>');

        // Script de chosen (select multiple)
        teacherRegisterForm.after('<script src="/plugin/chosen/chosen.jquery.js"></script>');

        // Script personalizado de chosen
        teacherRegisterForm.after('<script src="/js/validaciones/terminos.js"></script>');

    }

    // Comprobamos si el formulario
    // es el formulario de registro de alumnos
    if(studentRegisterForm.length) {
        // Script Drag and Drop Personalizado
        studentRegisterForm.after('<script src="/js/dragDrop.js" charset="utf-8"></script>');

        // Script de chosen (select multiple)
        studentRegisterForm.after('<script src="/plugin/chosen/chosen.jquery.js"></script>');

        // Script personalizado de chosen
        studentRegisterForm.after('<script src="/plugin/chosen/chosenConfig.js"></script>');

        // Script personalizado de chosen
        studentRegisterForm.after('<script src="/plugin/chosen/chosenConfig.js"></script>');

        // Script personalizado para aceptar terminos
        studentRegisterForm.after('<script src="/js/validaciones/includes/studentRegisterForm.js" charset="utf-8"></script>');

    }

    // Comprobamos si el formulario
    // es el formulario de registro de empresas
    if(enterpriseRegisterForm.length) {

        // Script Drag and Drop Personalizado
        enterpriseRegisterForm.after('<script src="/js/dragDrop.js" charset="utf-8"></script>');

        // Script de chosen (select multiple)
        enterpriseRegisterForm.after('<script src="/plugin/chosen/chosen.jquery.js"></script>');

        // Script personalizado de chosen
        enterpriseRegisterForm.after('<script src="/plugin/chosen/chosenConfig.js"></script>');

    }

})// document.ready

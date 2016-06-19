$(document).ready(function () {

    // initialize tooltipster on text input elements
    $('#login-form input[type="text"]').tooltipster({
        trigger: 'custom',
        onlyOne: false,
        position: 'right',
        animation: 'fade'
    });
    $('#login-form input[type="password"]').tooltipster({
        trigger: 'custom',
        onlyOne: false,
        position: 'right',
        animation: 'fade'
    });

    $('#login-form select').tooltipster({
        trigger: 'custom',
        onlyOne: false,
        position: 'right',
        animation: 'fade'
    });
    $('#login-form input[type="email"]').tooltipster({
        trigger: 'custom',
        onlyOne: false,
        position: 'right',
        animation: 'fade'
    });

    // initialize validate plugin on the form
    $('#login-form').validate({
        lang: 'es',
        errorPlacement: function (error, element) {
            $(element).tooltipster('update', $(error).text());
            $(element).tooltipster('show');
        },
        success: function (label, element) {
            $(element).tooltipster('hide');
        },
        rules: {
            email: {
                required: true,
                minlength: 6,
                email:true
            },
            password: {
                required: true,
                pwcheck: true,
            }
        },
        submitHandler: function (form) { // for demo
            //alert('valid form');
            return true;
        },
        messages: {
            password: {
                pwcheck: "La contraseña debe tener como mínimo minúsculas, mayúsculas, y números"
            }
        }

    });

    $.validator.addMethod("pwcheck", function(value, element) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d).+$/.test(value);
    });

    $.validator.addMethod("pwcheck", function(value, element) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d).+$/.test(value);
    });

});
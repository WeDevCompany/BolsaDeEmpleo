$(document).ready(function () {

    // initialize validate plugin on the form
    $('#teacher-register-form').validate({
        lang: 'es',
        errorPlacement: function (error, element) {
            $(element).attr('data-original-title', $(error).text())
                      .tooltip('show');
        },
        success: function (label, element) {
            $(element).tooltip('hide');
        },
        rules: {
            firstName: {
                required: true,
                minlength: 2
            },
            lastName: {
                required: true,
                minlength: 5
            },
            phone: {
                required: true,
                minlength: 9,
                maxlength: 9,
                number:true
            },
            dni: {
                required: true,
                minlength: 9,
                maxlength: 9,
                nifES: true
            },
            'family[]':{
                required:true
            },
            password: {
                required: true,
                pwcheck: true,
            },
            password_confirmation: {
                equalTo: "#password",
                pwcheck: true
            }
        },
        submitHandler: function (form) { // for demo
            //alert('valid form');
            return true;
        },
        messages: {
            password: {
                pwcheck: "La contraseña debe tener como mínimo minúsculas, mayúsculas, y números"
            },
            password_confirmation: {
                pwcheck: "La contraseña debe tener como mínimo minúsculas, mayúsculas, y números"
            }

        }

    });

    $.validator.addMethod("pwcheck", function(value, element) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d).+$/.test(value);
    });

});
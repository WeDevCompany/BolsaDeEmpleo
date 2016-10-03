$(document).ready(function () {

    // initialize validate plugin on the form
    $('#enterprise-register-form').validate({
        lang: 'es',
        errorPlacement: function (error, element) {
            $(element).attr('data-original-title', $(error).text())
                      .tooltip('show');
        },
        success: function (label, element) {
            $(element).tooltip('hide');
        },
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            cif: {
                required: true,
                minlength: 9,
                maxlength:9,
                cifES: true
            },
            description: {
                required: true,
                minlength: 10,
                maxlength: 200
            },
            'firstName[]': {
                minlength: 2,
                required:true
            },
            'dni[]': {
                minlength: 9,
                maxlength:9,
                nifES: true,
                required:true
            },
            'lastName[]': {
                minlength: 2,
                required:true
            },
            nameWorkCenter: {
                minlength: 2,
                required:true
            },
            emailContact: {
                email: true,
                required: true
            },
            phone1: {
                required: true,
                minlength: 9,
                maxlength: 9,
                number:true
            },
            address: {
                required: true,
                minlength: 3,
                nifES: true
            },
            password: {
                required: true,
                pwcheck: true,
            },
            password_confirmation: {
                equalTo: "#password",
                pwcheck: true
            },
            email: {
                email: true,
                required: true,
                minlength: 6
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
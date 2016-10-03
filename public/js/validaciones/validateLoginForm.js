$(document).ready(function () {

    // initialize validate plugin on the form
    $('#login-form').validate({
        lang: 'es',
        errorPlacement: function (error, element) {
            $(element).attr('data-original-title', $(error).text())
                      .tooltip('show');
        },
        success: function (label, element) {
            $(element).tooltip('hide');
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


});
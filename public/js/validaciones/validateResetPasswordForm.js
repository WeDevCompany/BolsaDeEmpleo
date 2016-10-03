$(document).ready(function () {

    // initialize validate plugin on the form
    $('#send-email-reset').validate({
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
        },
        submitHandler: function (form) { // for demo
            //alert('valid form');
            return true;
        }

    });

});
submit.prop('disabled', false);
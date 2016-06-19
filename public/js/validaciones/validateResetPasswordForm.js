$(document).ready(function () {

    // initialize tooltipster on text input elements
    $('#send-email-reset input[type="text"]').tooltipster({
        trigger: 'custom',
        onlyOne: false,
        position: 'right',
        animation: 'fade'
    });
    $('#send-email-reset input[type="password"]').tooltipster({
        trigger: 'custom',
        onlyOne: false,
        position: 'right',
        animation: 'fade'
    });

    $('#send-email-reset select').tooltipster({
        trigger: 'custom',
        onlyOne: false,
        position: 'right',
        animation: 'fade'
    });
    $('#send-email-reset input[type="email"]').tooltipster({
        trigger: 'custom',
        onlyOne: false,
        position: 'right',
        animation: 'fade'
    });

    // initialize validate plugin on the form
    $('#send-email-reset').validate({
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
        },
        submitHandler: function (form) { // for demo
            //alert('valid form');
            return true;
        }

    });

});
submit.prop('disabled', false);
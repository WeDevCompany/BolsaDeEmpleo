    $('.datepicker').pickadate({


        // Cada vez que hace render datapicker hay que habilitar los botones
        onRender: function() {
            $('.picker__close').prop("disabled", false);
            $('.picker__clear').prop("disabled", false);
            $('.picker__today').prop("disabled", false);
          },

        // Formato en el que recibimos la fecha
        formatSubmit: 'yyyy-mm-dd'

    })

    // Cuando se haga click en el campo input se abra el datepicker
    $('#picker').on('click', function(){
        $('div.picker').addClass('picker--opened');

    });
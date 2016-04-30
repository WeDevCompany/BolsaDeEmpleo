    $('.datepicker').pickadate({


        // Cada vez que hace render datapicker hay que habilitar los botones
        onRender: function() {

            // Habilitamos los siguientes campos por problemas con la libreria
            $('.picker__close').prop("disabled", false);
            $('.picker__today').prop("disabled", false);
            $('.picker__select--month').prop("disabled", false);
            $('.picker__select--year').prop("disabled", false);

            // Ocultamos el clear del datepiker por problemas con el label
            $('.picker__clear').addClass('hidden');
          },


        selectMonths: true, // Creates a dropdown to control month

        // Formato en el que recibimos la fecha
        formatSubmit: 'yyyy-mm-dd',
        hiddenName: true,

        // Rango de años que se mostraran
        selectYears: 1000,
        min: [1916,01,01],
        max: true,
        darktheme: true,
    });

    // Cuando se haga click en el campo input se abra el datepicker
    $('.datepicker').on('click', function(){
        $('div.picker').addClass('picker--opened');

    });

    // Cuando se haga click en el campo input se abra el datepicker
    $('.labelpicker').on('click', function(){
        $('div.picker').addClass('picker--opened');

    });

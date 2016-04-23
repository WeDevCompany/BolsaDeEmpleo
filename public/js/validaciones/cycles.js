$("#select-chosen").chosen({max_selected_options: 5}).change(function(){
    var resultados = $('.result-selected');
    var years = $("#years");
    var longitudYears = $("#years section").length;
    var longitudResultados = resultados.length;
    var valor;
    var i;
    resultados.each(function(indice) {
        // obtenemos el campo
        // que se ha seleccionado
        campo = resultados.get(indice);
        valor = $(campo).text();
        $("#select-chosen option").each(function(indice){
            valorReal = $(this).text();
            if(valorReal === valor){
                i = $(this).val();
            } else {
                // Mostrar un error en la web
                // porque no se sabe que elemento se intenta añadir
                // bloquear botón de submit
                // return false
            }
        });
    });
    //console.log("El indice es: " + i + " El Valor es: " + valor);
    console.log("Los resultados son: " + longitudResultados + " Los años son: " + longitudYears);
    if((longitudResultados > longitudYears) && (!(longitudYears >= longitudResultados))){
        years.append('<section class="row" data="years-from-to[' + longitudYears + ']">' +
            '<div class="input-field col-md-6">' +
                '<label for="yearFrom[' + i + ']">A&ntilde;o de inicio</label>' +
                '<input name="yearFrom[' + i + ']" type="text" id="yearFrom[' + i + ']">' +
            '</div>' +
            '<div class="input-field col-md-6">' +
                '<label for="yearTo[' + i + ']">A&ntilde;o de fin</label>' +
                '<input name="yearTo[' + i + ']" type="text" id="yearTo[' + i + ']">' +
            '</div>' +
        '</section>');
    } else {
        var ultimoYear = $("#years section");
        console.log(ultimoYear);
        ultimoYear.remove();
        //years.get(longitudYears).fadeOut("fast");
    }
});

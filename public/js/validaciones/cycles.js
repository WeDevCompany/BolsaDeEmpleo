$("#select-chosen").chosen({max_selected_options: 5}).change(function(){
    var resultados = $('.result-selected');
    var resultadosNoSelecionados = $('.active-result');
    var years = $("#years");
    var longitudYears = $("#years fieldset").length;
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
        years.append('<fieldset id="' + i + '"> ' +
            '<legend style="width:auto;">' + valor + '</legend>' + '<section">' +
            '<div class="input-field col-md-6">' +
                '<label for="yearFrom[' + i + ']">A&ntilde;o de inicio</label>' +
                '<input name="yearFrom[' + i + ']" type="text" id="yearFrom[' + i + ']">' +
            '</div>' +
            '<div class="input-field col-md-6">' +
                '<label for="yearTo[' + i + ']">A&ntilde;o de fin</label>' +
                '<input name="yearTo[' + i + ']" type="text" id="yearTo[' + i + ']">' +
            '</div>' +
        '</section>'+ '</fieldset>');
    } else {
        var fieldset = $("#years fieldset");
        fieldset.each(function(index2, field){
            // obtenemos el id de un elemento creado
            // en el drom
            aux = $(field).attr('id');
            $(".chosen-select").each(function(index3, noSelected){
                valorNoselected = $(noSelected[index3]).val();
                console.log("El valor de aux es: " + aux + " El valor de noSelected es: " + valorNoselected);
                if(valorNoselected !== aux){
                    $(noSelected).remove();
                } else {
                    // Mostrar un error en la web
                    // porque no se sabe que elemento se intenta añadir
                    // bloquear botón de submit
                    // return false
                }
            });
        });
        console.log($(".chosen-select").val());
        //years.get(longitudYears).fadeOut("fast");
    }
});

var i = 1;
var texto = "Ciclo - ";
$('#btnAddFamilyCycle').click(function(){
    // obtenemos el div tras el cual
    // colocaremos los futuros ciclos
    var divAddFamilyCycle = $('#divAddFamilyCycle');
    alert("CLICK");
    divAddFamilyCycle.after('<fieldset id="' + texto + i + '"> ' +
        '<legend style="width:auto;">' + texto + i + '</legend>' + '<section">' +
        '<div class="input-field col-md-6">' +
            '<label for="yearFrom[' + texto + i + ']">A&ntilde;o de inicio</label>' +
            '<input name="yearFrom[' + texto + i + ']" type="text" id="yearFrom[' + texto + i + ']">' +
        '</div>' +
        '<div class="input-field col-md-6">' +
            '<label for="yearTo[' + texto + i + ']">A&ntilde;o de fin</label>' +
            '<input name="yearTo[' + texto + i + ']" type="text" id="yearTo[' + texto + i + ']">' +
        '</div>' +
    '</section>'+ '</fieldset>').fadeIn("slow");
    i++;
});

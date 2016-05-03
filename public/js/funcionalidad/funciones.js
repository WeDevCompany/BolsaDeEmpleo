/**
 * Clase Funciones, esta clase contendrá todas las funciones que necesitaremos
 * para darle funcionalidad a nuestra aplicación
 */

    var funciones = {

        generarSelectYears: function(id, end) {
            var anyo = (new Date).getFullYear();
        	var select = '<select class="form-control" name="' + id + '" id="' + id + '">';
        	for (k = end; k <= anyo; k++)
            {
                select += '<option value="' + k + '">' + k + '</option>';
            }
        	select += "</select>";
        	return select;
        },
    };

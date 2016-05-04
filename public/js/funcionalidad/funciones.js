/**
 * Clase Funciones, esta clase contendrá todas las funciones que necesitaremos
 * para darle funcionalidad a nuestra aplicación
 */

    var funciones = {
        /**
         * Función que generá un campo select como string y lo devuelve
         *
         * @param  String id        ID que queremos que tenga nuestro select
         * @param  Integer start    Desde que año quieres que empiece
         * @return String  select   Select ya formado
         */
        generarSelectYears: function(id, start) {
            var anyo = (new Date).getFullYear();
        	var select = '<select class="form-control" name="' + id + '" id="' + id + '">';
        	for (k = start; k <= anyo; k++)
            {
                select += '<option value="' + k + '">' + k + '</option>';
            }
        	select += "</select>";
        	return select;
        },
    };

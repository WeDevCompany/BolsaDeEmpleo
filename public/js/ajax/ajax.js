/**
 * Clase ajax, esta clase contendrá un objeto de tipo Ajax encargado de realizar 
 * todas las peticiones necesarias al servidor.
 * @author Eduardo López Pardo
 * @version  11/05/16
 */

    // Objeto de Ajax
    var ajax = {

        // Envia la petición ajax
        callAjax : function(method, url, func, variable) {
            $.ajax({
                // la URL para la petición
                url : url,
             
                // Asignamos el metodo de la peticion (GET, POST...)
                type : method,
             
                // Establecemos su asincronia
                async : true,

                // Establecemos el tipo de respuesta
                dataType : 'json',
             
                // Marcamos como true el uso de la memoria caché
                cache : true,

                // Establece el valor de this = ajax
                context : ajax,

                // Función en caso de éxito
                success : function(json, status, response) {
                    success = json;
                }, // success
             
                // Función en caso de error
                error : function(response, status) {
                    success = false;
                }, // error
             
                // código a ejecutar sin importar si la petición falló o no
                complete : function(response, status) {
                    if (success !== false) {
                        // Compruebo la respuesta del servidor
                        check = this.getResponse(response, status);
                        //console.log(success);
                        //console.log(status);
                    } else {
                        alert('liada colega');
                    } 
                } // complete
            });

        },

        // Comprueba la respuesta del servidor
        getResponse : function(response, status) {
            if(response.status == "200" && response.statusText == "OK" && status == "success") {
                return true;
            } else {
                return false;
            }
        }, // getResponse


        addCycle : function (submit) {
            return true;
        },

        addFamily : function (submit) {
            return true;
        },
    };
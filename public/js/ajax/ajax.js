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
                success : function(json, responseText, status) {
                    aux = this.getResponse(responseText, status);
                    console.log(responseText);
                    console.log(status);
                    console.log(variable);
                },
             
                // Función en caso de error
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
             
                // código a ejecutar sin importar si la petición falló o no
                complete : function(xhr, status) {
                    alert('Petición realizada');
                }
            });

        },

        // Compruebo la respuesta del servidor
        getResponse : function(responseText, status) {
            console.log(responseText);
                    console.log(status);
            if(status === "200" && responseText === "OK") {
                return true;
            } else {
                return false;
            }
        }, // getResponse


        addCycle : function (submit) {
            submit.addClass("waves-effect waves-light");
            submit.prop('disabled', false);
            return true;
        },

        addFamily : function (submit) {
            submit.addClass("waves-effect waves-light");
            submit.prop('disabled', false);
            return true;
        },
    };
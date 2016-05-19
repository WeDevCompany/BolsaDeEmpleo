/**
 * Clase ajax, esta clase contendrá un objeto de tipo Ajax encargado de realizar 
 * todas las peticiones necesarias al servidor y de devolver false o el objeto json.
 * @author Eduardo López Pardo
 * @version  11/05/16
 */

    // Objeto de Ajax
    var ajax = {

        // Envia la petición ajax
        callAjax : function(method, url, object, func, method_params) {
            // Si cualquier variable no esta definida, mostraré un error por consola.
            if (typeof method == "undefined" || typeof url == "undefined"
             || typeof object == "undefined" || typeof func == "undefined") {
                return false;
            } else {
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
                        // Si cualquier variable no esta definida, success sera false.
                        if (typeof json == "undefined" || typeof status == "undefined"
                         || typeof response == "undefined") {
                            return false;
                        } else {
                            success = json;
                        }
                    }, // success
                 
                    // Función en caso de error
                    error : function(response, status) {
                        success = false;
                    }, // error
                 
                    // código a ejecutar sin importar si la petición falló o no
                    complete : function(response, status) {
                        // Si la variable no esta definida, devuelvo false.
                        if (typeof response == "undefined" || typeof status == "undefined"
                         || typeof success == "undefined"){
                            return false;
                        } else {
                            if (success !== false) {
                                // Compruebo la respuesta del servidor
                                check = this.getResponse(response, status);

                                // Si la respuesta es correcta llamo al metodo al que le paso los datos recibidos
                                if (check == true) {
                                    if (method_params) {
                                        method_params[0] = success;
                                        window[object][func].apply(this, method_params);
                                    } else {
                                        window[object][func](success);
                                    }
                                } else {
                                    return false;
                                }
                            } else {
                                return false;
                            }
                        }
                    } // complete
                }); // ajax
            }
        }, // callAjax

        // Comprueba la respuesta del servidor
        getResponse : function(response, status) {
            if ((response.status == "200" && response.statusText == "OK" && status == "success")) {
                return true;
            } else if (typeof response == "undefined" || typeof status == "undefined") {
                return false;
            } else {
                return false;
            }
        }, // getResponse
    }; // ajax
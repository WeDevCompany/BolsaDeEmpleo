/**
 * Clase ajax, esta clase contendrá un objeto de tipo Ajax encargado de realizar 
 * todas las peticiones necesarias al servidor.
 * @author Eduardo López Pardo
 * @version  11/05/16
 */

    // Declaracion de variables
    var p = 0;
    var targetC = document.getElementById('spinnerC'+p);
    var spinnerC = new Spinner(optsC).spin(targetC);
    var estadoCycles;
    var estadoFamily;
    var fechaInicio;
    var fechaFin;

    // Objeto de Ajax
    var ajax = {

        // Envia la petición ajax
        callAjax : function(method, url, func, identifier) {
            // Si cualquier variable no esta definida, mostraré un error por consola.
            if (typeof method == "undefined" || typeof url == "undefined"
             || typeof func == "undefined" || typeof identifier == "undefined") {
                $('#spinnerC'+p).remove();
                spinnerC.stop();
                $(identifier).append('<span class="ajaxError">Se ha producido un error, intente registrarse más tarde.</span>');
                console.log("No ha podido llevarse a cabo la petición");
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
                            success = false;
                        } else {
                            success = json;
                        }
                    }, // success
                 
                    // Función en caso de error
                    error : function(response, status) {
                        success = false;
                        error = true;
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
                                params = [success, identifier];

                                // Si la respuesta es correcta llamo al metodo
                                if (check == true) {
                                    response = this[func].apply(null, params);
                                    if (response == false) {
                                        error = true;
                                    }
                                }
                            }
                            
                            if (error == true) {
                                $('#spinnerC'+p).remove();
                                spinnerC.stop();
                                $(identifier).children('div[class = "row"]').remove();
                                $(identifier).append('<span class="ajaxError">Se ha producido un error, intente registrarse más tarde.</span>');
                                console.log("Se ha producido un error realizando su petición");
                            }
                        }
                    } // complete
                }); // callAjax
            }
        },

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


        addCycle : function (json, identifier) {
            // Si la variable variable no esta definida, devuelvo false.
            if (typeof json == "undefined" || typeof identifier == "undefined"
             || estadoFamily == false){
                return false;
            } else {
                // Añado la estructura HTML
                $(identifier).append(
                    '<div class="row">' +
                        '<div class="input-field col-md-12">' +
                            '<label for="cycles" style="margin-top: -2.5em">Ciclo actual</label>' +
                            '<select name="cycles[' + p + ']" class="form-control" id="cycles' + p + '"></select>' +
                            '<section>' +
                                '<div class="input-field col-md-6"  style="padding-top: 5px">' +
                                    '<label for="yearFrom[' + p + ']" style="margin-top: -2em">A&ntilde;o de inicio</label>' +
                                    funciones.generarSelectYears('yearFrom[' + p + ']', 1990) +
                                '</div>' +
                                '<div class="input-field col-md-6">' +
                                    '<label for="yearTo[' + p + ']" style="margin-top: -2em">A&ntilde;o de fin</label>' +
                                    funciones.generarSelectYears('yearTo[' + p + ']', 1990) +
                                '</div>' +
                            '</section>' +
                        '</div>' +
                    '</div>');

                // Vacío el campo select.
                $('#cycles'+p).empty();
                
                // Declaro las variables
                basico = true;
                medio = true;
                superior = true;

                // Por cada resultado del json repartimos los option
                result = $.each(json, function(index, cycleObj){
                    console.log(index);
                    console.log(cycleObj);
                    if (typeof index == "undefined" || typeof cycleObj == "undefined") {
                        estadoCycles = false;
                    } else {
                        estadoCycles = true;
                        if ( cycleObj.level === "Básico") {
                            if( basico === true ) {
                                $('#cycles'+p).append('<optgroup label="Grados básicos" id="basico'+p+'"></optgroup>');
                                basico = false;
                            }
                            $('#basico'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                        } else if ( cycleObj.level === "Medio" ) {
                            if ( medio === true ) {
                                $('#cycles'+p).append('<optgroup label="Grados medios" id="medio'+p+'"></optgroup>');
                                medio = false;
                            }
                            $('#medio'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                        } else if ( cycleObj.level === "Superior" ) {
                            if ( superior === true ) {
                                $('#cycles'+p).append('<optgroup label="Grados superiores" id="superior'+p+'"></optgroup>');
                                superior = false;
                            }
                            $('#superior'+p).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                        }
                    }
                });

                if (result == '') {
                    return false;
                } else {                
                    if (estadoCycles == true) {
                        // si existen los campos habilitamos el botón
                        // porque no podemos acceder a un elemento generado
                        // ya que no sabemos cuando va a ser generado dicho elemento
                        fechaInicio = $('#yearFrom[' + p + ']');
                        fechaFin = $('#yearTo[' + p +']');

                        if(fechaInicio && fechaFin){
                            $('#btnAddFamilyCycle').addClass("waves-effect  waves-light");
                            $('#btnAddFamilyCycle').prop('disabled', false);
                            $('#spinnerC').remove();
                            spinnerC.stop();
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }
            }
        }, // addCycle

        addFamily : function (identifier) {
            
        }, // addFamily

    }; // ajax
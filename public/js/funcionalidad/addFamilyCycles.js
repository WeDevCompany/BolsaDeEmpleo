/**
 * Clase familyCycles, esta clase contendrá un objeto de tipo familyCycles encargado de 
 * añadir todas las estructuras necesarias de estos dos campos a cualquier formulario.
 * @author Eduardo López Pardo
 * @version  15/05/16
 */

    // Declaracion de variables
    var estadoCycles;
    var estadoFamilies;
    var fechaInicio;
    var fechaFin;
    var texto = "Ciclo - ";
    var error = 0;

    // Objeto de familyCycles
    var familyCycles = {
        addFamily : function (json, identifier, variable) {
            // Si la variable variable no esta definida, devuelvo false.
            if (typeof json == "undefined" || typeof identifier == "undefined"
             || typeof variable == "undefined"){
                return false;
            } else {
                // Iniciamos el sppinner de profFamilie
                targetF = document.getElementById('spinnerF'+variable);
                spinnerF = new Spinner(optsF).spin(targetF);

                // Añado la estructura HTML
                $(identifier).append(
                    '<div class="form-group">' +
                        '<div class="row">' +
                            '<div class="input-field col-md-12">' +
                               '<label for="family'+ variable + '" class="hidden" style="margin-top: -2.5em">Familia profesional perteneciente al ciclo</label>' +
                                '<select name="family" class="family form-control hidden" id="family'+ variable + '"></select>' +
                            '</div>' +
                        '</div>' +    
                    '</div>'
                );

                // Por cada familia añadimos un option al select de familias profesionales
                result = $.each(json, function(index, familyObj){
                    if (typeof index == "undefined" || typeof familyObj == "undefined") {
                        estadoFamilies = false;
                    } else {
                        estadoFamilies = true;
                        $('#family'+variable).append('<option value="' + familyObj.id + '">' + familyObj.familia + '</option>');
                    }
                });

                // Paramos el primer spin y borramos el div que lo contenia.
                $('#spinnerF'+variable).remove();
                spinnerF.stop();
                
                // Mostramos el select con las familias profesionales ya listo.
                $('#family'+variable).removeClass('hidden');
                $('label[for="family'+variable+'"]').removeClass('hidden');

                if (result == '') {
                    return false;
                } else {                
                    return true;
                }
            }  
        }, // addFamily

        addCycle : function (json, identifier, variable) {
            // Si la variable variable no esta definida, devuelvo false.
            if (typeof json == "undefined" || typeof identifier == "undefined"
             || typeof variable == "undefined" || estadoFamilies == false){
                return false;
            } else {
                // Añado la estructura HTML del ciclo
                $(identifier).append(
                    '<div class="form-group">' +
                        '<div class="row">' +
                            '<div class="input-field col-md-12">' +
                                '<label for="cycles" style="margin-top: -2.5em">Ciclo actual</label>' +
                                '<select name="cycles[' + variable + ']" class="form-control" id="cycles' + variable + '"></select>' +
                                '<section id="fieldDates' + variable + '"></section>' +
                            '</div>' +
                        '</div>' +
                    '</div>'
                );
                
                // Declaro las variables
                basico = true;
                medio = true;
                superior = true;

                // Por cada resultado del json repartimos los option
                result = $.each(json, function(index, cycleObj){
                    if (typeof index == "undefined" || typeof cycleObj == "undefined") {
                        estadoCycles = false;
                    } else {
                        estadoCycles = true;
                        if ( cycleObj.level === "Básico") {
                            if( basico === true ) {
                                $('#cycles'+variable).append('<optgroup label="Grados básicos" id="basico'+variable+'"></optgroup>');
                                basico = false;
                            }
                            $('#basico'+variable).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                        } else if ( cycleObj.level === "Medio" ) {
                            if ( medio === true ) {
                                $('#cycles'+variable).append('<optgroup label="Grados medios" id="medio'+variable+'"></optgroup>');
                                medio = false;
                            }
                            $('#medio'+variable).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                        } else if ( cycleObj.level === "Superior" ) {
                            if ( superior === true ) {
                                $('#cycles'+variable).append('<optgroup label="Grados superiores" id="superior'+variable+'"></optgroup>');
                                superior = false;
                            }
                            $('#superior'+variable).append('<option value="' + cycleObj.id + '">' + '[' + cycleObj.level + '] ' + cycleObj.name + '</option>');
                        }
                    }
                });

                if (result == '') {
                    return false;
                } else {
                    return true;
                }
            }
        }, // addCycle

        /*test : function () {
            console.log('guay');
        },*/

        addDate : function (identifier, variable) {
            // Si la variable variable no esta definida, devuelvo false.
            if (typeof identifier == "undefined" || typeof variable == "undefined"
             || estadoCycles == false){
                return false;
            } else {
                // Añado la estructura HTML de las fechas
                $(identifier).append(
                    '<div class="input-field col-md-6"  style="padding-top: 5px">' +
                        '<label for="yearFrom[' + variable + ']" style="margin-top: -2em">A&ntilde;o de inicio</label>' +
                        funciones.generarSelectYears('yearFrom[' + variable + ']', 1990) +
                    '</div>' +
                    '<div class="input-field col-md-6">' +
                        '<label for="yearTo[' + variable + ']" style="margin-top: -2em">A&ntilde;o de fin</label>' +
                        funciones.generarSelectYears('yearTo[' + variable + ']', 1990) +
                    '</div>'
                );

                // Compruebo si se han añadido bien
                fechaInicio = $('#yearFrom[' + variable + ']');
                fechaFin = $('#yearTo[' + variable +']');

                if(fechaInicio && fechaFin){
                    return true;
                } else {
                    return false;
                }
            }
        }, // addDate

        addStructure : function (identificador, variable) {
            // Si la variable variable no esta definida, devuelvo false.
            if (typeof variable == "undefined"){
                return false;
            } else if (variable < 8) {
                // Almacenamos su valor en una variable para el after
                identificador = $(identificador);

                // Añadimos la nueva estructura
                identificador.after(
                '<div id="newFamilyCycle' + variable + '">' +
                    '<fieldset id="fieldFamilies' + variable + '">' + 
                        '<div id="spinnerF' + variable + '" class="spinnerF"></div>' +
                        '<legend style="width: auto;">Familia Profesional</legend>' +
                    '</fieldset>' +
                    '<fieldset class="addFamilyCycle" id="fieldCycles' + variable + '">' +
                        '<div id="spinnerC' + variable + '" class="spinnerc"></div>' +
                        '<legend style="width:auto;">' + texto + variable + '</legend>' +
                    '</fieldset>' +
                    '<div class="text-center">' +
                        '<button type="button" value="'+ variable +'" id="btnRemoveFamilyCycle" class="btn-danger btn btn-login-media waves-effect waves-light text-center">' +
                            '<div class="show-responsive">' +
                                '<i class="fa fa fa-times" aria-hidden="true"></i>' +
                            '</div>' +
                            '<div class="hidden-media">' +
                                '<i class="fa fa-btn fa fa-times"></i> <span class="hidden-media">Eliminar ciclo</span>' +
                            '</div>' +
                        '</button>' +
                    '</div>' +
                '</div>').fadeIn("slow");

                if ( $('#newFamilyCycle'+variable).length == 0) {
                    return false;
                } else {
                    return true;
                }
            } else {
                // Si se ha alcanzado el limite de 7 ciclos mostramos un error
                mensaje = "Has excedido el máximo número de ciclos si quieres añadir más hazlo una vez registrado/a";
                if(error < 1){
                    identificador.after('<div id="error-prof-family" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>').fadeIn("slow");
                }
                error++;
                return false;
            }
        }, // addAllStructure
        
        newFamilyCycle : function() {

        }

    }; // familyCycles
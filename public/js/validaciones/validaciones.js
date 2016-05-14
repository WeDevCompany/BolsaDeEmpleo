/**
 * Clase validaciones, esta clase contendrá todas las funciones que necesitaremos
 * para darle funcionalidad a las validaciones a nuestra aplicación, no solo eso, sino
 * que nos proporcionará de una capa de abstracción del lenguaje JS de forma que nos sea
 * más simple el uso de estas funciones
 * @author Emmanuel Valverde Ramos
 * @version  04/05/16
 */

    // Objeto de validaciones
    var validaciones = {

        /**
         * typeOfErrors objeto que contiene todos los tipos de error
         * @type Object
         */
        typeOfErrors : {
            'empty'      : "El campo :campo: está vacio",
            'short'      : "El campo :campo: es demasiado corto",
            'long'       : "El campo :campo: es demasiado largo",
            'format'     : "El campo :campo: no cumple el formato correcto",
            'equal'      : "El campo :campo: no es correcto",
            'select'     : "El campo :campo: ha de ser seleccionado",
            'check'      : "El campo :campo: ha de ser marcado",
            'DNI'        : "El campo :campo: no es un DNI/NIE valido",
            'CIF'        : "El campo :campo: no es un CIF valido",
            'number'     : "El campo :campo: debe ser un número",
            'alpha'      : "El campo :campo: debe contener números y letras",
            'alphaC'     : "El campo :campo: debe contener números, letras mínusculas y letras mayúsculas",
            'special'    : "El campo :campo: debe contener caracteres especiales",
            '!special'   : "El campo :campo: no debe contener caracteres especiales",
            'year'       : "El campo :campo: debe ser un año valido",
            'date'       : "El campo :campo: debe ser una fecha valida",
            'month'      : "El campo :campo: debe ser un mes valido",
            'day'        : "El campo :campo: debe ser un día valido",
            'firstName'  : "El campo :campo: debe ser un nombre valido",
            'lastName'   : "El campo :campo: debe ser un apellido valido",
            'address'    : "El campo :campo: debe ser una dirección válida",
            // dateEq = dateEqual
            'dateEq'     : "El campo :campo: no se debe repetir",
            'phone'      : "El campo :campo: debe ser un número de teléfono valido",
            'img'        : "El campo :campo: debe ser una imagen",
            'pdf'        : "El campo :campo: debe ser un pdf",
            'email'      : "El campo :campo: debe ser un email valido",
            'pass'       : "El campo :campo: debe contener mayúsculas, minúsculas y números como mínimo",
            'passConfirm': "Las contraseñas deben de ser iguales",
        },

        /**
         * setTypeError método através del cual se generan los textos de error
         * @param String error Error a selecionar
         * @param String campo El nombre del campo
         */
        setTypeError : function(error, campo) {
            // obtenemos un array con el contenido del objeto
            // typeOfErrors de forma que podamos tratar esta copia
            // a tiempo real (tiempo de ejecución) según donde estemos
            errorType = $.extend( {}, this.typeOfErrors );
            if(errorType[error].length > 0){
                return errorType[error].replace(":campo:", campo);
            }
            return false;
        },
        // ---------------------------------
        // Regex
        // ---------------------------------
        funcionRegex : function (nombreRegex, objectVal) {
            switch(nombreRegex){
                case 'regexEmail':

                    var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
                        /*var regexObjce = new RegExp(nameRegex);*/
                        return regex.test(objectVal);

                case 'regexPass':
                        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d).+$/;
                        return regex.test(objectVal);

                case 'regexPhone':
                        // valida que el número de telefono sean simplemente
                        // 9 digitos
                        var regex = /^[0-9]{9}$/;
                        return regex.test(objectVal);

                case 'regexDomainHTTP':
                        //valida los nombres de dominio (con HTTP)
                        var regex = /(.*?)[^w{3}.]([a-zA-Z0-9]([a-zA-Z0-9-]{0,65}[a-zA-Z0-9])?.)+[a-zA-Z]{2,6}/igm;
                        return regex.test(objectVal);

                case 'regexDomain':
                        //valida nombres de dominio (www. solo)
                        var regex = /[^w{3}.]([a-zA-Z0-9]([a-zA-Z0-9-]{0,65}[a-zA-Z0-9])?.)+[a-zA-Z]{2,6}/igm;
                        return regex.test(objectVal);

                case 'regexDate':
                        // Regex para validar la fecha
                        // en formato 12-05-1992
                        var regex = /^(19|20)\d\d-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])/;
                        return regex.test(objectVal);
                case 'regexYear':
                        // Regex que valida el año
                        // Cuidado, porque no comprueba la fecha actul
                        // puede salir una fecha por encima
                        var regex = /(19|20|21)\d\d$/;
                        return regex.test(objectVal);
                case 'regexIdent':
                        // Regex para validar DNI, NIE y CIF
                        var regex = /((^[a-zA-Z]{1}[0-9]{7}[a-zA-Z0-9]{1}$|^[tT]{1}[a-zA-Z0-9]{8}$)|^[0-9]{8}[a-zA-Z]{1}$)/;
                        return regex.test(objectVal);
                case 'regexName':
                        // Regex para validar nombre y apellidos
                        var regex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(\s)?[A-Za-zÁÉÍÓÚáéíóúÑñ]{1,40}$/;
                        return regex.test(objectVal);
                case 'regexAddress':
                        // Regex para validar la direccion
                        var regex = /^[0-9A-Za-zÁÉÍÓÚáéíóúÑñ º]{6,225}$/;
                        return regex.test(objectVal);
                default:
                    return false;
            }
        },

        // ---------------------------------
        // Mostrar errores
        // ---------------------------------

        /**
         * errorObject método que generá los errores para todos
         * los campos del formulario, independientemente del campo.
         * este método recive 3 parametros, estos son:
         * [tiipos de error: error-email, error-LoQueSea]
         * @param  Object   object   Object de tipo DOM
         * @param  String   id       String con el id del error
         * @param  String   error    Error a selecionar, o mensaje dependiendo
         *                           de si el error es personalizado o no
         * @param  Boolean  costume Campo que se enviará para mostrar
         *                          errores personalizados
         * @return boolean  false   Si este mensaje aparece debe parar
         *                          cualquier operación
         *                           que se esté realizando en el momento
         */
        errorObject : function(object, id, error, campo) {
            object.after( '<div id="' + id + '" class="text-center"><span class="help-block"><strong>'+ this.setTypeError(error, campo) +'<strong></span></div>' ).fadeIn("slow");
            object.addClass('invalid');
            return false;
        },


        /**
         * costumeErrorObject método que generá los errores para todos
         * los campos del formulario de forma cosumizada,
         * independientemente del campo.
         * @param  Object   object   Object de tipo DOM
         * @param  String   id       String con el id del error
         * @param  String   content  Mensaje concretro
         * @return boolean  false    Si este mensaje aparece debe parar
         *                           cualquier operación
         *                           que se esté realizando en el momento
         */
        costumeErrorObject : function(object, id, content) {
            object.after( '<div id="' + id + '" class="text-center"><span class="help-block"><strong>'+ content +'<strong></span></div>' ).fadeIn("slow");
            object.addClass('invalid');
            return false;
        },


        // ---------------------------------
        // Validaciones en general
        // ---------------------------------

        /**
         * isEmpty método que comprobará si un objeto está vacio
         * los campos del formulario, independientemente del campo.
         * este método recive 3 parametros, estos son:
         * [tiipos de error: error-email, error-LoQueSea]
         * @param  Object   object          Object de tipo DOM
         * @param  String   id              String con el id del error
         * @param  String error             Error a selecionar
         * @param  String campo             El nombre del campo
         * @return boolean  true | false    false = si el objeto está vacio
         *                                  true = si el objeto esxiste
         */
        isEmpty : function(object, id, error, campo) {
            if($.trim(object.val()) === "" || object.val() === null){
                return this.errorObject(object, id, error, campo);
            }
            return true;
        },

        /**
         * objectShortLength método que comprueba que un objeto cumpla
         * con la longitud mínima requerida (su valor)
         * [tiipos de error: error-email, error-LoQueSea]
         * @param  Object  object       Objeto DOM del cual queremos conocer si cumple la longitud
         * @param  String  id           ID del error
         * @param  String error        Error a selecionar
         * @param  String campo        El nombre del campo
         * @param  Integer length       Longitud minínima
         * @return Boolean true | false        [description]
         */
        objectShortLength : function (object, id, error, campo, length) {
            // si la longitud no se le pasa como parametro utilizará
            // por defecto el 6
            if(length === null || $.trim(length) === ""){
                length = 6;
            }
            if (object.val().length < length) {
                return this.errorObject(object, id, error, campo);
            }
            return true;
        },

        /**
         * objectHLength método que comprueba que un objeto cumpla
         * con la longitud maxíma permitida (su valor)
         * [tiipos de error: error-email, error-LoQueSea]
         * @param  Object  object       Objeto DOM del cual queremos conocer si cumple la
         *                              longitud
         * @param  String  id           ID del error
         * @param  String  error        Error a selecionar
         * @param  String  campo        El nombre del campo
         * @param  Integer length       Longitud minínima
         * @return Boolean true | false False = si hay error | True = sino hay error
         */
        objectHighLength : function (object, id, error, campo, length) {
            // si la longitud no se le pasa como parametro utilizará
            // por defecto el 6
            if(length === null || $.trim(length) === ""){
                length = 20;
            }

            if (object.val().length > length) {
                return this.errorObject(object, id, error, campo);
            }
            return true;
        },

        /**
         * objectValid método que comprueba mediante la llamada a otra función
         * si esta comple el formato adecuado o no
         * @param  Object   object          Objeto a validar
         * @param  Integer  id              ID a darle al error en caso de que exista
         * @param  String   error           Error a selecionar
         * @param  String   campo           El nombre del campo
         * @param  Object   funcionRegex    Función a la que llamar como callBack
         * @return Booblean false | true    False = En caso de que haya error
         *                                  True = En caso de que no haya error
         */
        objectValid : function (object, id, error, campo, funcionRegex){
            // comproamos si el email es valido
            var callbacks = null;
            if (!this.funcionRegex(funcionRegex,object.val())) {
               return this.errorObject(object, id, error, campo);
            }
            return true;
        },

        /**
         * objectIsChecked método que comprueba si un campo checkbox ha sido checked o no
         * @param  Object   object          Objeto DOM (El checkbox)
         * @return Boolean  true | false    True = si ha sido checked
         *                                  False = si no ha sido checked
         */
        objectIsChecked : function (object) {
            if ( object.is(':checked') ){
                return true;
            }
            return false;
        },

        /**
         * objectValueEqual método que comprueba si el valor de un objeto es igual
         * que el especificado por parametro [UTILIZADO PARA COMPROBAR CAMPOS CHECKBOX]
         * @param  Object   object          Objeto DOM a comprobar
         * @param  String   content         String a comparar con el valor
         * @return Boolean  true | false    True = si el contenido es igual
         *                                  False = si el contenido es distinto
         */
        objectValueEqual : function(object, content){
            if (object.val() === content){
                return true;
            }
            return false;
        },

        /**
         * unchecked método que deselecciona un cambo checkbox
         * @param  Object   object  Objeto DOM (checkbox) que desmarcar
         * @return Boolean  true    True comprobación de que se ha ejecutado correctamente
         */
        unchecked : function (object) {
            object.removeAttr('checked');
            return true;
        },

        // Validaciones genericas que faltan
        // Comparación de contraseñas
        // Númericos,
        // Alphanumericos,
        // Caracteres especiales,
        // Años,
        // Fechas,
        // Comaparción de fechas - Completas
        // Comparación de años - Solo años
        // Validaciones por ajax
        //  GET - Ruta + Array de parametros
        //  POST - Ruta + Array de parametros
        // Telefonos
        // DNI, NIE, CIF
        // Imagenes
        // PDF

        // ---------------------------------
        // Validaciones con particularidades
        // ---------------------------------
        /**
         * validDate Método que comprueba una fecha y dice si es valida o no
         * @param  Object   object  Objeto DOM que será comprobado
         * @return Boolean | error  Se devolverá true si la fecha es valida sino, se devolverá el error
         */
        validDate : function (object) {
            var result = object.val().split('-');
            // La fecha no cumple el formato de fecha
            if (result.length != 3) {
                var str = "La fecha no cumple el formato YYYY-MM-DD";
                return this.costumeErrorObject(object, id, str);
            }
            // Una vez comprobado que la fecha esta bien formada
            // la dividimos en trozos para validarla individualmente
            var year    = parseInt(result[0]);
            var month   = parseInt(result[1]);
            var day     = parseInt(result[2]);

            // Validación del día
            if (day < 1 || day > 31) {
                var str = "El día debe estar comprendido entre el 01 y el 31";
                return this.costumeErrorObject(object, id, str);
            }
            // validación de los meses
            if (month < 1 || month > 12) {
                var str = "El mes debe estar comprendido entre el 01 y el 12";
                return this.costumeErrorObject(object, id, str);
            }
            //validación de los meses sin 31 días
            if ((month==4 || month==6 || month==9 || month==11) && day==31) {
                var str = "El mes no tiene 31 días";
                return this.costumeErrorObject(object, id, str);
            }
            // febrero de los años bisiestos
            if (month == 2) { // bisiesto
                var bisiesto = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
                if (dia > 29 || (dia==29 && !bisiesto)) {
                    var str = "El año es bisiesto, por lo tanto Febrero no tiene 31 días";
                    return this.costumeErrorObject(object, id, str);
                }
            }
            // la fecha es valida
            return true;
        },

        /**
         * compareDates Método que compará 2 fechas y las valida en caso de encontrar
         * la segunda null lo permitirá puesto el alumno puede estar cursando ese ciclo
         * @param  String date1 YYYY-MM-DD
         * @param  String date2 YYYY-MM-DD
         * @return Boolean | error  Se devolverá true si la fecha es valida sino, se devolverá el error
         */
        compareDates : function (date1, date2) {
            // Validamos las fechas teniendo en cuenta que el dateTo puede ser empty
            if ( error = (this.validDate(date1) !== true) ) {
                return error;
            }else if ( date2 !== null ) {
                if(error = (this.validDate(date2) !== true)){
                   return error;
               }
            }
            return true;
        },

        validCycleYear: function(object, id, error, campo, yearToObject){

            // Variables
            objectVal = object.val();
            yearToObjectVal = yearToObject.val();
            console.log(objectVal);

            if (objectVal >= 1990 && objectVal < yearToObjectVal) {

                return true;
            }

            return this.errorObject(object, id, error, campo);

        },

        /**
         * validPasswordConfirmation Metodo que comprueba si ambas contraseñas son iguales
         * @param  Object   object          Password a validar
         * @param  Integer  id              ID a darle al error en caso de que exista
         * @param  String   error           Error a selecionar
         * @param  String   campo           El nombre del campo
         * @param  Object   passObject      Password a comparar
         * @return Booblean false | true    False = En caso de que haya error
         *                                  True = En caso de que no haya error
         */
        validPasswordConfirmation: function(object, id, error, campo, passObject){

            // Variables
            objectVal = object.val();
            passObjectVal = passObject.val();

            // Comprobamos que son iguales las contraseñas
            if(objectVal == passObjectVal){
                return true;
            }

            return this.errorObject(object, id, error, campo);
        },

        /**
        * validDNI Método que comprueba si el dni/nie es válido
        * @param  Object   object          Objeto a validar
        * @param  Integer  id              ID a darle al error en caso de que exista
        * @param  String   error           Error a selecionar
        * @param  String   campo           El nombre del campo
        * @return Booblean false | true    False = En caso de que haya error
        *                                  True = En caso de que no haya error
        */
        validDNI: function(object, id, error, campo){

            // Variables
            objectVal = object.val();

            // Validacion del NIE
            if (/^[xyzXYZ]{1}/.test(objectVal) && objectVal[8] == "TRWAGMYFPDXBNJZSQVHLCKE".charAt(objectVal.replace( 'X', '0' ).replace( 'Y', '1' ).replace( 'Z', '2' ).substring( 0, 8 ) % 23).toUpperCase()) {

                return true;

            }

            // Validacion del DNI
            if ("TRWAGMYFPDXBNJZSQVHLCKE".charAt(objectVal.substring( 8, 0 ) % 23 ) == objectVal.charAt(8).toUpperCase()) {

                return true;

            }

            return this.errorObject(object, id, error, campo);

        },

        /**
        * validCIF Método que comprueba si el cif es válido
        * @param  Object   object          Objeto a validar
        * @param  Integer  id              ID a darle al error en caso de que exista
        * @param  String   error           Error a selecionar
        * @param  String   campo           El nombre del campo
        * @return Booblean false | true    False = En caso de que haya error
        *                                  True = En caso de que no haya error
        */
        ValidCIF: function (object, id, error, campo){

            // Declaracion de variables
            var sum, num = [], controlDigit;

            // Obtenemos el valor y convertimos las letras a mayusculas
            objectVal = object.val().toUpperCase();

            // Extraemos los numeros que forman el cif, los separamos y los metemos en un array
            for (var i = 0; i < 9; i++) {
                num[i] = parseInt(objectVal.charAt(i), 10);
            }

            // Algoritmo del cif
            sum = num[2] + num[4] + num[6];

            for (var count = 1; count < 8; count += 2) {

                var tmp = (2 * num[count]).toString(),
                secondDigit = tmp.charAt(1);

                sum += parseInt(tmp.charAt(0), 10) + (secondDigit == '' ? 0 : parseInt(secondDigit, 10));
            }

            // Validamos el cif
            if (/^[ABCDEFGHJNPQRSUVW]{1}/.test(objectVal)) {

                sum += '';
                controlDigit = 10 - parseInt(sum.charAt(sum.length - 1), 10);
                objectVal += controlDigit;

                if (objectVal.charAt(8).toString() == String.fromCharCode(64 + controlDigit) || num[8].toString() == objectVal.charAt(objectVal.length - 1)){

                    return true;
                }

            }

        },

        // ---------------------------------
        // Limpiezas de seguridad
        // ---------------------------------

        /**
         * submitDisable Método que deshabilita el botón de submit tanto en fallo
         * como cuando se considere necesario, esto es debido a que
         * es interesante que no pueda enviar un formulario hasta que cumpla
         * con los requisitos pedidos, también se le retiran ciertos estilos conflictivos
         * con el deshabilitado del botón
         * @param  Object  submit Botón a deshabilitar
         * @return Boolean true   Confirmación de que la operación se ha ejecutado
         *                        correctamente
         */
        submitDisable : function (submit) {
            submit.removeClass("waves-effect waves-light");
            submit.prop('disabled', true);
            return true;
        },

        /**
         * submitEnable Método que habilita el botón de submit
         * @param  Object  submit Botón a deshabilitar
         * @return Boolean true   Confirmación de que la operación se ha ejecutado
         *                        correctamente
         */
        submitEnable : function (submit) {
            submit.addClass("waves-effect waves-light");
            submit.prop('disabled', false);
            return true;
        },

    };

    // Objeto de saneamiento
    // Necesitamos por lo menos una limpieza del valor de un objeto DOM
    // De forma que se pueda utilizar en las validaciones y no tengamos que repetir
    // le saneamiento.
    var saneamiento = {
        justNumbers : function(val){
            return val = val.replace(/[^0-9]/g, '');
        },

        //cambia los saltos de linea por <br>
        newLineToBr : function(str){
            return str.replace(/(rn|[rn])/g, '<br>');
        },
    };
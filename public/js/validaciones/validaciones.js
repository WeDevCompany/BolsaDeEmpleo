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
        // ---------------------------------
        // Regex
        // ---------------------------------

        /**
         * función que comprueba si un email es valido o no [Regex]
         * @param  String email Email a validar
         * @return Boolean      True =  si cumple la expresión, False =  si la incumple.
         */
        regexEmail : function(email) {
            var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            return regex.test(email);
        },

        /**
         * Método que comprueba si la contraseña cumple o no el formato
         * @param  {String} pass String a comprobar
         * @return {Boolean}     True = Si es valido False = Si no es valido
         */
        regexPass : function (pass){
            var regex = "/^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z-_$@ñÑáéíóúÁÉÍÓÚÀÈÌÒÙäëïöüÄËÏÖÜ]{6,20}$/";
            return regex.test(pass);
        }

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
         * @param  String   mensaje  Mensaje a mostrarle al usuario
         * @return boolean false     Si este mensaje aparece debe parar cualquier operación
         *                           que se esté realizando en el momento
         */
        errorObject : function(object, id, mensaje) {
            object.after( '<div id="' + id + '" class="text-center"><span class="help-block"><strong>'+ mensaje +'<strong></span></div>' ).fadeIn("slow");
            object.addClass('invalid');
            return false;
        },

        // ---------------------------------
        // Validaciones en general
        // ---------------------------------

        /**
         * objectVacio método que comprobará si un objeto está vacio
         * los campos del formulario, independientemente del campo.
         * este método recive 3 parametros, estos son:
         * [tiipos de error: error-email, error-LoQueSea]
         * @param  Object   object          Object de tipo DOM
         * @param  String   id              String con el id del error
         * @param  String   mensaje         Mensaje a mostrarle al usuario
         * @return boolean  true | false    false = si el objeto está vacio
         *                                  true = si el objeto esxiste
         */
        objectVacio : function(object, id, mensaje) {
            if($.trim(object.val()) === "" || object.val() === null){
                return this.errorObject(object, id, mensaje);
            }
            return true;
        },

        /**
         * objectShortLength método que comprueba que un objeto cumpla
         * con la longitud mínima requerida (su valor)
         * [tiipos de error: error-email, error-LoQueSea]
         * @param  Object  object       Objeto DOM del cual queremos conocer si cumple la longitud
         * @param  String  id           ID del error
         * @param  String  mensaje      Mensaje a mostrar al usuario
         * @param  Integer length       Longitud minínima
         * @return Boolean true | false        [description]
         */
        objectShortLength : function (object, id, mensaje, length) {
            // si la longitud no se le pasa como parametro utilizará
            // por defecto el 6
            if(length === null || $.trim(length) === ""){
                length = 6;
            }

            if (object.val().length < length) {
                return this.errorObject(object, id, mensaje);
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
         * @param  String  mensaje      Mensaje a mostrar al usuario
         * @param  Integer length       Longitud minínima
         * @return Boolean true | false False = si hay error | True = sino hay error
         */
        objectHighLength : function (object, id, mensaje, length) {
            // si la longitud no se le pasa como parametro utilizará
            // por defecto el 6
            if(length === null || $.trim(length) === ""){
                length = 20;
            }

            if (object.val().length < length) {
                return this.errorObject(object, id, mensaje);
            }
            return true;
        },

        /**
         * objectValid método que comprueba mediante la llamada a otra función
         * si esta comple el formato adecuado o no
         * @param  Object   object          Objeto a validar
         * @param  Integer  id              ID a darle al error en caso de que exista
         * @param  String   mensaje         Mensaje de error en caso de que exista
         * @param  Object   funcionRegex    Función a la que llamar como callBack
         * @return Booblean false | true    False = En caso de que haya error
         *                                  True = En caso de que no haya error
         */
        objectValid : function (object, id, mensaje, funcionRegex){
            // comproamos si el email es valido
            if (!this.funcionRegex(object.val())) {
               return this.errorObject(object, id, mensaje);
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
        }

        // ---------------------------------
        // Validaciones con particularidades
        // ---------------------------------


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

    // Ejemplo de uso de las validaciones
    // Esto se puede usar desde cualquier otro script
    // siempre y cuando este script este cargado
    // ya que es una variable accesible globalmente gracias al "var"
    console.log(validaciones.validarEmail('evrtrabajo@gmail.com'));

    // Objeto de saneamiento
    var saneamiento = {

    }

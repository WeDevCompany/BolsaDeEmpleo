/*
 * Clase enterpriseResponsable, esta clase contendrá un objeto de tipo enterpriseResponsable encargado de
 * añadir nuevos responsables de centros de trabajo.
 * @version  28/05/16
 */

    // Declaracion de variables
    var workCenter;
    var legend = "Responsable";

    // Objeto de enterpriseResponsable
    var enterpriseResponsable = {

        addStructure : function (identificador, variable) {
            // Si la variable variable no esta definida, devuelvo false.
            if (typeof identificador == "undefined" || typeof variable == "undefined"){
                return false;
            } else {
                // Almacenamos su valor en una variable para el after
                identificador = $('#'+identificador);

                // Añadimos la nueva estructura
                identificador.after(
                '<div class="newResponsable">' +
                    '<fieldset id="fieldResponsable' + variable + '">' +
                        '<legend style="width: auto;">' + legend + '</legend>' +
                        '<div class="form-group">' +
                            '<div class="row">' +
                                '<div class="input-field col-md-8">' +
                                    '<i class="material-icons prefix">perm_identity</i>' +
                                    '<label for="firstName[' + variable + ']">Nombre</label>' +
                                    '<input type="text" name="firstName[' + variable + ']" id="firstName[' + variable + ']" class="form-control"/>' +
                                '</div>' +
                                '<div class="input-field col-md-4">' +
                                    '<i class="material-icons prefix">fingerprint</i>' +
                                    '<label for="dni[' + variable + ']">DNI</label>' +
                                    '<input type="text" name="dni[' + variable + ']" id="dni[' + variable + ']" class="form-control"/>' +
                                '</div>' +
                            '</div>' +
                        '</div>'+
                        '<div class="form-group">' +
                            '<div class="row">' +
                                '<div class="input-field col-md-12">' +
                                    '<i class="material-icons prefix">perm_identity</i>' +
                                    '<label for="lastName[' + variable + ']">Apellidos</label>' +
                                    '<input type="text" name="lastName[' + variable + ']" id="lastName[' + variable + ']" class="form-control"/>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="text-center">' +
                            '<button type="button" value="'+ variable +'" id="btnRemoveEnterpriseResponsable" class="btn-danger btn btn-login-media waves-effect waves-light text-center">' +
                                '<div class="show-responsive">' +
                                    '<i class="fa fa fa-times" aria-hidden="true"></i>' +
                                '</div>' +
                                '<div class="hidden-media">' +
                                    '<i class="fa fa-btn fa fa-times"></i> <span class="hidden-media">Eliminar ciclo</span>' +
                                '</div>' +
                            '</button>' +
                        '</div>' +
                    '</fieldset>' +
                '</div>').fadeIn("slow");

                if ( $('#fieldResponsable'+variable).length == 0) {
                    return false;
                } else {
                    return true;
                }
            }
        }, // addStructure

    }; // enterpriseResponsable
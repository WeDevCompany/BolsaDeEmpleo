    $(document).ready(function () {

        // Boton de eliminar de la tabla
        $('.btn-delete').click(function (e) {

            // Nos situamos en el tr padre del boton y obtenemos el id
            row = $(this).parents('tr');
            id = row.data('id');

            // Creamos un atributo y le damos un valor para el modal
            $('#softDeletes').data('id', id);

            

        }); 

        $('#softDeletes').click(function (e) {

            // Obtenemos el id que hemos asignado antes
            id = $('#softDeletes').data('id');

            // Obtenemos la url del formulario y reemplazamos el valor por el id
            // para asi recibirlo en el servidor
            form = $('#form-delete');
            url = form.attr('action').replace('USER_ID',id);
            data = form.serialize();

            // Obtenemos el tr padre anterior
            $('tr[data-id=' + id + ']').fadeOut();
            

            // Hacemos la peticion
            $.post(url, data, function(result){


                if (result.status === 'fail') {
                    toastr["error"](result.message);
                    $('tr[data-id=' + result.id + ']').show();

                } else if (result.status === 'success') {
                    toastr["success"](result.message);

                }

            }).fail(function(){

                toastr["error"]('Ha ocurrido un error durante el borrado, por favor intentelo mas tarde');
                row.show();

            });

            

        });

    });


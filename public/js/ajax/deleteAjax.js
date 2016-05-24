    $(document).ready(function () {

        // Boton de eliminar de la tabla
        $('.btn-delete').click(function (e) {

            // Nos situamos en el tr padre del boton y obtenemos el id
            var row = $(this).parents('tr');
            var id = row.data('id');

            // Creamos un atributo y le damos un valor para el modal
            $('#softDeletes').attr('data-id', id);

            

        }); 

        $('#softDeletes').click(function (e) {

            e.preventDefault();

            // Obtenemos el id que hemos asignado antes
            var id = $(this).data('id');

            // Obtenemos la url del formulario y reemplazamos el valor por el id
            // para asi recibirlo en el servidor
            var form = $('#form-delete');
            var url = form.attr('action').replace('USER_ID',id);
            var data = form.serialize();

            // Obtenemos el tr padre anterior
            var row = $('[data-id=' + id + ']');
            
            row.fadeOut();

            // Hacemos la peticion
            $.post(url, data, function(result){

                if (result.fail === 'fail') {
                    alert(result.message);
                    row.show();
                }
            });

            

        });

    });
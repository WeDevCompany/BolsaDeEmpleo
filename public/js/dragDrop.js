    /*$('document').ready(function(){
        $('#drop img').hide();
        $('#file-info').hide();
        $('#drop-curriculum img').hide();
        $('#curriculum-info').hide();
        $('#curriculum-dragDrop').hide();
    });*/
    // Funcion para mostrar la imagen
    $('#imagen-dragDrop').change(function() {

        // Nombre archivo usuario
        var file = (this.files[0].name).toString();
        var reader = new FileReader();

        // Vaciamos el contenido y añadimos el nuevo donde mostraremos el nombre del archivo
        $('#file-info').text('');
        $('#file-info').text(file);

        reader.onload = function (e) {

            // Mostrar imagen
            $('#drop img').attr('src', e.target.result);

            $('#drop img').removeClass('hidden');
            $('#file-info').removeClass('hidden');
            $('#drop span').addClass('hidden');

        }

        reader.readAsDataURL(this.files[0]);

    });

    // Funcion para drag and drop
    $('#drop').on("dragover drop", function(e) {
        e.stopPropagation();
        e.preventDefault();

    }).on("drop", function(e) {

            // objeto FileList
            var files = e.originalEvent.dataTransfer.files;
            var file = files[0];

            var metadata = [];

            // Comprobamos que es una imagen
            if (file.type.match('image.*')) {

                // "Introducimos" la imagen en el input file
                $("#imagen-dragDrop").prop("files", e.originalEvent.dataTransfer.files);

                $(this).css("border", "2px solid green");

            } else {

                $(this).css("border", "2px solid red");

                // error

            }

    });

    // Al hacer click en el drag and drop se abre la ventana de subida de archivos
    $('#drop').on('click', function(e) {

        $("#imagen-dragDrop").click();

    })

    /**************************
            CURRICULUM
    ***************************/

    // Funcion para mostrar el curriculum
    $('#curriculum-dragDrop').change(function() {

        // Nombre archivo usuario
        var file = (this.files[0].name).toString();
        var reader = new FileReader();

        // Vaciamos el contenido y añadimos el nuevo donde mostraremos el nombre del archivo
        $('#curriculum-info').text('');
        $('#curriculum-info').text(file);

        reader.onload = function (e) {

            // Mostrar curriculum

            $('#drop-curriculum img').removeClass('hidden');
            $('#curriculum-info').removeClass('hidden');
            $('#drop-curriculum span').addClass('hidden');

        }

        reader.readAsDataURL(this.files[0]);

    });

    // Funcion para drag and drop
    $('#drop-curriculum').on("dragover drop", function(e) {
        e.stopPropagation();
        e.preventDefault();

    }).on("drop", function(e) {

            // objeto FileList
            var files = e.originalEvent.dataTransfer.files;
            var file = files[0];

            var metadata = [];

            // Comprobamos que es una curriculum
            if (file.type.match('pdf.*')) {

                // "Introducimos" la curriculum en el input file
                $("#curriculum-dragDrop").prop("files", e.originalEvent.dataTransfer.files);

                $(this).css("border", "2px solid green");

            } else {

                $(this).css("border", "2px solid red");

                // error

            }

    });

    // Al hacer click en el drag and drop se abre la ventana de subida de archivos
    $('#drop-curriculum').on('click', function(e) {

        $("#curriculum-dragDrop").click();

    })

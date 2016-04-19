    // Ocultar campos al iniciar el documento
    $(document).on('ready', function(){
        $('input[type=file]').hide();
        $('#file-info').hide();
        $('.drop img').hide();

    });

    // Funcion para mostrar la imagen
    $('input[type=file]').change(function() {

        // Nombre archivo usuario
        var file = (this.files[0].name).toString();
        var reader = new FileReader();
        
        // Vaciamos el contenido y añadimos el nuevo donde mostraremos el nombre del archivo
        $('#file-info').text('');
        $('#file-info').text(file);
        
        reader.onload = function (e) {

            // Mostrar imagen
            $('.drop img').attr('src', e.target.result);

            $('.drop img').show();
            $('#file-info').show();
            $('.drop span').hide();

        }
         
        reader.readAsDataURL(this.files[0]); 

    });

    // Funcion para drag and drop
    $('.drop').on("dragover drop", function(e) {
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
                $("input[type='file']").prop("files", e.originalEvent.dataTransfer.files);

                $(this).css("border", "2px solid green");

            } else {

                $(this).css("border", "2px solid red");

                // error

            }

    });

    // Al hacer click en el drag and drop se abre la ventana de subida de archivos
    $('.drop').on('click', function(e) {
        
        $("input[type='file']").click();

    })

@extends('layouts.app')

@section('content')
@include('partials.nav.navProfesor')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido Profesor</div>

                <div class="panel-body">
                    <p>Alta de profesores</p>
                     {{ Form::open(['route' => 'profesor..store', 'method' => 'POST', 'files' => 'true']) }}
                        {!! csrf_field() !!}
                        <fieldset>
                        <legend style="width:auto;">Profesor</legend>

                        <div class="control-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <i class="material-icons prefix">account_circle</i>
                                    {{ Form::text('firstName', null,['id' => "firstName"]) }}
                                    {{ Form::label('firstName', 'Nombre') }}

                                </div>
                            </div>
                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="control-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <i class="material-icons prefix">account_circle</i>
                                    {{ Form::text('lastName', null,['id' => "lastName"]) }}
                                    {{ Form::label('lastName', 'Apellidos') }}
                                </div>
                            </div>
                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="control-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    {{ Form::text('dni', null,['id' => "dni"]) }}
                                    {{ Form::label('dni', 'DNI') }}
                                </div>
                            </div>
                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="control-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <i class="material-icons prefix">phone</i>
                                    {{ Form::text('phone', null,['id' => "phone"]) }}
                                    {{ Form::label('phone', 'Phone') }}
                                </div>
                            </div>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">

                            <div class="col-md-12">

                            <!-- Drag and Drop -->
                            <a id="file-select">
                                <div class="drop" id="drop">
                                        <img id="show" src="">
                                        <div class="text-center">
                                            <span class="fa fa-file-image-o" aria-hidden="true"></span>
                                        </div>
                                </div>
                            <a>
                            <!-- FIN Drag and Drop -->

                            <span class="alert alert-info" id="file-info">No hay archivo aún</span>
                            {{ Form::file('file', null, ['id' => 'file', 'class' => 'hide']) }}

                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-control">
                        {{ Form::select('select',['L' => 'Large', 'S' => 'Small'], null,['class' => 'chosen-select form-control', 'multiple']) }}

                        </div>
                        </fieldset>


                        <fieldset>
                            <legend style="width: auto;">Usuario</legend>
                            @include('generic.userfields')
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 text-center">
                                <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                    <div class="show-responsive">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    </div>
                                    <div class="hidden-media">
                                        <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Registrar</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>

    // Indicamos cual sera el campo select multiple
    $('.chosen-select').chosen([]);

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

</script>

@endsection


    <div class="control-group{{ $errors->has('file') ? ' has-error' : '' }}">
        {{ Form::label('image', 'Subir Imágen de perfil', ['class' => 'col-md-12']) }}
        <div class="col-md-12">


            <a id="file-select">
                <div class="drop" id="drop">
                    <img id="show" class="hidden" src="">
                    <div class="text-center">
                        <span class="fa fa-file-image-o" aria-hidden="true"></span>
                    </div>
                </div>
            <a>


            <span class="alert alert-info hidden" id="file-info">No hay archivo aún</span>
            {{ Form::file('file', ['id' => 'imagen-dragDrop' , 'class' => 'hidden'], null) }}

            @if ($errors->has('file'))
                <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif

        </div>

    </div>
    <!-- FIN Drag and Drop -->

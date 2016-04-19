    <!-- Drag and Drop -->
    <div class="control-group{{ $errors->has('file') ? ' has-error' : '' }}">

        <div class="col-md-12">

            
            <a id="file-select">
                <div class="drop" id="drop">
                    <img id="show" src="">
                    <div class="text-center">
                        <span class="fa fa-file-image-o" aria-hidden="true"></span>
                    </div>
                </div>
            <a>
                                

            <span class="alert alert-info" id="file-info">No hay archivo aún</span>
            {{ Form::file('file', null, ['id' => 'file', 'class' => 'hide']) }}

            @if ($errors->has('file'))
                <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif

        </div>

    </div>
    <!-- FIN Drag and Drop -->
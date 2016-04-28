
	<div class="control-group{{ $errors->has('curriculum') ? ' has-error' : '' }}">
        {{ Form::label('image', 'Subir Curriculum', ['class' => 'col-md-12 label-dragDrop']) }}
        <div class="col-md-12">


            <a id="file-select">
                <div class="drop" id="drop-curriculum">
                    <img id="show" class="hidden" src="{{ url('/img/global/Pdf-icon.png') }}">
                    <div class="text-center">
                        <span class="fa fa-file-image-o" aria-hidden="true"></span>
                    </div>
                </div>
            <a>


            <span class="alert alert-info hidden" id="curriculum-info">No hay archivo aún</span>
            {{ Form::file('curriculum', ['id' => 'curriculum-dragDrop', 'class' => 'hidden'], null) }}

            @if ($errors->has('curriculum'))
                <span class="help-block">
                    <strong>{{ $errors->first('curriculum') }}</strong>
                </span>
            @endif

        </div>

    </div>
    <!-- FIN Drag and Drop -->
    </br>

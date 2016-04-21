    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('cif') ? ' has-error' : '' }}">
        {{ Form::label('cif', 'CIF') }}
        {{ Form::text('cif', null, ['class' => 'form-control']) }}
        @if ($errors->has('cif'))
            <span class="help-block">
                <strong>{{ $errors->first('cif') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('web') ? ' has-error' : '' }}">
        {{ Form::label('web', 'Página Web') }}
        {{ Form::text('web', null, ['class' => 'form-control']) }}
        @if ($errors->has('web'))
            <span class="help-block">
                <strong>{{ $errors->first('web') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        {{ Form::label('description', 'Descripción') }}
        {{ Form::text('description', null, ['class' => 'form-control']) }}
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    {{ Form::label('image', 'Subir Logo corporativo', ['class' => 'col-md-12']) }}
      
        <div class="col-md-6">
        {{ Form::file('image', null, ['class' => 'form-control']) }}

            @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
    </div>
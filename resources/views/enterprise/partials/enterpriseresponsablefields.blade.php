    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
        {{ Form::label('firstName', 'Nombre') }}
        {{ Form::text('firstName', null, ['class' => 'form-control']) }}
        @if ($errors->has('firstName'))
            <span class="help-block">
                <strong>{{ $errors->first('firstName') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
        {{ Form::label('lastName', 'Apellidos') }}
        {{ Form::text('lastName', null, ['class' => 'form-control']) }}
        @if ($errors->has('lastName'))
            <span class="help-block">
                <strong>{{ $errors->first('lastName') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
        {{ Form::label('dni', 'DNI') }}
        {{ Form::text('dni', null, ['class' => 'form-control']) }}
        @if ($errors->has('dni'))
            <span class="help-block">
                <strong>{{ $errors->first('dni') }}</strong>
            </span>
        @endif
    </div>
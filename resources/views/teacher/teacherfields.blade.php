    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
        {{ Form::label('firstName', 'Nombre') }}
        {{ Form::text('firstName', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
        @if ($errors->has('firstName'))
            <span class="help-block">
                <strong>{{ $errors->first('firstName') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
        {{ Form::label('lastName', 'Apellidos') }}
        {{ Form::text('lastName', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) }}
        @if ($errors->has('lastName'))
            <span class="help-block">
                <strong>{{ $errors->first('lastName') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
        {{ Form::label('dni', 'Correo electrónico') }}
        {{ Form::text('dni', null, ['class' => 'form-control', 'placeholder' => 'DNI']) }}
        @if ($errors->has('dni'))
            <span class="help-block">
                <strong>{{ $errors->first('dni') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        {{ Form::label('phone', 'Teléfono') }}
        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Teléfono personal']) }}
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
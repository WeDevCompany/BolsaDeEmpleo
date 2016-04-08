    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {{ Form::label('email', 'Correo electrónico') }}
        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail de usuario']) }}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Contraseña']) }}
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password2') ? ' has-error' : '' }}">
        {{ Form::label('password2', 'Confirmar contraseña') }}
        {{ Form::text('password2', null, ['class' => 'form-control', 'placeholder' => 'Repetición de contraseña']) }}
        @if ($errors->has('password2'))
            <span class="help-block">
                <strong>{{ $errors->first('password2') }}</strong>
            </span>
        @endif
    </div>
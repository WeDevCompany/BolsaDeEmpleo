    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
            <i class="material-icons prefix">mail outline</i>
        {{ Form::label('email', 'Correo electrónico') }}
        {{ Form::text('email', null, ['id' => 'puti']) }}
                </div>
    </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="row">
        <div class="input-field col-md-12">
            <i class="material-icons prefix">lock</i>
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::password('password', null, ['id' => 'password']) }}
                </div>
    </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
       <div class="row">
        <div class="input-field col-md-12">
            <i class="material-icons prefix">lock</i>
        {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
        {{ Form::password('password_confirmation', null, ['id' => 'password_confirmation']) }}
                </div>
    </div>
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
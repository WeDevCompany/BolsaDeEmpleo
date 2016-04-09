    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">    
        <div class="row">
            <div class="input-field col-md-12">
            <i class="material-icons prefix">email</i>
        {{ Form::label('email', 'Correo electrónico') }}
        {{ Form::text('email', null) }}
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
        {{ Form::text('password', null) }}
                </div>
    </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password2') ? ' has-error' : '' }}">
       <div class="row">
        <div class="input-field col-md-12">
            <i class="material-icons prefix">lock</i>
        {{ Form::label('password2', 'Confirmar contraseña') }}
        {{ Form::text('password2', null) }}
                </div>
    </div>
        @if ($errors->has('password2'))
            <span class="help-block">
                <strong>{{ $errors->first('password2') }}</strong>
            </span>
        @endif
    </div>
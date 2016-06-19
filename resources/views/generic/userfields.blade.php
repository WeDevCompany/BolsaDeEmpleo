    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">mail outline</i>
                {{ Form::label('email', 'Correo electrónico(*)') }}
                {{ Form::email('email', null, ['type' => 'email','id' => 'email', 'minlength' => '6','required' => 'true', 'title' => 'email que será su usuario', 'data-toggle' => 'tooltip']) }}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-6">
                <i class="material-icons prefix">lock</i>
                {{ Form::label('password', 'Contraseña(*)') }}
                {{ Form::password('password',  ['minlength' => '6','id' => 'password', 'required' => 'true', 'title' => 'Contraseña de su cuenta', 'data-toggle' => 'tooltip']) }}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-6">
                <i class="material-icons prefix">lock</i>
                {{ Form::label('password_confirmation', 'Confirmar contraseña(*)') }}
                {{ Form::password('password_confirmation',  ['minlength' => '6','id' => 'password_confirmation', 'required' => 'true', 'title' => 'Confirmación de su contraseña', 'data-toggle' => 'tooltip']) }}
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

    </div>
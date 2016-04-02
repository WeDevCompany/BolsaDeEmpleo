<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {{ Form::label('email', 'E-Mail', ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::text('email', null, ['class' => 'form-control']) }}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {{ Form::label('password', 'Contraseña', ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::password('password', ['class' => 'form-control']) }}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>
</div>

<div class="form-group{{ $errors->has('re-password') ? ' has-error' : '' }}">
    {{ Form::label('re-password', 'Repetir Contraseña', ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::password('re-password', ['class' => 'form-control']) }}
                @if ($errors->has('re-password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('re-password') }}</strong>
                    </span>
                @endif
        </div>
</div>
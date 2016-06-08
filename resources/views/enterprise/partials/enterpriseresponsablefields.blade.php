    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }} form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-8">
                <i class="material-icons prefix">perm_identity</i>
                {{ Form::label('firstName[0]', 'Nombre(*)') }}
                {{ Form::text('firstName[0]', null, ['class' => 'form-control', 'id' => 'firstName']) }}
                @if ($errors->has('firstName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('firstName') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-4">
                <i class="material-icons prefix">fingerprint</i>
                {{ Form::label('dni[0]', 'DNI(*)') }}
                {{ Form::text('dni[0]', null, ['class' => 'form-control', 'id' => 'dni']) }}
                @if ($errors->has('dni'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dni') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">perm_identity</i>
                {{ Form::label('lastName[0]', 'Apellidos(*)') }}
                {{ Form::text('lastName[0]', null, ['class' => 'form-control', 'id' => 'lastName']) }}
                @if ($errors->has('lastName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lastName') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
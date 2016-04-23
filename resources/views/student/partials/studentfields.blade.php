<div class="">
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
    <div class="form-group{{ $errors->has('nre') ? ' has-error' : '' }}">
        {{ Form::label('nre', 'NRE') }}
        {{ Form::text('nre', null, ['class' => 'form-control']) }}
        @if ($errors->has('nre'))
            <span class="help-block">
                <strong>{{ $errors->first('nre') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        {{ Form::label('phone', 'Teléfono') }}
        {{ Form::text('phone', null, ['class' => 'form-control']) }}
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('road') ? ' has-error' : '' }}">
        {{ Form::label('road', 'Tipo de vía') }}
        {{ Form::text('road', null, ['class' => 'form-control']) }}
        @if ($errors->has('road'))
            <span class="help-block">
                <strong>{{ $errors->first('road') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        {{ Form::label('address', 'Dirección') }}
        {{ Form::text('address', null, ['class' => 'form-control']) }}
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
        {{ Form::label('birthdate', 'Cumpleaños') }}
        {{ Form::text('birthdate', null, ['class' => 'form-control']) }}
        @if ($errors->has('birthdate'))
            <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('curriculum') ? ' has-error' : '' }}">
        <div class="col-md-6">
            {{ Form::label('curriculum', 'Subir Curriculum', ['class' => 'col-md-12']) }}
            {{ Form::file('curriculum', null, ['class' => 'form-control']) }}

            @if ($errors->has('curriculum'))
                <span class="help-block">
                    <strong>{{ $errors->first('curriculum') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <div class="col-md-6">
            {{ Form::label('image', 'Subir Imágen de perfil', ['class' => 'col-md-12']) }}
            {{ Form::file('image', null, ['class' => 'form-control']) }}

            @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

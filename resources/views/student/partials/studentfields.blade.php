<div class="">
    <div class="control-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">account_circle</i>
                {{ Form::text('firstName', null,['id' => "firstName"]) }}
                {{ Form::label('firstName', 'Nombre') }}

            </div>
        </div>
            @if ($errors->has('firstName'))
                <span class="help-block">
                    <strong>{{ $errors->first('firstName') }}</strong>
                </span>
            @endif
    </div>
    <div class="control-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">account_circle</i>
                {{ Form::text('lastName', null,['id' => "lastName"]) }}
                {{ Form::label('lastName', 'Apellidos') }}
            </div>
        </div>
            @if ($errors->has('lastName'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastName') }}</strong>
                </span>
            @endif
    </div>
    <div class="control-group{{ $errors->has('dni') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">assignment_ind</i>
                {{ Form::text('dni', null,['id' => "dni"]) }}
                {{ Form::label('dni', 'DNI') }}
            </div>
        </div>
            @if ($errors->has('dni'))
                <span class="help-block">
                    <strong>{{ $errors->first('dni') }}</strong>
                </span>
            @endif
    </div>
    <div class="control-group{{ $errors->has('nre') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">fingerprint</i>
            {{ Form::label('nre', 'NRE') }}
            {{ Form::text('nre', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('nre'))
            <span class="help-block">
                <strong>{{ $errors->first('nre') }}</strong>
            </span>
        @endif
    </div>
    <div class="control-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">phone</i>
                {{ Form::text('phone', null,['id' => "phone"]) }}
                {{ Form::label('phone', 'Phone') }}
            </div>
        </div>
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
    </div>
    <div class="control-group{{ $errors->has('road') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">add_location</i>
                {{ Form::label('road', 'Tipo de vía') }}
                {{ Form::text('road', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('road'))
            <span class="help-block">
                <strong>{{ $errors->first('road') }}</strong>
            </span>
        @endif
    </div>
    <div class="control-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">person_pin_circle</i>
                {{ Form::label('address', 'Dirección') }}
                {{ Form::text('address', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>

    <div class="control-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">today</i>
                {{ Form::label('birthdate', 'Fecha de nacimiento', ['class' => 'labelpicker']) }}
                {{ Form::text('birthdate',null, ['class' => 'datepicker', 'id' => 'picker']) }}
            </div>
        </div>
        @if ($errors->has('birthdate'))
            <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
            </span>
        @endif
    </div>

    @include('partials.upload.dragDropCurriculum')
    @include('partials.upload.dragDrop')
</div>

<div class="">
    <div class="control-group{{ $errors->has('firstName') ? ' has-error' : '' }} control-group{{ $errors->has('dni') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-8">
                <i class="material-icons prefix">account_circle</i>
                {{ Form::text('firstName', null,['id' => "firstName", 'required' => 'true', 'title' => 'Nombre del alumno', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('firstName', 'Nombre(*)') }}
                @if ($errors->has('firstName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('firstName') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-4">
                <i class="material-icons prefix">assignment_ind</i>
                {{ Form::text('dni', null,['id' => "dni", 'class' => 'validate', 'pattern' => '(([x-zX-Z]{1})(\d{7})([a-zA-Z]{1}))|((\d{8})([a-zA-Z]{1}))', 'required' => 'true', 'title' => 'Documento nacional de identificación', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('dni', 'DNI(*)') }}
                @if ($errors->has('dni'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dni') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">account_circle</i>
                {{ Form::text('lastName', null,['id' => "lastName", 'required' => 'true', 'title' => 'Apellidos del aulmno', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('lastName', 'Apellidos(*)') }}
                @if ($errors->has('lastName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lastName') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('phone') ? ' has-error' : '' }} control-group{{ $errors->has('birthdate') ? ' has-error' : '' }} control-group{{ $errors->has('nre') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-4">
                <i class="material-icons prefix">today</i>
                {{ Form::label('birthdate', 'Fecha de nacimiento(*)', ['class' => 'labelpicker']) }}
                {{ Form::text('birthdate',null, ['class' => 'datepicker', 'id' => 'picker', 'required' => 'true','title' => 'Fecha de nacimiento', 'data-toggle' => 'tooltip']) }}
                @if ($errors->has('birthdate'))
                    <span class="help-block">
                        <strong>{{ $errors->first('birthdate') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-4">
                <i class="material-icons prefix">phone</i>
                {{ Form::text('phone', null,['id' => "phone", 'required' => 'true', 'title' => 'Teléfono de contacto', 'minlength' => '9', 'maxlength' => '9', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('phone', 'Teléfono(*)') }}
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-4">
                <i class="material-icons prefix">fingerprint</i>
                {{ Form::label('nre', 'NRE') }}
                {{ Form::text('nre', null, ['class' => 'form-control', 'id' => 'nre', 'title' => 'Número regional del estudiante', 'data-toggle' => 'tooltip']) }}
                @if ($errors->has('nre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nre') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('road') ? ' has-error' : '' }} control-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <div class="row">
            <div class="extra-padding">
                <div class="input-field col-md-3 selectcol3">
                    {{ Form::label('road', 'Tipo de vía(*)', ['class' => "label-select"]) }}
                    {{ Form::select('road', config('roads.road'), null,['class' => 'chosen-select form-control', 'required' => 'true', 'minlength' => '3', 'title' => 'Tipo de via en el que reside', 'data-toggle' => 'tooltip']) }}
                    @if ($errors->has('road'))
                        <span class="help-block">
                            <strong>{{ $errors->first('road') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-field col-md-8">
                    <i class="material-icons prefix">person_pin_circle</i>
                    {{ Form::label('address', 'Dirección(*)') }}
                    {{ Form::text('address', null, ['class' => 'form-control', 'required' => 'true', 'title' => 'Dirección de su residencia', 'data-toggle' => 'tooltip']) }}
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('partials.upload.dragDropCurriculum')
    @include('partials.upload.dragDrop')
</div>

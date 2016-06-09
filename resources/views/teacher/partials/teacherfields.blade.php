<fieldset>
    <legend>Profesor</legend>

    <div class="control-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">account_circle</i>
                {{ Form::text('firstName', null,['id' => "firstName", 'required' => 'true', 'title' => 'Nombre del profesor', 'data-toggle' => 'tooltip']) }}
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
                {{ Form::text('lastName', null,['id' => "lastName", 'required' => 'true', 'title' => 'Apellidos del profesor', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('lastName', 'Apellidos') }}
            </div>
        </div>
            @if ($errors->has('lastName'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastName') }}</strong>
                </span>
            @endif
    </div>

    <div class="control-group{{ $errors->has('dni') ? ' has-error' : '' }} control-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-6">
                <i class="material-icons prefix">phone</i>
                {{ Form::text('phone', null,['id' => "phone", 'required' => 'true', 'title' => 'Número de teéfono del profesor', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('phone', 'Phone') }}
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-6">
                <i class="material-icons prefix">assignment_ind</i>
                {{ Form::text('dni', null,['id' => "dni", 'required' => 'true', 'title' => 'DNI del profesor', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('dni', 'DNI') }}
                @if ($errors->has('dni'))
                   <span class="help-block">
                        <strong>{{ $errors->first('dni') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <!-- Drag and drop -->
    <div class="control-group row extra-padding">
        @include('partials.upload.dragDrop')
    </div>
</fieldset>

@include('teacher.partials.teacherSubjects')

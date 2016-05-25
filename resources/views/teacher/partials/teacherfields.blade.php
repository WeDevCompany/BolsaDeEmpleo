<fieldset>
    <legend>Profesor</legend>

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

    <div class="control-group{{ $errors->has('dni') ? ' has-error' : '' }} control-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-6">
                <i class="material-icons prefix">phone</i>
                {{ Form::text('phone', null,['id' => "phone"]) }}
                {{ Form::label('phone', 'Phone') }}
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-6">
                <i class="material-icons prefix">assignment_ind</i>
                {{ Form::text('dni', null,['id' => "dni"]) }}
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

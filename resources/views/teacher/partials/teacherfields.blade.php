<fieldset>
<legend style="width:auto;">Profesor</legend>

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
@include('generic.tutor')

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

<!-- Drag and drop -->
@include('partials.upload.dragDrop')

<div class="control-group{{ $errors->has('select') ? ' has-error' : '' }}">
    <div class="row">
         <div class="input-field col-md-12">

            {{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control', 'multiple' => 'multiple']) }}

        </div>
    </div>
        @if ($errors->has('select'))
            <span class="help-block">
                <strong>{{ $errors->first('select') }}</strong>
            </span>
        @endif
</div>
</fieldset>

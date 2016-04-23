    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::label('name', 'Nombre del centro') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('emailContact') ? ' has-error' : '' }}">
        {{ Form::label('emailContact', 'Email de contacto') }}
        {{ Form::text('emailContact', null, ['class' => 'form-control']) }}
        @if ($errors->has('emailContact'))
            <span class="help-block">
                <strong>{{ $errors->first('emailContact') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('road') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                {{ Form::label('road', 'Tipo de vía',['style' => 'margin-top: -4%']) }}
                {{ Form::select('road',array('1' => 'Alto', '2' => 'Camino', '3' => 'Plaza', '4' => 'Calle', '5' => 'Avenida', '6' => 'Carril'), null,['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('road'))
            <span class="help-block">
                <strong>{{ $errors->first('road') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        {{ Form::label('address', 'Direccion') }}
        {{ Form::text('address', null, ['class' => 'form-control']) }}
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
        {{ Form::label('phone1', 'Teléfono principal') }}
        {{ Form::text('phone1', null, ['class' => 'form-control']) }}
        @if ($errors->has('phone1'))
            <span class="help-block">
                <strong>{{ $errors->first('phone1') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
        {{ Form::label('phone2', 'Teléfono alternativo') }}
        {{ Form::text('phone2', null, ['class' => 'form-control']) }}
        @if ($errors->has('phone2'))
            <span class="help-block">
                <strong>{{ $errors->first('phone2') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
        {{ Form::label('fax', 'Fax') }}
        {{ Form::text('fax', null, ['class' => 'form-control']) }}
        @if ($errors->has('fax'))
            <span class="help-block">
                <strong>{{ $errors->first('fax') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field{{ $errors->has('principalCenter') ? ' has-error' : '' }} col-md-12">
        {{ Form::checkbox('principalCenter', 'si', false, ['id' => 'principalCenter']) }}
        {{ Form::label('principalCenter', '¿Es este centro de trabajo el centro principal/sede de la empresa?', ['for' => 'principalCenter']) }}
    </div>

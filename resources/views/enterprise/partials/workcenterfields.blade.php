    <div class="form-group{{ $errors->has('nameWorkCenter') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">business</i>
                {{ Form::label('nameWorkCenter', 'Nombre del centro') }}
                {{ Form::text('nameWorkCenter', null, ['class' => 'form-control']) }}
                @if ($errors->has('nameWorkCenter'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nameWorkCenter') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('emailContact') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">markunread_mailbox</i>
                {{ Form::label('emailContact', 'Email de contacto') }}
                {{ Form::text('emailContact', null, ['class' => 'form-control']) }}
                @if ($errors->has('emailContact'))
                    <span class="help-block">
                        <strong>{{ $errors->first('emailContact') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('road') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                {{ Form::label('road', 'Tipo de vía',['class' => 'label-select']) }}
                {{ Form::select('road',config('roads.road'), null,['class' => 'chosen-select form-control']) }}
            </div>
        </div>
        @if ($errors->has('road'))
            <span class="help-block">
                <strong>{{ $errors->first('road') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">room</i>
                {{ Form::label('address', 'Direccion') }}
                {{ Form::text('address', null, ['class' => 'form-control']) }}
                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">phone_in_talk</i>
                {{ Form::label('phone1', 'Teléfono principal') }}
                {{ Form::text('phone1', null, ['class' => 'form-control']) }}
                @if ($errors->has('phone1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone1') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">call</i>
                {{ Form::label('phone2', 'Teléfono alternativo') }}
                {{ Form::text('phone2', null, ['class' => 'form-control']) }}
                @if ($errors->has('phone2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone2') }}</strong>
                    </span>
                @endif
                </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">ring_volume</i>
                {{ Form::label('fax', 'Fax') }}
                {{ Form::text('fax', null, ['class' => 'form-control']) }}
                @if ($errors->has('fax'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fax') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-field{{ $errors->has('principalCenter') ? ' has-error' : '' }} col-md-12">
            {{ Form::checkbox('principalCenter', 'si', false, ['id' => 'principalCenter']) }}
            {{ Form::label('principalCenter', '¿Es este centro de trabajo el centro principal/sede de la empresa?', ['for' => 'principalCenter']) }}
        </div>
    </div>


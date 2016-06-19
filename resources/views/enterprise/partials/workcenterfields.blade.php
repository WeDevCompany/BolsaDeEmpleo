    <div class="control-group{{ $errors->has('nameWorkCenter') ? ' has-error' : '' }} form-group{{ $errors->has('emailContact') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-4">
                <i class="material-icons prefix">business</i>
                {{ Form::label('nameWorkCenter', 'Nombre del centro(*)') }}
                {{ Form::text('nameWorkCenter', null, ['class' => 'form-control', 'title' => 'Nombre del centro de trabajo en la empresa', 'data-toggle' => 'tooltip', 'required' => 'true', 'minlength' => '2']) }}
                @if ($errors->has('nameWorkCenter'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nameWorkCenter') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-8">
                <i class="material-icons prefix">markunread_mailbox</i>
                {{ Form::label('emailContact', 'Email de contacto(*)') }}
                {{ Form::email('emailContact', null, ['class' => 'form-control', 'id' => 'emailContact', 'title' => 'Email de contacto con el centro de trabajo', 'data-toggle' => 'tooltip', 'required' => 'true', 'minlength' => '6']) }}
                @if ($errors->has('emailContact'))
                    <span class="help-block">
                        <strong>{{ $errors->first('emailContact') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('phone1') ? ' has-error' : '' }} control-group{{ $errors->has('phone2') ? ' has-error' : '' }} control-group{{ $errors->has('fax') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-4">
                <i class="material-icons prefix">phone_in_talk</i>
                {{ Form::label('phone1', 'Teléfono principal(*)') }}
                {{ Form::text('phone1', null, ['class' => 'form-control', 'id' => 'phone', 'title' => 'Número de teléfono del centro de trabajo', 'data-toggle' => 'tooltip', 'required' => 'true', 'minlength' => '9' , 'maxlength' => '9']) }}
                @if ($errors->has('phone1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone1') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-4">
                <i class="material-icons prefix">call</i>
                {{ Form::label('phone2', 'Teléfono alternativo') }}
                {{ Form::text('phone2', null, ['class' => 'form-control', 'title' => 'Otro número de teléfono del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                @if ($errors->has('phone2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone2') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-4">
                <i class="material-icons prefix">ring_volume</i>
                {{ Form::label('fax', 'Fax') }}
                {{ Form::text('fax', null, ['class' => 'form-control', 'title' => 'Número de fax del centro de trabajo, en caso de tener', 'data-toggle' => 'tooltip']) }}
                @if ($errors->has('fax'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fax') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('road') ? ' has-error' : '' }} control-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-3 selectcol3">
                {{ Form::label('road', 'Tipo de vía(*)',['class' => 'label-select']) }}
                {{ Form::select('road',config('roads.road'), null,['class' => 'chosen-select form-control', 'title' => 'Tipos de vías', 'data-toggle' => 'tooltip']) }}
                @if ($errors->has('road'))
                    <span class="help-block">
                        <strong>{{ $errors->first('road') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-8">
                <i class="material-icons prefix">room</i>
                {{ Form::label('address', 'Direccion(*)') }}
                {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'title' => 'número de teléfono del centro de trabajo', 'data-toggle' => 'tooltip', 'required' => 'true', 'minlength' => '3']) }}
                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
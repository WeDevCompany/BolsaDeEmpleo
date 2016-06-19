    <div class="control-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">business</i>
                {{ Form::text('name', null,['id' => "name", 'required' => 'true', 'title' => 'Nombre del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('name', 'Nombre centro de trabajo(*)') }}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('city') ? ' has-error' : '' }} control-group{{ $errors->has('state') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-6">
                <i class="material-icons prefix">state</i>
                {{ Form::text('state', null,['id' => "state", 'required' => 'true', 'title' => 'Provincia del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('state', 'Provincia(*)') }}
                @if ($errors->has('state'))
                    <span class="help-block">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-6">
                <i class="material-icons prefix">assignment_ind</i>
                {{ Form::text('city', null,['id' => "city", 'required' => 'true', 'title' => 'Ciudad del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('city', 'Ciudad(*)') }}
                @if ($errors->has('city'))
                   <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('address') ? ' has-error' : '' }} control-group{{ $errors->has('road') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-4">
                {{ Form::select('road', config('roads.road'), null,['id' => "road", 'required' => 'true', 'title' => 'Tipo de via del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('road', 'Tipo de via(*)') }}
                @if ($errors->has('road'))
                    <span class="help-block">
                        <strong>{{ $errors->first('road') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-8">
                <i class="material-icons prefix">room</i>
                {{ Form::text('address', null,['id' => "address", 'required' => 'true', 'title' => 'Dirección del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('address', 'Dirección(*)') }}
                @if ($errors->has('address'))
                   <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('phone1') ? ' has-error' : '' }} control-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-6">
                <i class="material-icons prefix">mail outline</i>
                {{ Form::text('email', null,['id' => "email", 'required' => 'true', 'title' => 'Correo Electrónico del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('email', 'Correo Electrónico(*)') }}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-6">
                <i class="material-icons prefix">phone_in_talk</i>
                {{ Form::text('phone1', null,['id' => "phone1", 'required' => 'true', 'title' => 'Teléfono del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('phone1', 'Teléfono(*)') }}
                @if ($errors->has('phone1'))
                   <span class="help-block">
                        <strong>{{ $errors->first('phone1') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('phone2') ? ' has-error' : '' }} control-group{{ $errors->has('fax') ? ' has-error' : '' }} control-group{{ $errors->has('principalCenter') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-6">
                {{ Form::checkbox('principalCenter', null,['id' => "principalCenter", 'required' => 'true', 'title' => 'Centro principal de la empresa del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('principalCenter', 'Centro principal de la empresa') }}
                @if ($errors->has('principalCenter'))
                    <span class="help-block">
                        <strong>{{ $errors->first('principalCenter') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-6">
                <i class="material-icons prefix">call</i>
                {{ Form::text('phone2', null,['id' => "phone2", 'required' => 'true', 'title' => 'Teléfono alternativo del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('phone2', 'Teléfono alternativo') }}
                @if ($errors->has('phone2'))
                   <span class="help-block">
                        <strong>{{ $errors->first('phone2') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-6">
                <i class="material-icons prefix">ring_volume</i>
                {{ Form::text('fax', null,['id' => "fax", 'required' => 'true', 'title' => 'Fax del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('fax', 'Fax') }}
                @if ($errors->has('fax'))
                   <span class="help-block">
                        <strong>{{ $errors->first('fax') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="control-group{{ $errors->has('responsable') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-6">
                <i class="material-icons prefix">responsable</i>
                {{ Form::select('responsable', ['holi' => 'holi'], null,['id' => "responsable", 'required' => 'true', 'title' => 'Responsable del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                {{ Form::label('responsable', 'Responsable centro de trabajo(*)') }}
                @if ($errors->has('responsable'))
                    <span class="help-block">
                        <strong>{{ $errors->first('responsable') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
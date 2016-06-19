    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-group{{ $errors->has('cif') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-8">
                <i class="material-icons prefix">copyright</i>
                {{ Form::label('name', 'Nombre(*)') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'title' => 'Nombre de la empresa', 'data-toggle' => 'tooltip', 'required' => 'true', 'minlength' => '2']) }}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col-md-4">
                <i class="material-icons prefix">fingerprint</i>
                {{ Form::label('cif', 'CIF(*)') }}
                {{ Form::text('cif', null, ['class' => 'form-control', 'id' => 'cif', 'title' => 'CIF de la empresa', 'data-toggle' => 'tooltip', 'required' => 'true', 'minlength' => '9', 'maxlength' => '9']) }}
                @if ($errors->has('cif'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cif') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('web') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">language</i>
                {{ Form::label('web', 'Página Web') }}
                {{ Form::url('web', null, ['class' => 'form-control', 'title' => 'URL de la empresa', 'data-toggle' => 'tooltip']) }}
                @if ($errors->has('web'))
                    <span class="help-block">
                        <strong>{{ $errors->first('web') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">info</i>
                {{ Form::label('description', 'Descripción(*)') }}
                {{ Form::text('description', null, ['max-lenght' => '200', 'class' => 'form-control', 'required' => 'true']) }}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    @include('partials.upload.dragDrop')
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">copyright</i>
                {{ Form::label('name', 'Nombre') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('cif') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">fingerprint</i>
                {{ Form::label('cif', 'CIF') }}
                {{ Form::text('cif', null, ['class' => 'form-control']) }}
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
                {{ Form::text('web', null, ['class' => 'form-control']) }}
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
                {{ Form::label('description', 'Descripción') }}
                {{ Form::text('description', null, ['max-lenght' => '200', 'class' => 'form-control']) }}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    @include('partials.upload.dragDrop')
    </div>
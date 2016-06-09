<div style="margin: 1em 0 1em" class="control-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-12">
            <i class="material-icons prefix">error_outline</i>
            {{ Form::text('title', null,['id' => "title", 'required' => 'true', 'title' => 'Nombre que desea ponerle a la oferta de trabajo', 'data-toggle' => 'tooltip']) }}
            {{ Form::label('title', 'Título') }}

        </div>
    </div>
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
</div>
<div style="margin: 1em 0 1em" class="control-group{{ $errors->has('duration') ? ' has-error' : '' }} control-group{{ $errors->has('level') ? ' has-error' : '' }} control-group{{ $errors->has('experience') ? ' has-error' : '' }} control-group{{ $errors->has('kind') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-3 select-minor">
            {{ Form::select('duration', config('select.duration'), null,['id' => "duration", 'class' => 'select form-control', 'required' => 'true', 'title' => 'Duración de contrato de trabajo', 'data-toggle' => 'tooltip']) }}
            {{ Form::label('duration', 'Duración', ['class' => 'label-select-minor']) }}
            @if ($errors->has('duration'))
                <span class="help-block">
                    <strong>{{ $errors->first('duration') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-field col-md-3 select-minor">
            {{ Form::select('level', config('select.level'), null,['id' => "level", 'class' => 'select form-control', 'required' => 'true', 'title' => 'Nivel de estudios requerido para el puesto de trabajo', 'data-toggle' => 'tooltip']) }}
            {{ Form::label('level', 'Nivel', ['class' => 'label-select-minor']) }}
            @if ($errors->has('level'))
               <span class="help-block">
                    <strong>{{ $errors->first('level') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-field col-md-3 select-minor">
            {{ Form::select('experience', config('select.experience'), null,['id' => "experience", 'class' => 'select form-control', 'required' => 'true', 'title' => 'Años de experiencia requeridos en la oferta de trabajo', 'data-toggle' => 'tooltip']) }}
            {{ Form::label('experience', 'Experiencia', ['class' => 'label-select-minor']) }}
            @if ($errors->has('experience'))
               <span class="help-block">
                    <strong>{{ $errors->first('experience') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-field col-md-3 select-minor">
            {{ Form::select('kind', config('select.kind'), null,['id' => "kind", 'class' => 'select form-control', 'required' => 'true', 'title' => 'Tipo de oferta de trabajo', 'data-toggle' => 'tooltip']) }}
            {{ Form::label('kind', 'Tipo', ['class' => 'label-select-minor']) }}
            @if ($errors->has('kind'))
               <span class="help-block">
                    <strong>{{ $errors->first('kind') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div style="margin: 1em 0 1em" class="control-group{{ $errors->has('wanted') ? ' has-error' : '' }} control-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-6">
            {{ Form::select('name', $allProfFamilies, null,['id' => "name", 'class' => 'select form-control', 'required' => 'true', 'title' => 'Familia profesional a la que va dirigida la oferta', 'data-toggle' => 'tooltip']) }}
            {{ Form::label('name', 'Familia profesional', ['class' => 'label-select-minor']) }}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-field col-md-6">
            <i class="fa fa-users prefix" aria-hidden="true"></i>
            {{ Form::number('wanted', null,['id' => "wanted", 'min' => '0', 'max' => '10', 'required' => 'true', 'title' => 'Número de empleados que se necesita para la oferta', 'data-toggle' => 'tooltip']) }}
            {{ Form::label('wanted', 'Trabajadores requeridos') }}
            @if ($errors->has('wanted'))
               <span class="help-block">
                    <strong>{{ $errors->first('wanted') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div style="margin: 1em 0 1em" class="control-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-12">
            <i class="fa fa-pencil prefix"></i>
            {{ Form::textarea('description', null,['id' => "description", 'class' => 'materialize-textarea', 'required' => 'true', 'title' => 'Descripción detallada de la oferta de trabajo', 'data-toggle' => 'tooltip']) }}
            {{ Form::label('description', 'Descripción') }}

        </div>
    </div>
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
</div>
<div style="margin: 1em 0 1em" class="control-group{{ $errors->has('tagCount') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-12">
            {{ Form::select('tagCount[]', $allTags , null,['id' => "tagCount", 'class' => 'chosen-select form-control', 'multiple' => 'multiple', 'required' => 'true', 'data-placeholder' => "Palabras clave"]) }}
            {{ Form::label('tagCount', 'Tags', ['class' => 'label-select-minor']) }}
        </div>
    </div>
        @if ($errors->has('tagCount'))
            <span class="help-block">
                <strong>{{ $errors->first('tagCount') }}</strong>
            </span>
        @endif
</div>
<div style="margin: 1em 0 1em" class="control-group{{ $errors->has('others') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-12">
            <i class="fa fa-tags prefix" aria-hidden="true"></i>
            {{ Form::text('others', null,['id' => "others", 'title' => 'Otras palabras claves de la oferta de trabajo', 'data-toggle' => 'tooltip']) }}
            {{ Form::label('others', 'Otros Tags (Separar por comas cada tag)') }}
        </div>
    </div>
        @if ($errors->has('others'))
            <span class="help-block">
                <strong>{{ $errors->first('others') }}</strong>
            </span>
        @endif
</div>
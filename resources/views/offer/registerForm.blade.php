@extends('layouts.app')
@section('css')
    @include('keyword.offer.offerKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de valbolaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection

@section('content')
@include('partials.nav.navParent')
	<div class="container">
        <div class="row">
            <div class="col-md-12 sin-margen">
                <div class="panel panel-default">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4><i class="fa fa-university"></i>Formulario de alta de profesores</h4>
                        </div>
                        <div class="panel-body">
                             {{ Form::open(['url' => 'registro/registroProfesor', 'method' => 'POST', 'id' => 'offer-register-form']) }}
                                {!! csrf_field() !!}
                                <fieldset>
                                <div style="margin: 1em 0 1em" class="control-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <div class="input-field col-md-12">
                                            <i class="material-icons prefix">account_circle</i>
                                            {{ Form::text('title', null,['id' => "title"]) }}
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
                                        <div class="input-field col-md-3">
                                            {{ Form::select('duration', ['L' => 'Large', 'S' => 'Small'], null,['id' => "duration", 'class' => 'select form-control']) }}
                                            {{ Form::label('duration', 'Duración', ['class' => 'label-select-minor']) }}
                                            @if ($errors->has('duration'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('duration') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="input-field col-md-3">
                                            {{ Form::select('level', ['L' => 'Large', 'S' => 'Small'], null,['id' => "level", 'class' => 'select form-control']) }}
                                            {{ Form::label('level', 'Nivel', ['class' => 'label-select-minor']) }}
                                            @if ($errors->has('level'))
                                               <span class="help-block">
                                                    <strong>{{ $errors->first('level') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="input-field col-md-3">
                                            {{ Form::select('experience', ['L' => 'Large', 'S' => 'Small'], null,['id' => "experience", 'class' => 'select form-control']) }}
                                            {{ Form::label('experience', 'Experiencia', ['class' => 'label-select-minor']) }}
                                            @if ($errors->has('experience'))
                                               <span class="help-block">
                                                    <strong>{{ $errors->first('experience') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="input-field col-md-3">
                                            {{ Form::select('kind', ['L' => 'Large', 'S' => 'Small'], null,['id' => "kind", 'class' => 'select form-control']) }}
                                            {{ Form::label('kind', 'Tipo', ['class' => 'label-select-minor']) }}
                                            @if ($errors->has('kind'))
                                               <span class="help-block">
                                                    <strong>{{ $errors->first('kind') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div style="margin: 1em 0 1em" class="control-group{{ $errors->has('wanted') ? ' has-error' : '' }} control-group{{ $errors->has('profFamily') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <div class="input-field col-md-6">
                                            <i class="fa fa-book prefix" aria-hidden="true"></i>
                                            {{ Form::text('profFamily', null,['id' => "profFamily"]) }}
                                            {{ Form::label('profFamily', 'Familia profesional') }}
                                            @if ($errors->has('profFamily'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('profFamily') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="input-field col-md-6">
                                            <i class="fa fa-users prefix" aria-hidden="true"></i>
                                            {{ Form::text('wanted', null,['id' => "wanted"]) }}
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
                                            {{ Form::textarea('description', null,['id' => "description", 'class' => 'materialize-textarea']) }}
                                            {{ Form::label('description', 'Descripción') }}

                                        </div>
                                    </div>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div style="margin: 1em 0 1em" class="control-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <div class="input-field col-md-12">
                                            {{ Form::select('tag', ['L' => 'Large', 'S' => 'Small'], null,['id' => "tag", 'class' => 'select form-control']) }}
                                            {{ Form::label('tag', 'Tags', ['class' => 'label-select-minor']) }}
                                        </div>
                                    </div>
                                        @if ($errors->has('tag'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tag') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div style="margin: 1em 0 1em" class="control-group{{ $errors->has('others') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <div class="input-field col-md-12">
                                            <i class="fa fa-tags prefix" aria-hidden="true"></i>
                                            {{ Form::text('others', null,['id' => "others"]) }}
                                            {{ Form::label('others', 'Otros Tags (Separar por comas cada tag)') }}
                                        </div>
                                    </div>
                                        @if ($errors->has('others'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('others') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div style="margin: 1em 0 1em" class="control-group{{ $errors->has('enterpriseResponsable') ? ' has-error' : '' }} control-group{{ $errors->has('workcenter') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <div class="input-field col-md-6">
                                            {{ Form::select('workcenter', ['L' => 'Large', 'S' => 'Small'], null,['id' => "workcenter", 'class' => 'select form-control']) }}
                                            {{ Form::label('workcenter', 'Centro de trabajo', ['class' => 'label-select-minor']) }}
                                            @if ($errors->has('workcenter'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('workcenter') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="input-field col-md-6">
                                            {{ Form::select('enterpriseResponsable', ['L' => 'Large', 'S' => 'Small'], null,['id' => "enterpriseResponsable", 'class' => 'select form-control']) }}
                                            {{ Form::label('enterpriseResponsable', 'Responsable del centro de trabajo', ['class' => 'label-select-minor']) }}
                                            @if ($errors->has('enterpriseResponsable'))
                                               <span class="help-block">
                                                    <strong>{{ $errors->first('enterpriseResponsable') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                            <div class="show-responsive">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            </div>
                                            <div class="hidden-media">
                                                <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Registrar</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('partials.footer.footerWelcome')
@endsection
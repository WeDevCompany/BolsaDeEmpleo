@extends('layouts.app')
@section('content')
@include('partials.nav.navParent')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">

                        <h4><i class="fa fa-key"></i> Cambiar Contraseña</h4>

                    </div>
                    <div class="panel-body">
                        {!! Form::open(['url' => \Auth::user()->rol . config('routes.updatePassword'), 'method' => 'POST']) !!}
                            <div class="control-group{{ $errors->has('contraseñaActual') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <i class="material-icons prefix">lock</i>
                                        {{ Form::label('contraseñaActual', 'Contraseña actual(*)') }}
                                        {{ Form::password('contraseñaActual',  ['minlength' => '6','id' => 'contraseñaActual', 'required' => 'true', 'title' => 'Contraseña de su cuenta', 'data-toggle' => 'tooltip']) }}
                                        @if ($errors->has('contraseñaActual'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contraseñaActual') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="control-group{{ $errors->has('nuevaContraseña') ? ' has-error' : '' }} form-group{{ $errors->has('nuevaContraseña_confirmation') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="input-field col-md-6">
                                        <i class="material-icons prefix">lock</i>
                                        {{ Form::label('nuevaContraseña', 'Nueva contraseña(*)') }}
                                        {{ Form::password('nuevaContraseña',  ['minlength' => '6','id' => 'nuevaContraseña', 'required' => 'true', 'title' => 'Contraseña de su cuenta', 'data-toggle' => 'tooltip']) }}
                                        @if ($errors->has('nuevaContraseña'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nuevaContraseña') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="input-field col-md-6">
                                        <i class="material-icons prefix">lock</i>
                                        {{ Form::label('nuevaContraseña_confirmation', 'Confirmar nueva contraseña(*)') }}
                                        {{ Form::password('nuevaContraseña_confirmation',  ['minlength' => '6','id' => 'nuevaContraseña_confirmation', 'required' => 'true', 'title' => 'Confirmación de su contraseña', 'data-toggle' => 'tooltip']) }}
                                        @if ($errors->has('nuevaContraseña_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nuevaContraseña_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="form-group extra-padding-curriculum">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                        <div class="show-responsive">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                        </div>
                                        <div class="hidden-media">
                                            <i class="fa fa-btn fa-key"></i> <span class="hidden-media">Cambiar contraseña</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
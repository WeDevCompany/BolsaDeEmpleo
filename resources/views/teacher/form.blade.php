@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido Profesor</div>

                <div class="panel-body">
                    <p>Formulario de registro para PROFESORES</p>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        
                        <fieldset>
                        <legend style="width:auto;">Profesor</legend>

                        <div class="control-group">
                        {{ Form::label('first_name', 'Nombre', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                            {{ Form::text('first_name', null, ['class' => 'form-control']) }}

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        {{ Form::label('last_name', 'Apellidos', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                            {{ Form::text('last_name', null, ['class' => 'form-control']) }}

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                        {{ Form::label('dni', 'DNI', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                            {{ Form::text('dni', null, ['class' => 'form-control']) }}

                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        {{ Form::label('phone', 'Teléfono', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                            {{ Form::text('phone', null, ['class' => 'form-control']) }}

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        {{ Form::label('image', 'Subir Imágen', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                            {{ Form::file('image', null, ['class' => 'form-control']) }}

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </fieldset>
                       

                        <fieldset>
                            <legend style="width: auto;">Usuario</legend>
                            @include('partials.form_user')
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
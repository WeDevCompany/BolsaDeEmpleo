
@extends('layouts.app')

@section('content')
@include('partials.nav.navProfesor')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido Profesor</div>

                <div class="panel-body">
                    <p>Formulario de registro para PROFESORES</p>
                     {{ Form::open(['route' => 'profesor..store', 'method' => 'POST', 'files' => 'true']) }}
                        {!! csrf_field() !!}
                        <fieldset>
                        <legend style="width:auto;">Profesor</legend>

                        <div class="control-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <i class="material-icons prefix">account_circle</i>
                                    {{ Form::text('firstName', null) }}
                                    {{ Form::label('firstName', 'Nombre') }}

                                </div>
                            </div>
                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="control-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <i class="material-icons prefix">account_circle</i>
                                    {{ Form::text('lastName', null) }}
                                    <label for="lastName">Apellidos</label>
                                </div>
                            </div>
                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="control-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    {{ Form::text('dni', null) }}
                                    <label for="dni">DNI</label>
                                </div>
                            </div>
                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                        </div>                        

                        <div class="control-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <i class="material-icons prefix">phone</i>
                                    {{ Form::text('phone', null) }}
                                    <label for="phone">Teléfono</label>
                                </div>
                            </div>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </div>                        
                        
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        {{ Form::label('image', 'Subir Imágen', ['class' => 'col-md-12']) }}
                          
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
                            @include('generic.userfields')
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Registrar
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                
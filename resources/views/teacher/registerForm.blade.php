@extends('layouts.app')
@section('css')
    @include('keyword.teacher.registerFormKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de valbolaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection
@section('content')
@include('partials.nav.navProfesor')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-university"></i>Formulario de alta de profesores</h4>

                    </div>
                    <div class="panel-body">
                         {{ Form::open(['route' => 'profesor..store', 'method' => 'POST', 'files' => 'true', 'id' => 'teacher-register-form']) }}
                            {!! csrf_field() !!}
                            <fieldset>
                            <legend style="width:auto;">Profesor</legend>

                            <div class="control-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <i class="material-icons prefix">account_circle</i>
                                        {{ Form::text('firstName', null,['id' => "firstName"]) }}
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
                                        {{ Form::text('lastName', null,['id' => "lastName"]) }}
                                        {{ Form::label('lastName', 'Apellidos') }}
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
                                        {{ Form::text('dni', null,['id' => "dni"]) }}
                                        {{ Form::label('dni', 'DNI') }}
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
                                        {{ Form::text('phone', null,['id' => "phone"]) }}
                                        {{ Form::label('phone', 'Phone') }}
                                    </div>
                                </div>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            
                            <!-- Drag and drop -->
                            @include('partials.upload.dragDrop')

                            <div class="control-group{{ $errors->has('select') ? ' has-error' : '' }}">
                                <div class="row">
                                     <div class="input-field col-md-12">

                                        {{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control', 'multiple' => 'multiple']) }}

                                    </div>
                                </div>
                                    @if ($errors->has('select'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('select') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            </fieldset>


                            <fieldset>
                                <legend style="width: auto;">Usuario</legend>
                                @include('generic.userfields')
                            </fieldset>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 text-center">
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
@endsection

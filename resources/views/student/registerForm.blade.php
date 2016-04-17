
@extends('layouts.app')

@section('content')
@include('partials.nav.navEstudiante')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido Estudiante</div>

                <div class="panel-body">
                    <p>Formulario de registro para ESTUDIANTE</p>
                     {{ Form::open(['route' => 'estudiante..store', 'method' => 'POST', 'files' => 'true', 'id' => 'register-student-form']) }}
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend style="width:auto;">Estudiante</legend>
                            @include('student.partials.studentfields')
                        </fieldset>
                        <fieldset>
                            <legend style="width: auto;">Usuario</legend>
                            @include('generic.userfields')
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light" id="submit">
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
@endsection

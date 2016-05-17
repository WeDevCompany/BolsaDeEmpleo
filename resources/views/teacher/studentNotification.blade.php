@extends('layouts.app')
@section('content')
@include('partials.nav.navParent')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 sin-margen">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-university"></i>Validar Estudiantes en la Aplicacion</h4>
                    </div>
                    <div class="panel-body">
                        {{ Form::model($request->only(['name']), ['url' =>'profesor/notificaciones/estudiantes', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) }}
                            <div class="form-group">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) }}

                            </div>
                            <button type="submit" class="btn btn-default">Buscar</button>
                        {{ Form::close() }}
                        {{ Form::open(['url' => 'profesor/notificaciones/validStudentNotification', 'method' => 'POST']) }}
                            {!! csrf_field() !!}
                            @include('teacher.partials.tableValidateStudent')
							{{ $invalidStudent->render() }}
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                        <div class="show-responsive">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        </div>
                                        <div class="hidden-media">
                                            <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Validar</span>
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
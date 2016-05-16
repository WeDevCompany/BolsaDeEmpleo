@extends('layouts.app')
@section('content')
@include('partials.nav.navParent')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 sin-margen">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-university"></i>Estudiantes admitidos en la Aplicacion</h4>
                    </div>
                    <div class="panel-body">
                        {{ Form::model($request->only(['name']), ['url' =>'profesor/estudiante/verificados', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) }}
                            <div class="form-group">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) }}

                            </div>
                            <button type="submit" class="btn btn-default">Buscar</button>
                        {{ Form::close() }}
                        @include('teacher.partials.tableVerifiedStudent')
						{{ $verifiedStudent->appends($request->only(['name']))->render() }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer.footerWelcome')
@endsection
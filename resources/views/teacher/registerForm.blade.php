@extends('layouts.app')
@section('css')
    @include('keyword.teacher.registerFormKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection
@section('content')
@include('partials.nav.navProfesor')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 sin-margen">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-university"></i>Formulario de alta de profesores</h4>
                    </div>
                    <div class="panel-body">
                         {{ Form::open(['route' => 'profesor..store', 'method' => 'POST', 'files' => 'true', 'id' => 'teacher-register-form']) }}
                            {!! csrf_field() !!}
                            @include('teacher.partials.teacherfields')
                            <fieldset>
                                <legend style="width: auto;">Usuario</legend>
                                @include('generic.userfields')
                            </fieldset>
                            @include('generic.terms')
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
@include('partials.footer.footerWelcome')
@endsection

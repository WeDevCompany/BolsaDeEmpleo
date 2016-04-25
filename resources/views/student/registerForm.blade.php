@extends('layouts.app')
@section('css')
    @include('keyword.student.registerFormKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de valbolaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>

    {{-- Incluimos lo necesario para añadir familias profesionales --}}
    <script src="/js/funcionalidad/addFamilyCycles.js" charset="utf-8"></script>

    {{-- Incluimos lo necesario para la peticion Ajax --}}
    <script src="/js/ajax/cycles.js" charset="utf-8"></script>
@endsection
@section('content')
@include('partials.nav.navEstudiante')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 sin-margen">
            <div class="panel panel-default">
                <div class="panel-heading">Alta de estudiantes</div>

                <div class="panel-body ancho">
                     {{ Form::open(['route' => 'estudiante..store', 'method' => 'POST', 'files' => 'true', 'id' => 'student-register-form']) }}
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend style="width:auto;">Estudiante</legend>
                            @include('student.partials.studentfields')
                            <div id="clon0">
                            <section class="family-cycle">
                                <fieldset>
                                    <legend style="width: auto;">Familia Profesional</legend>
                                    @include('generic.profFamiliesfields')
                                </fieldset>
                                <fieldset id="fieldCycles" class="hidden">
                                    <legend style="width: auto;">Ciclos</legend>
                                </fieldset>
                            </div>
                            <div id="divAddFamilyCycle" class="text-center">
                                @include('student.partials.btnAddFamilyCycle')
                            </div>
                            </section>
                            <div id="clon1"></div>
                            <div id="clon2"></div>
                            <div id="clon3"></div>
                            <div id="clon4"></div>
                            <div id="clon5"></div>
                            <div id="clon6"></div>
                            <div id="clon7"></div>
                        </fieldset>
                        <fieldset>
                            <legend style="width: auto;">Usuario</legend>
                            @include('generic.userfields')
                        </fieldset>
                            @include('generic.terms')
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-login-media waves-effect waves-light" id="submit">
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

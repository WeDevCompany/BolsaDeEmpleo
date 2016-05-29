@extends('layouts.app')
@section('css')
    @include('keyword.student.registerFormKeywords')
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
                        <h4><i class="fa fa-graduation-cap"></i>Formulario de alta de estudiantes</h4>
                    </div>

                    <div class="panel-body ancho">
                         {{ Form::open(['url' => 'registro/registroEstudiante', 'method' => 'POST', 'files' => 'true', 'id' => 'student-register-form']) }}
                            {!! csrf_field() !!}
                            <fieldset>
                                <legend style="width:auto;">Estudiante</legend>
                                @include('student.partials.studentFields')
                                <section class="family-cycle">
                                    <fieldset id="fieldFamilies0">
                                        <legend style="width: auto;">Familia Profesional</legend>
                                        @include('generic.profFamiliesfields')
                                    </fieldset>
                                    <fieldset id="fieldCycles0">
                                        <legend style="width: auto;">Ciclos</legend>
                                        @include('student.partials.cyclesFields')
                                    </fieldset>
                                    <div id="divAddFamilyCycle" class="text-center">
                                        @include('student.partials.btnAddFamilyCycle')
                                    </div>
                                </section>
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
</div>
@include('partials.footer.footerWelcome')
@endsection

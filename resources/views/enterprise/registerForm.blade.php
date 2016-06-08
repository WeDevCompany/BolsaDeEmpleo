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
            <div class="panel panel-default animated zoomIn">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-building"></i>Formulario de registro de empresas</h4>
                    </div>

                <div class="panel-body">
                     {{ Form::open(['url' => 'registro/registroEmpresa', 'method' => 'POST', 'files' => 'true', 'id' => 'enterprise-register-form']) }}
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend style="width:auto;">Empresa</legend>
                            @include('enterprise.partials.enterprisefields')
                        </fieldset>
                        <fieldset id="fieldWorkAll0">
                            <legend style="width: auto;">Centro de trabajo</legend>
                            <section>
                                <fieldset id="fieldWorkCity0">
                                    <legend style="width: auto;">Datos del centro</legend>
                                    @include('enterprise.partials.workcenterfields')
                                    @include('generic.stateCitiesFields')
                                </fieldset>
                                <fieldset id="fieldResponsable0">
                                    <legend style="width: auto;">Responsable del centro</legend>
                                    @include('enterprise.partials.enterpriseresponsablefields')
                                </fieldset>
                                <div id="divAddResponsable" class="text-center">
                                    @include('enterprise.partials.btnAddEnterpriseResponsable')
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

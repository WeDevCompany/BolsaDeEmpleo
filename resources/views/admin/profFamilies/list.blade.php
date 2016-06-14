@extends('layouts.app')
@section('css')
    @include('keyword.teacher.registerFormKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection
@section('content')
@include('partials.nav.navParent')
<div class="container">
    <div class="row sin-margen">
        <div class="col-md-12 sin-margen">
            <div class="panel panel-default animated zoomIn">
                <div class="modal-content">
                    <div class="">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-2 tab-responsive">
                            <li class="active"><a href="#activos" data-toggle="tab">Familias activas</a></li>
                            <li><a href="#desactivadas" data-toggle="tab">Familias desactivadas</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="activos">
                                <div class="col-md-12 modal-header text-center">
                                    <h4>Familias profesionales activas</h4>
                                </div>
                                <div class="col-md-12">
                                    @include('partials.table.tableProfFamilies')

                                </div>
                            </div>

                            <div class="tab-pane" id="desactivadas">
                                <div class="col-md-12 modal-header text-center">
                                    <h4>Familias profesionales desactivas</h4>

                                </div>
                                <div class="col-md-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer.footerWelcome')
@endsection

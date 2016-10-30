@extends('layouts.app')
@section('css')
    @include('keyword.profFamilies.profFamiliesActivesKeyWords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection
@section('content')
@include('partials.nav.navParent')
<div class="container full-width">
    <div class="row sin-margen">
        <div class="col-md-12 sin-margen">
            <div class="panel panel-default animated zoomIn">
                <div class="panel-body modal-content">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="activos">
                            <div class="col-md-12 modal-header text-center">
                                <h4>Familias profesionales activas</h4>
                            </div>
                            <div class="col-md-12">
                                @include('partials.table.tableProfFamilies')
                                @include('partials.modal.createProfFamily')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
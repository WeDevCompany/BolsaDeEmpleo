@extends('layouts.app')
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
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
                        <h4><i class="fa fa-graduation-cap"></i> Empresas admitidas en la Aplicación</h4>
                    </div>
                    <div class="panel-body">
                        {{ Form::model($request->only(['name']), ['url' => $urlSearch, 'method' => 'GET', 'class' => 'row', 'role' => 'search', 'id' => 'search-form']) }}
                            {!! csrf_field() !!}
                            @include('partials.search.searcher')
                        {{ Form::close() }}
                        @include('partials.table.tableVerifiedEnterprise')
						{{ $verifiedEnterprise->appends($request->only(['name']))->render() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.form.formDelete')
@include('partials.footer.footerWelcome')
@endsection
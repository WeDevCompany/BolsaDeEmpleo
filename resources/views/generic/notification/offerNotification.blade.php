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
                        <h4><i class="fa fa-graduation-cap"></i> Validar Ofertas de Trabajo en la Aplicación</h4>
                    </div>
                    <div class="panel-body">
                        {{ Form::model($request->only(['name', 'filtros']), ['url' => $urlSearch, 'method' => 'GET', 'class' => 'row', 'role' => 'search', 'id' => 'search-form']) }}
                            {!! csrf_field() !!}
                            @include('partials.search.searcher')
                        {{ Form::close() }}
                        {{ Form::open(['url' => $urlPost, 'method' => 'POST']) }}
                            {!! csrf_field() !!}
                            @include('partials.table.tableValidateOffer')
							{{ $invalidOffer->appends($request->only(['name', 'filtros']))->render() }}
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                        <div class="show-responsive">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        </div>
                                        <div class="hidden-media">
                                            <i class="fa fa-btn fa-graduation-cap"></i> <span class="hidden-media">Validar</span>
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
@include('partials.form.formDelete')
@include('partials.footer.footerWelcome')
@endsection
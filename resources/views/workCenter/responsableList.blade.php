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
                        <h4><i class="fa fa-users"></i> Listado de los responsables</h4>
                    </div>
                    <div class="panel-body">
                        {{ Form::model($request->only(['name']), ['url' => $urlSearch, 'method' => 'GET', 'class' => 'row', 'role' => 'search', 'id' => 'search-form']) }}
                            {!! csrf_field() !!}
                            @include('partials.search.searcher')
                        {{ Form::close() }}
                        @include('workCenter.partials.tableResponsable')
						{{ $responsables->appends($request->only(['name']))->render() }}
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary btn-login-media  waves-effect waves-light" data-toggle="modal" data-target="#createResponsableModal">
                                    <div class="show-responsive">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </div>
                                    <div class="hidden-media">
                                        <i class="fa fa-users"></i> <span class="hidden-media">Nuevo responsable</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.modal.responsableCreate')
@include('partials.form.formDelete')
@include('partials.footer.footerWelcome')
@endsection
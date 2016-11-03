@extends('layouts.app')
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
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-university"></i>Listado de ciclos</h4>
                    </div>
                    <div class="panel-body">
	                    <div class="row">
						    <div class="col-sm-12 text-center">
						        <button type="button" class="btn btn-primary btn-login-media waves-effect waves-light" data-toggle="modal" data-target="#createCycle">
						            <div class="show-responsive">
						                <i class="fa fa-plus" aria-hidden="true"></i>
						            </div>
						            <div class="hidden-media">
						                <i class="fa fa-plus right" aria-hidden="true"></i> <span class="hidden-media">Nuevo ciclo</span>
						            </div>
						        </button>
						    </div>
						</div>
						{{ Form::model($request->only('name'), ['url' => $urlSearch, 'method' => 'GET', 'class' => 'row', 'role' => 'search', 'id' => 'search-form']) }}
                            {!! csrf_field() !!}
                            @include('partials.search.searcher')
                        {{ Form::close() }}
	                    <div class="scroll">
	                        @include('partials.table.tableCycleList')
	                    </div>
						{{ $cycles->appends($request->only('name'))->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.modal.createCycle')
@include('partials.form.formDelete')
@include('partials.footer.footerWelcome')
@endsection
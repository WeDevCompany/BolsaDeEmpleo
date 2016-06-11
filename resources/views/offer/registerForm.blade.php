@extends('layouts.app')
@section('css')
    @include('keyword.offer.offerKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de valbolaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection

@section('content')
@include('partials.nav.navParent')
	<div class="container">
        <div class="row">
            <div class="col-md-12 sin-margen  animated zoomIn">
                <div class="panel panel-default">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Formulario de creación de la oferta de trabajo</h4>
                        </div>
                        <div class="panel-body">
                             {{ Form::open(['url' => config('routes.offerEnterprise.newOfferPost'), 'method' => 'POST', 'id' => 'offer-register-form']) }}
                                {!! csrf_field() !!}
                                @include('offer.partials.offerFields')
                                @include('offer.partials.enterpriseFields')
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                            <div class="show-responsive">
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            </div>
                                            <div class="hidden-media">
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i></i> <span class="hidden-media">Crear Oferta</span>
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
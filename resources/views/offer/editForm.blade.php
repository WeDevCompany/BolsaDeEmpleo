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
            <div class="col-md-12 sin-margen">
                <div class="panel panel-default">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4><i class="fa fa-university"></i>Formulario de edición de la oferta de trabajo</h4>
                        </div>
                        <div class="panel-body">
                             {{ Form::model($offer, ['url' => \Auth::user()->rol . 'oferta/editar', 'method' => 'POST', 'id' => 'offer-register-form']) }}
                                {!! csrf_field() !!}
                                {{ Form::hidden('idOffer', $offer->id, ['class' => 'form-control']) }}
                                @include('offer.partials.offerFields')
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                            <div class="show-responsive">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            </div>
                                            <div class="hidden-media">
                                                <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Editar Oferta</span>
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
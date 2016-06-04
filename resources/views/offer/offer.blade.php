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
	<main>
		<div class="container">
			<div class="row">
	            <div class="panel panel-default sin-margen ancho">
		    		<div class="row sin-margen extra-padding">
		            	<!-- Titulo -->
		                <div class="modal-header text-center">
		                    <h4 class="title" data-title="{!!mb_strtoupper($offer->title)!!}">{!!mb_strtoupper($offer->title)!!}</h4>
		                </div>
				    	@include('offer.partials.offerInformationOnlyOneOffer')
				    <div class="row extra-padding-bottom">
				    	@if(\Auth::user()->rol == "empresa")
                            @include('offer.partials.adminAndEnterpriseBtn')

                        @elseif(\Auth::user()->rol == "administrador")
                            @include('offer.partials.adminAndEnterpriseBtn')

                        @elseif(\Auth::user()->rol == "profesor")
                            @include('offer.partials.teacherBtn')

                        @elseif(\Auth::user()->rol == "estudiante")
                            @include('offer.partials.studentBtn')

                        @endif
				    </div>
				</div>
			</div>
		</div>
	</main>
@include('partials.footer.footerWelcome')
@endsection

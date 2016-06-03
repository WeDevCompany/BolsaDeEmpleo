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
		    <div class="row sin-margen extra-padding">
            	<!-- Titulo -->
                <div class="modal-header text-center">
                    <h4 class="title" data-title="{!!mb_strtoupper($offer->title)!!}">{!!mb_strtoupper($offer->title)!!}</h4>
                </div>
                <!-- Empresa y logar de trabajo-->
                <div class="row sin-margen">
                	<div class="row sin-margen">
                    <div class="col-md-12 sin-margen text-center">
                    	<!-- Empresa -->
                    	<div class="col-sm-6" data-enterprise="{!! $offer->enterpriseName !!}"><p><i class="fa fa-building" aria-hidden="true"></i> <b>Empresa: </b><a href="{!! (isset($offer->web)) ? $offer->web : 'https://www.google.es/#q='.$offer->enterpriseName !!}" target="_blank">{!! $offer->enterpriseName !!} <i class="fa fa-link" aria-hidden="true"></i></a></p></div>
                    	<!-- Lugar -->
                		<div class="col-sm-6 offset6" data-city="{!! $offer->cityName !!}"><p><i class="fa fa-location-arrow" aria-hidden="true"></i> <b>Lugar: </b><a href="https://www.google.es/maps/place/{!! $offer->cityName !!}" target="_blank" data-lugar="{!! $offer->cityName !!}">{!! $offer->cityName !!} <i class="fa fa-link" aria-hidden="true"></i></a></p></div>
                    </div>
                </div>
                </div>
		    </div>
		    <div class="row sin-margen">
				<div class="col-md-8 hoverable box" data-description="{!! $offer->description !!}">
					<p><b>Descripción: </b></p><p class="descripcion">{!! $offer->description !!}</p>
				</div>
				@include('partials.nav.navParentLeft')
		    </div>
		    @include('offer.partials.offerInformation')
		</div>
	</main>
@include('partials.footer.footerWelcome')
@endsection

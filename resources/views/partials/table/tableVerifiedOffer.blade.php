<div class="row"></div>
<div class="row sin-padding">
    <div class="col-sm-6">
        <p><b>Total ofertas de trabajo:</b> {{$verifiedOffer->count()}}</p>
    </div>
    <div class="col-sm-6">
        <p>
            <b>Total de páginas:</b> {{$verifiedOffer->lastPage()}}
        </p>
    </div>
</div>
<main class="animated zoomIn">
    <div class="scroll">
    {{-- Comprobamos si existen ofertas verificadas --}}
        @if(isset($verifiedOffer))
            {{-- recorremos las ofertas verificadas --}}
            @foreach($verifiedOffer as $offer)
                <div class="col-md-12 oferta extra-padding-bottom mask hoverable scroll z-depth-1" tabindex="{{ $offer->id }}">
                    <div class="col-md-12" data-id="{{(isset($offer->id)) ? $offer->id : 0 }}" id="{{(isset($offer->id)) ? $offer->id : 0 }}">
                        <div class="row" title="{!! $offer->title !!}">
                            <h5><a href="/{{\Auth::user()->rol}}/oferta/{{ $offer->id }}" class="titulo btn-flat waves-effect hoverable"> <i class="fa fa-eye" aria-hidden="true"></i> {!! $offer->title !!}</a></h5>
                        </div>
                        <div class="row extra-padding-bottom">
                            <div class="col-sm-6" data-enterprise="{!! $offer->enterpriseName !!}"><b>Empresa: </b><a href="{!! (isset($offer->web)) ? $offer->web : 'https://www.google.es/#q='.$offer->enterpriseName !!}" target="_blank">{!! $offer->enterpriseName !!} <i class="fa fa-link" aria-hidden="true"></i></a></div>
                            <div class="col-sm-6 offset6" data-city="{!! $offer->cityName !!}"><b>Lugar: </b><a href="https://www.google.es/maps/place/{!! $offer->cityName !!}" target="_blank" data-lugar="{!! $offer->cityName !!}">{!! $offer->cityName !!} <i class="fa fa-link" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="row" data-description="{!! $offer->description !!}">
                            <p><b>Descripción de la oferta:</b></p><span class="descripcion">{!! $offer->description !!}</span>
                        </div>
                        @include('offer.partials.offerInformation')
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12 oferta extra-padding-bottom mask hoverable">
            <h5>No hay ofertas</h5>
            </div>
        @endif
    </div>
</main>
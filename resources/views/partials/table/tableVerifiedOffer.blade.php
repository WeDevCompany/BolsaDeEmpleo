<div class="container">
    <div class="row sin-padding">
        <div class="col-md-12 mobile-full-width">
            <main class="animated zoomIn">
                <div class="scroll">
                    {{-- Comprobamos si existen ofertas verificadas --}}
                    @if(isset($verifiedOffer))
                        {{-- recorremos las ofertas verificadas --}}
                        @foreach($verifiedOffer as $offer)
                            <div class="col-md-12 media oferta extra-padding-bottom mask hoverable z-depth-1 father-link scroll" tabindex="{{ $offer->id }}"><a href="/{{\Auth::user()->rol}}/oferta/{{ $offer->id }}" class=" offer-link">
                                    <div class="media" data-id="{{(isset($offer->id)) ? $offer->id : 0 }}" id="{{(isset($offer->id)) ? $offer->id : 0 }}">
                                        <a href="{!! (isset($offer->web)) ? $offer->web : 'https://www.google.es/#q='.$offer->enterpriseName !!}" target="_blank" class="media-left col-md-2 extra-padding">
                                            <img src="/img/imgUser/{!! $offer->carpeta !!}/{!! $offer->image !!}" alt="imagen {!! $offer->enterpriseName !!}" class="img-circle hoverable img-responsive"></img>
                                        </a>
                                        <div class="row media-body" title="{!! $offer->title !!}">
                                            <h5><a href="{!! (\Auth::user()->rol == 'administrador' && \Request::is('profesor/oferta/verificadas')) ? '/profesor/oferta/' . $offer->id : '/' . \Auth::user()->rol . '/oferta/' . $offer->id !!}" class="titulo waves-effect media-heading"> {!! $offer->title !!}</a></h5>
                                            <div class="row extra-padding-bottom">
                                                <div class="col-sm-6" data-enterprise="{!! $offer->enterpriseName !!}"><b>Empresa: </b><a href="{!! (isset($offer->web)) ? $offer->web : 'https://www.google.es/#q='.$offer->enterpriseName !!}" target="_blank">{!! $offer->enterpriseName !!}</a></div>
                                                <div class="col-sm-6 offset6 min-extra-padding-bottom" data-city="{!! $offer->cityName !!}"><b>Lugar: </b><a href="https://www.google.es/maps/place/{!! $offer->cityName !!}" target="_blank" data-lugar="{!! $offer->cityName !!}">{!! $offer->cityName !!}</a></div>
                                                <div class="col-sm-12 offset6" data-description="{!! $offer->description !!}">
                                                    <span class="descripcion">{!! $offer->description !!}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"><b>Duración: </b>{!! $offer->duration !!}</div>
                                                <div class="col-sm-2 offset3"><b>Tipo: </b>{!! $offer->kind !!}</div>
                                                <div class="col-sm-3 offset6"><b>Experiencia: </b>{!!$offer->experience!!}</div>
                                                <div class="col-sm-3 offset9"><b>Creación: </b><time datetime="{{ (isset($offer->updated_at)) ? $offer->updated_at: $offer->created_at }}"></time>{{ (isset($offer->updated_at)) ? $offer->updated_at: $offer->created_at }}</div>
                                            </div>

                                        </div>


                                        {{-- @include('offer.partials.offerInformation')--}}
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
        </div>
    </div>
</div>
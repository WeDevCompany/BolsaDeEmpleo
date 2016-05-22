<div class="row"></div>
<div class="row sin-padding">
    <div class="col-sm-6">
        <p><b>Total ofertas por validar:</b> {{$verifiedOffer->count()}}</p>
    </div>
    <div class="col-sm-6">
        <p>
            <b>Total de páginas:</b> {{$verifiedOffer->lastPage()}}
        </p>
    </div>
</div>
<main>
    <div class="scroll">
    {{-- Comprobamos si existen ofertas verificadas --}}
        @if(isset($verifiedOffer))
            {{-- recorremos las ofertas verificadas --}}
            @foreach($verifiedOffer as $offer)
                <div class="col-md-12 oferta extra-padding-bottom mask hoverable" tabindex="{{ $offer->id }}">
                    <div class="col-md-12" data-id="{{(isset($offer->id)) ? $offer->id : 0 }}" id="{{(isset($offer->id)) ? $offer->id : 0 }}">
                        <div class="row" title="{!! $offer->title !!}">
                            <h5><a href="#" class="titulo btn-flat waves-effect hoverable">{!! $offer->title !!} <i class="fa fa-link" aria-hidden="true"></i></a></h5>
                        </div>
                        <div class="row extra-padding-bottom">
                            <div class="col-sm-6" data-enterprise="{!! $offer->enterpriseName !!}"><b>Empresa: </b><a href="#">{!! $offer->enterpriseName !!} <i class="fa fa-link" aria-hidden="true"></i></a></div>
                            <div class="col-sm-6 offset6" data-city="{!! $offer->cityName !!}"><b>Lugar: </b><a href="https://www.google.es/maps/place/{!! $offer->cityName !!}" target="_blank" data-lugar="{!! $offer->cityName !!}">{!! $offer->cityName !!} <i class="fa fa-link" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="row" data-description="{!! $offer->description !!}">
                            <p><b>Descripción de la oferta:</b></p><span class="descripcion">{!! $offer->description !!}</span>
                        </div>
                        <div class="row extra-padding-top">
                            <div class="col-sm-4"><b>Duración: </b>{!! $offer->duration !!}</div>
                            <div class="col-sm-4 offset4"><b>Tipo: </b>{!! $offer->kind !!}</div>
                            <div class="col-sm-4 offset8"><b>Nivel: </b>{!! $offer->level !!}</div>
                        </div>
                        <div class="row extra-padding-top">
                            <div class="col-sm-4"><b>Se busca contratar: </b>{{ $offer->wanted }}</div>
                            <div class="col-sm-4 offset4"><b>Contratados en la actualidad: </b>{!! $offer->hired !!}</div>
                            <div class="col-sm-4 offset8"><b>Fecha de vencimiento: </b>{{ $offer->dueDate }}</div>
                        </div>
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
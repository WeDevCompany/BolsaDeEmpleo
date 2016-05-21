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
        @foreach($verifiedOffer as $offer)
            <div class="col-md-12 oferta extra-padding-bottom mask hoverable" tabindex="{{ $offer->id }}">
                <div class="col-md-12" data-id="{{ $offer->id }}" id="{!! $offer->id !!}">
                    <div class="row" title="{!! $offer->title !!}">
                        <h5><a href="#" class="titulo btn-flat waves-effect hoverable">{!! $offer->title !!}</a></h5>
                    </div>
                    <div class="row extra-padding-bottom">
                        <div class="col-sm-6" data-enterprise="{!! $offer->enterpriseName !!}"><b>Empresa: </b><a href="#">{!! $offer->enterpriseName !!}</a></div>
                        <div class="col-sm-6 offset6" data-city="{!! $offer->enterpriseName !!}"><b>Lugar: </b>{!! $offer->enterpriseName !!}</div>
                    </div>
                    <div class="row" data-description="{!! $offer->description !!}">
                        <span class="descripcion">{!! $offer->description !!}</span>
                    </div>
                    <div class="row extra-padding-top">
                        <div class="col-sm-4"><b>Duración: </b>{!! $offer->duration !!}</div>
                        <div class="col-sm-4 offset4"><b>Tipo: </b>{!! $offer->kind !!}</div>
                        <div class="col-sm-4 offset8"><b>Nivel: </b>{!! $offer->level !!}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
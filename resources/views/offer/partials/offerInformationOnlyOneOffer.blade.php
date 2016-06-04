<!-- Empresa y lugar de trabajo-->
<div class="col-md-12 sin-margen">
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
<div class="col-md-12">
    <fieldset class="box-description hoverable">
        <legend>Descripción</legend>
            <div class="col-md-12 sin-margen extra-padding-bottom">
                <div class="col-md-12" data-description="{!! $offer->description !!}">
                    <p class="descripcion">{!! $offer->description !!}</p>
                </div>
            </div>
    </fieldset>
</div>
<div class="col-md-12">
    <fieldset class="box-requirements hoverable">
        <legend>Requisitos</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4"><p><b>Duración: </b>{!! $offer->duration !!}</p></div>
                        <div class="col-md-4"><p><b>Tipo: </b>{!! $offer->kind !!}</p></div>
                        <div class="col-md-4"><p><b>Experiencia: </b>{!!$offer->experience!!}</p></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 extra-padding-top">
                        <div class="col-md-4"><p><b>Nivel: </b>{!! $offer->level !!}</p></div>
                        <div class="col-md-4"><p><b>Se busca contratar: </b>{{ $offer->wanted }}</p></div>
                        <div class="col-md-4"><p><b>Contratados en la actualidad: </b>{!! $offer->hired !!}</p></div>
                    </div>
                </div>
            @if($offer->tagCount)
                <div class="row extra-padding-top">
                    <div class="col-md-12 text-center">
                        @foreach($offer->tagCount as $tags => $value)
                           <a href="https://www.google.es/#q={!! $value !!}" target="_blank" class="hoverable"><span class="label label-primary"><i class="fa fa-hashtag" aria-hidden="true"></i>{!! $value !!}</span></a>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(isset($offer->newOthers))
                <div class="row extra-padding">
                    <div class="col-md-12 text-center">
                    @foreach($offer->newOthers as $other => $value)
                           <a href="https://www.google.es/#q={!! $value !!}" target="_blank" class="hoverable"><span class="label label-default"><i class="fa fa-hashtag" aria-hidden="true"></i>{!! $value !!}</span></a>
                    @endforeach
                    </div>
                </div>
            @else
                <div class="row extra-padding-top">
                    <div class="col-md-12">
                        {!!$offer->others !!}
                    </div>
                </div>
            @endif
    </fieldset>
</div>
<div class="row">
    <div class="extra-padding-top col-md-12 text-center">
        <div class="col-sm-4">
            <p><b>Fecha de creación: </b><time datetime="{{ (isset($offer->updated_at)) ? $offer->updated_at: $offer->created_at }}"></time>{{ (isset($offer->updated_at)) ? $offer->updated_at: $offer->created_at }}</p>
        </div>
        <div class="col-md-4">
            <p><b>Fecha de vencimiento: </b><time datetime="{{ $offer->dueDate }}"></time>{{ $offer->dueDate }}</p>
        </div>
        <div class="col-md-4">
            <p><b>Suscriptores: </b>{!! (isset($offer->subcriptionCount)) ? $offer->subcriptionCount : "0"!!}</p>
        </div>
    </div>
</div>
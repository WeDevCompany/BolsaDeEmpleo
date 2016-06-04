<div class="row extra-padding-top">
    <div class="col-sm-3"><b>Duración: </b>{!! $offer->duration !!}</div>
    <div class="col-sm-3 offset3"><b>Tipo: </b>{!! $offer->kind !!}</div>
    <div class="col-sm-3 offset6"><b>Experiencia: </b>{!!$offer->experience!!}</div>
    <div class="col-sm-3 offset9"><b>Nivel: </b>{!! $offer->level !!}</div>
</div>
<div class="row extra-padding-top">
    <div class="col-sm-3"><b>Se busca contratar: </b>{{ $offer->wanted }}</div>
    <div class="col-sm-3 offset3"><b>Contratados en la actualidad: </b>{!! $offer->hired !!}</div>
    <div class="col-sm-3 offset9"><b>Fecha de creación: </b><time datetime="{{ (isset($offer->updated_at)) ? $offer->updated_at: $offer->created_at }}"></time>{{ (isset($offer->updated_at)) ? $offer->updated_at: $offer->created_at }}</div>
    <div class="col-sm-3 offset9"><b>Fecha de vencimiento: </b><time datetime="{{ $offer->dueDate }}"></time>{{ $offer->dueDate }}</div>
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
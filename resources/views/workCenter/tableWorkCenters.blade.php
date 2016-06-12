<div class="row"></div>
<main class="animated zoomIn">
    <div class="scroll">
    {{-- Comprobamos si existen ofertas verificadas --}}
        @if(isset($workCenters))
            {{-- recorremos las ofertas verificadas --}}
            @foreach($workCenters as $key => $workCenter)
                <div class="{{(count($workCenters) % 2 != 0 && count($workCenters) == $key+1) ? 'col-md-12' : 'col-md-6' }} oferta extra-padding-bottom mask hoverable scroll z-depth-1" tabindex="{{ $workCenter->id }}">
                    <div class="col-md-12" data-id="{{(isset($workCenter->id)) ? $workCenter->id : 0 }}" id="{{(isset($workCenter->id)) ? $workCenter->id : 0 }}">
                        <div class="row extra-padding-bottom" title="{!! $workCenter->name !!}">
                            <h5 class="text-center ">{!! $workCenter->name !!}</a></h5>
                        </div>
                        <div class="row extra-padding-bottom">
                            <div class="col-sm-7" data-enterprise="{!! $workCenter->address !!}"><b>Empresa: </b><a href="{!! (isset($workCenter->web)) ? $workCenter->web : 'https://www.google.es/#q='.$workCenter->address !!}" target="_blank">{!! $workCenter->enterpriseName !!} <i class="fa fa-link" aria-hidden="true"></i></a></div>
                            <div class="col-sm-5" data-city="{!! $workCenter->cityName !!}"><b>Lugar: </b><a href="https://www.google.es/maps/place/{!! $workCenter->cityName !!}" target="_blank" data-lugar="{!! $workCenter->cityName !!}">{!! $workCenter->cityName !!} <i class="fa fa-link" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="row extra-padding-bottom">
                            <div class="col-sm-12" data-enterprise="{!! $workCenter->road !!} {!! $workCenter->address !!}"><b>Dirección: </b><a href="{!! 'https://www.google.es/#q='.$workCenter->road . ' ' . $workCenter->address !!}" target="_blank">{!! $workCenter->road !!} {!! $workCenter->address !!} <i class="fa fa-link" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="row extra-padding-bottom">
                            <div class="col-sm-7" data-enterprise="{!! $workCenter->email !!}"><b>Email: </b>{!! $workCenter->email !!}</div>
                            <div class="col-sm-5" data-city="{!! $workCenter->phone1 !!}"><b>Teléfono: </b>{!! $workCenter->phone1 !!}</div>
                        </div>
                        <div class="row extra-padding-bottom">
                            @if($workCenter->principalCenter == 1)
                                <div class="col-sm-4" data-enterprise="{!! $workCenter->principalCenter !!}"><b>Centro principal de trabajo</b></div>
                            @endif
                            @if(isset($workCenter->phone2))
                                <div class="{!! ($workCenter->principalCenter = 1) ? 'col-sm-4' : 'col-sm-6' !!}" data-city="{!! $workCenter->phone1 !!}"><b>Teléfono secundario: </b>{!! $workCenter->phone2 !!}</div>
                            @endif
                            @if(isset($workCenter->fax))
                                <div class="{!! ($workCenter->principalCenter = 1) ? 'col-sm-4' : 'col-sm-6' !!}" data-city="{!! $workCenter->phone1 !!}"><b>Fax: </b>{!! $workCenter->fax !!}</div>
                            @endif
                        </div>
                        @include('workCenter.workCenterResponsable')
                        @include('workCenter.workCenterBtnActions')
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12 oferta extra-padding-bottom mask hoverable">
            <h5>No hay workCenters</h5>
            </div>
        @endif
    </div>
</main>
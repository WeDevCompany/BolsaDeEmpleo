<div class="row"></div>
<main class="animated zoomIn">
    <div class="scroll">
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary btn-login-media waves-effect waves-light" data-toggle="modal" data-target="#createWorkCenter">
                <div class="show-responsive">
                    <i class="fa fa-comment" aria-hidden="true"></i>
                </div>
                <div class="hidden-media">
                <i class="fa fa-building-o"></i> <span class="hidden-media">Nuevo Centro de trabajo</span>
                </div>
            </button>
        </div>
        @include('partials.modal.workCenterCreate')
    {{-- Comprobamos si existen ofertas verificadas --}}
        @if(isset($workCenters) && !$workCenters->isEmpty())
            {{-- recorremos las ofertas verificadas --}}
            @foreach($workCenters as $key => $workCenter)
                <div class="col-md-12 oferta extra-padding-bottom mask hoverable scroll z-depth-1" tabindex="{{ $workCenter->id }}">
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
                        @include('partials.modal.workCenterEdit')
                        @include('partials.modal.workCenterDelete')
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12 text-center extra-padding-bottom mask">
            <h5>No hay Centros de trabajo</h5>
            </div>
        @endif
    </div>
</main>
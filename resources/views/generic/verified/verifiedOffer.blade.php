@extends('layouts.app')
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>

    <script src="/js/funcionalidad/offerLink.js" charset="utf-8"></script>
@endsection
@section('content')
@include('partials.nav.navParent')
<div class="container-card background-offer-title">
    <div class="container  page-content">
        <div class="modal-header text-center">
            <h4 class="animated"><i class="fa fa-graduation-cap"></i> Ofertas de trabajo @if(isset($titulo)) {{$titulo}}  @else admitidas en la aplicación @endif</h4>
            <div class="panel-body">
                <div class="col-sm-8  col-md-offset-2">
                    {{ Form::model($request->only(['name', 'filtros']), ['url' => $urlSearch, 'method' => 'GET', 'class' => 'row', 'role' => 'search', 'id' => 'search-form']) }}
                        {!! csrf_field() !!}
                        @include('partials.search.searcher')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container container-card">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             @include('partials.table.tableVerifiedOffer')
            {{ $verifiedOffer->appends($request->only(['name', 'filtros']))->render() }}
        </div>
    </div>
</div>

@include('partials.footer.footerWelcome')
@endsection


@extends('layouts.app')
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection
@section('content')
@include('partials.nav.navParent')
<div class="container">
    <div class="row">
        <div class="col-md-12 sin-margen">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-graduation-cap"></i> Ofertas de trabajo admitidas en la Aplicación</h4>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['url' => $urlSearch, 'method' => 'POST', 'class' => 'row', 'role' => 'search', 'id' => 'search-form']) }}
                            {!! csrf_field() !!}
                            @include('partials.search.searcher')
                        {{ Form::close() }}
                        @include('partials.table.tableVerifiedOffer')
						{{ $verifiedOffer->render() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer.footerWelcome')
@endsection
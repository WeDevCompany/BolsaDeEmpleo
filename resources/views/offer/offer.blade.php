@extends('layouts.app')
@section('css')
    @include('keyword.offer.offerKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de valbolaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-12 sin-margen">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4>$offer->title</h4>
                    </div>
                </div>
           	</div>
        </div>
    </div>
@include('partials.footer.footerWelcome')
@endsection
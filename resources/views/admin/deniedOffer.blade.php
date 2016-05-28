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
                        <h4><i class="fa fa-graduation-cap"></i>Ofertas Borradas de la Aplicación</h4>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['url' =>'administrador/oferta/denegadas-buscador', 'method' => 'POST', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search', 'id' => 'search-form']) }}
                            {!! csrf_field() !!}
                            <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) }}

                            </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {{ Form::close() }}
                        {{ Form::open(['url' => 'administrador/oferta/restaurar', 'method' => 'POST']) }}
                            {!! csrf_field() !!}
                            @include('partials.table.tableDeniedOffer')
                            {{ $deniedOffer->render() }}
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                        <div class="show-responsive">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        </div>
                                        <div class="hidden-media">
                                            <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Restaurar</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer.footerWelcome')
@endsection
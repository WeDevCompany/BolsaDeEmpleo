@extends('layouts.app')
@section('content')

   <div class="container extra-padding">
    <div class="row">
        <div class="col-md-12 sin-margen">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4>Oops! 404 Not Found</h4>
                    </div>

                    <div class="panel-body ancho">
                        <div class="error-template">
                            <div class="error-details">
                                Recurso no encontrado
                            </div>
                            <br>
                            <div class="error-actions">
                                <a href="/" class="btn btn-primary btn-lg btn-block"><i class="fa fa-home" aria-hidden="true"></i></span> Llevame al inicio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <!--  Script que controla el número de veces que entras -->
   <script src="/js/funcionalidad/security.js" type="text/javascript" charset="utf-8" async defer></script>
@endsection

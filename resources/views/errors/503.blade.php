@extends('layouts.app')
@section('content')

<div class="container extra-padding full-width">
    <div class="row">
        <div class="col-md-12 sin-margen">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4>Oops! 503 Service unavailable</h4>
                    </div>

                    <div class="panel-body ancho">
                        <div class="error-template">
                            <div class="error-details">
                                Lamentablemente el servicio no esta disponible
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

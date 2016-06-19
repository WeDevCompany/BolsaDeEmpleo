@extends('layouts.app')
@section('content')
    <div class="container extra-padding full-width extra-margin-1">
        <div class="row">
            <div class="col-md-12 sin-margen">
                <div class="panel panel-default">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4>Debe ser validado</h4>
                        </div>

                        <div class="panel-body ancho">
                            <div class="error-template">
                                <div class="error-details">
                                    <p>Disculpe las molestias pero usted, aún no ha sido validado por un <b>{{$rol}}</b>.
                                    Le rogamos sea paciente cuando sea validado, le llegará un email, confirmando su validación.</p>
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

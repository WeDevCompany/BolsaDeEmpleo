@extends('layouts.app')
@section('content')
    <div class="container full-width">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template text-center">
                <h1>Debe ser validado</h1>
                <div class="error-details">
                    Disculpe las molestias pero usted, aún no ha sido validado por un {{$rol}}.<br>
                    Le rogamos sea paciente cuando sea validado, le llegará un email, confirmando su validación.
                </div>
                <br>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary btn-lg btn-block waves-effect waves-light"><i class="fa fa-home" aria-hidden="true"></i></span> Llevame al inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

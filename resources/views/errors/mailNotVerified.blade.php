@extends('layouts.app')
@section('css')
<META HTTP-EQUIV="Refresh" CONTENT="5; URL="/">
@endsection
@section('content')
    <div class="container full-width">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template text-center">
                <h1>Email sin confirmar</h1>
                <div class="error-details">
                    Por favor, revise su email, o haga click en el enlace para reenviar el email de confirmación.
                </div>
                <br>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary btn-lg btn-block  btn btn-success waves-effect waves-light"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></span> Confirmar email</a>
                    <a href="/" class="btn btn-primary btn-lg btn-block waves-effect waves-light"><i class="fa fa-home" aria-hidden="true"></i></span> Llevame al inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

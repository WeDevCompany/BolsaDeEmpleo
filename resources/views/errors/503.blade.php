@extends('layouts.app')
@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>Oops! 503 Service unavailable</h1>
                <div class="error-details">
                    Lamentablemente el servicio no esta disponible
                </div>
                <br>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-home"></span> Llevame a mi perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
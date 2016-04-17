@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>Oops! 500 Internal server error</h1>
                <div class="error-details">
                    Lo sentimos pero el servidor no está disponible
                </div>
                <br>
                <div class="error-actions">
                    <a href="mailto:30010978@murciaeduca.es" class="btn btn-primary btn-lg btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i> 30010978@murciaeduca.es</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
@include('partials.nav.navAdmin')
    <main class="main-admin">
        <div class="main-wrapper">
            <section>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">Bienvenido Administrador</div>

                            <div class="panel-body">
                                Esta es la página principal de ADMINISTRADOR
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
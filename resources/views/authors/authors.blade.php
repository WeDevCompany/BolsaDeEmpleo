@extends('layouts.app')
@section('scripts')

@endsection

@section('content')
    <div class="container navbar hidden"></div>
        <div class="row">
            <!--Cards section-->
            <div class="container page-content">
            <div class="container-fluid centrado">
                <h3>¿Quiénes Somos?</h3>
            </div>
                <div class="col-md-4">
                    <!--Rotating card - Card-01 -->
                    <div class="card-wrapper hoverable">
                        <div id="card-1" class="card-rotating effect__click">

                            <!--Front Side-->
                            <div class="face card-rotating__front z-depth-1">
                                <div class="card-up">
                                    <img src="{{url("/img/authors/emmanuel-fondo.jpg")}}" class="img-responsive">
                                </div>
                                <div class="avatar"><img src="{{url("/img/authors/emmanuel.jpg")}}" class="img-circle img-responsive">
                                </div>
                                <h4>Emmanuel Valverde Ramos</h4>
                                <h5>Desarrollador Back-End</h5>

                                <!--Triggering button-->
                                <div class="text-center">
                                    <a class="rotate-btn" data-card="card-1"><i class="fa fa-repeat"> Leer más</i></a>
                                </div>

                            </div>
                            <!--/.Front Side-->

                            <!--Back Side-->
                            <div class="face card-rotating__back z-depth-1">
                                <h4>Emmanuel Valverde Ramos</h4>
                                <p class="card-content text-center">Jefe de proyecto
                                    <br> Conocimientos en:</p>
                                <hr> PHP (PDO, MVC, Laravel,...)
                                <br> MySQl
                                <br> Java
                                <br> C
                                <br> Jquery
                                <br> CSS
                                <br>

                                <!--Triggering button-->
                                <a class="rotate-btn" data-card="card-1"><i class="fa fa-undo"> Volver</i></a>
                                <div class="sm-container">
                                    <ul class="list-inline card-sm">
                                        <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="icons-sm tw-ic" href="https://twitter.com/evrtrabajo" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="icons-sm li-ic"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--/.Back Side-->

                        </div>
                    </div>
                    <!--/.Rotating card-->
                </div>
                <div class="col-md-4">
                    <!--Rotating card - Card-02 -->
                    <div class="card-wrapper hoverable">
                        <div id="card-2" class="card-rotating effect__click">

                            <!--Front Side-->
                            <div class="face card-rotating__front z-depth-1">
                                <div class="card-up">
                                    <img src="{{url("/img/authors/emmanuel-fondo.jpg")}}" class="img-responsive">
                                </div>
                                <div class="avatar"><img src="{{url("/img/authors/emmanuel.jpg")}}" class="img-circle img-responsive">
                                </div>
                                <h4>Emmanuel Valverde Ramos</h4>
                                <h5>Desarrollador Back-End</h5>

                                <!--Triggering button-->
                                <div class="text-center">
                                    <a class="rotate-btn" data-card="card-2"><i class="fa fa-repeat"> Leer más</i></a>
                                </div>

                            </div>
                            <!--/.Front Side-->

                            <!--Back Side-->
                            <div class="face card-rotating__back z-depth-1">
                                <h4>Emmanuel Valverde Ramos</h4>
                                <p class="card-content text-center">Jefe de proyecto
                                    <br> Conocimientos en:</p>
                                <hr> PHP (PDO, MVC, Laravel,...)
                                <br> MySQl
                                <br> Java
                                <br> C
                                <br> Jquery
                                <br> CSS
                                <br>

                                <!--Triggering button-->
                                <a class="rotate-btn" data-card="card-2"><i class="fa fa-undo"> Volver</i></a>
                                <div class="sm-container">
                                    <ul class="list-inline card-sm">
                                        <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="icons-sm tw-ic" href="https://twitter.com/evrtrabajo" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="icons-sm li-ic"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--/.Back Side-->

                        </div>
                    </div>
                    <!--/.Rotating card-->
                </div>
                <div class="col-md-4">
                    <!--Rotating card - Card-03 -->
                    <div class="card-wrapper hoverable">
                        <div id="card-3" class="card-rotating effect__click">

                            <!--Front Side-->
                            <div class="face card-rotating__front z-depth-1">
                                <div class="card-up">
                                    <img src="{{url("/img/authors/emmanuel-fondo.jpg")}}" class="img-responsive">
                                </div>
                                <div class="avatar"><img src="{{url("/img/authors/emmanuel.jpg")}}" class="img-circle img-responsive">
                                </div>
                                <h4>Emmanuel Valverde Ramos</h4>
                                <h5>Desarrollador Back-End</h5>

                                <!--Triggering button-->
                                <div class="text-center">
                                    <a class="rotate-btn" data-card="card-3"><i class="fa fa-repeat"> Leer más</i></a>
                                </div>

                            </div>
                            <!--/.Front Side-->

                            <!--Back Side-->
                            <div class="face card-rotating__back z-depth-1">
                                <h4>Emmanuel Valverde Ramos</h4>
                                <p class="card-content text-center">Jefe de proyecto
                                    <br> Conocimientos en:</p>
                                <hr> PHP (PDO, MVC, Laravel,...)
                                <br> MySQl
                                <br> Java
                                <br> C
                                <br> Jquery
                                <br> CSS
                                <br>

                                <!--Triggering button-->
                                <a class="rotate-btn" data-card="card-3"><i class="fa fa-undo"> Volver</i></a>
                                <div class="sm-container">
                                    <ul class="list-inline card-sm">
                                        <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="icons-sm tw-ic" href="https://twitter.com/evrtrabajo" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="icons-sm li-ic"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--/.Back Side-->

                        </div>
                    </div>
                    <!--/.Rotating card-->
                </div>
            </div>
            <!-- /.Cards -->
            <div class="text-center">
                <a href="javascript:window.history.back();" class="btn btn-primary btn-login-media  waves-effect waves-light" id="volver">
                    <div class="show-responsive">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </div>
                    <div class="hidden-media">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> <span class="hidden-media">Volver</span>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection

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
                                <div class="avatar"><img src="{{url("/img/authors/emmanuel.jpg")}}" class="img-circle img-responsive" alt="Emmanuel Valverde Ramos <evrtrabajo@gmail.com>">
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
                                <p class="card-content text-center sin-padding">
                                    <br> Experto en:</p>
                                <hr> PHP [POO, PDO, MVC, Laravel]
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
                                        <li><a class="icons-sm git-ic" href="https://github.com/khru"><i class="fa fa-github" target="_blank"> </i></a></li>
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
                                    <img src="{{url("/img/authors/eduardo-fondo.jpg")}}" class="img-responsive">
                                </div>
                                <div class="avatar"><img src="{{url("/img/authors/eduardo.jpg")}}" class="img-circle img-responsive">
                                </div>
                                <h4>Eduardo López Pardo</h4>
                                <h5>Desarrollador Back-End</h5>

                                <!--Triggering button-->
                                <div class="text-center">
                                    <a class="rotate-btn" data-card="card-2"><i class="fa fa-repeat"> Leer más</i></a>
                                </div>

                            </div>
                            <!--/.Front Side-->

                            <!--Back Side-->
                            <div class="face card-rotating__back z-depth-1">
                                <h4>Eduardo López Pardo</h4>
                                <p class="card-content text-center">
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
                                        <li><a class="icons-sm tw-ic" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
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
                                    <img src="{{url("/img/authors/pedro-fondo.jpg")}}" class="img-responsive">
                                </div>
                                <div class="avatar"><img src="{{url("/img/authors/pedro.jpg")}}" class="img-circle img-responsive">
                                </div>
                                <h4>Pedro Hernandez-mora de Fuentes</h4>
                                <h5>Desarrollador Back-End</h5>

                                <!--Triggering button-->
                                <div class="text-center">
                                    <a class="rotate-btn" data-card="card-3"><i class="fa fa-repeat"> Leer más</i></a>
                                </div>

                            </div>
                            <!--/.Front Side-->

                            <!--Back Side-->
                            <div class="face card-rotating__back z-depth-1">
                                <h4>Pedro Hernandez-mora de Fuentes</h4>
                                <p class="card-content text-center">
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
                                        <li><a class="icons-sm tw-ic" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
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
            <div class="text-center extra-padding">
                <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">bolsa de empleo</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="" property="cc:attributionName" rel="cc:attributionURL"><b>Emmanuel Valverde Ramos</b>, <b>Pedro Hernández-Mora de fuentes</b>, <b>Eduardo López Pardo</b></a> is licensed under a<br /><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Reconocimiento-NoComercial-SinObraDerivada 4.0 Internacional License</a>.
            </div>
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

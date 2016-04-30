@extends('layouts.app')
@section('scripts')

@endsection

@section('content')
    <div class="container navbar hidden"></div>
        <div class="row">
            <!--Cards section-->
            <div class="container page-content container-card">
            <div class="container-fluid centrado">
                <h3>¿Quienes Somos?</h3>
            </div>
                <div class="col-md-4">
                    <!--Rotating card-->
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
                        <div class="testimonial-card z-depth-1 hoverable">
                            <a href="{{ url(config('routes.registro.registroEmpresa')) }}">
                                <div class="mask waves-effect waves-light">
                                    <div class="card-up g light-blue">
                                    </div>
                                    <div class="avatar"><img src="{{ url('/img/global/empresario_off.png')}}">
                                    </div>
                                    <div class="card-content">
                                        <h5>Empresas</h5>
                                        <p><i class="fa fa-quote-left"></i> Esta aplicación tiene como objetivo principal que las empresas dedicadas a todo tipo de negocios publiquen las ofertas de trabajo y/o FCT para obtener estudiantes altamente cualificados en distintas áreas, lo cual beneficiará tanto a la empresa como al alumno. <i class="fa fa-quote-right"></i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="testimonial-card z-depth-1 hoverable">
                            <a href="{{ url(config('routes.registro.registroProfesor')) }}">
                                <div class="mask waves-effect waves-light">
                                    <div class="card-up yellow">
                                    </div>
                                    <div class="avatar"><img src="{{ url('/img/global/profesor.jpg')}}" class="img-circle img-responsive">
                                    </div>
                                    <div class="card-content">
                                        <h5>Profesores</h5>
                                        <p><i class="fa fa-quote-left"></i> En esta web los profesores podrán gestionar toda la información sobre ofertas de trabajo y/o prácticas para sus estudiantes ya sean de su rama o de otra, permitiendo que sean los mismos estudiantes quienes se suscriban dichas ofertas, facilitando esto su labor de selección de empresas. <i class="fa fa-quote-right"></i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>
            </div>
            <!-- /.Cards -->

        </div>
    </div>
@endsection

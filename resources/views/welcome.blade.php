@extends('layouts.app')
@section('css')
    @include('keyword.index')
@endsection()
@section('content')

    @include('partials.nav.navWelcome')

    @include('partials.carrousel.carrouselWelcome')

        <!-- titulo de la section-->

        <!--Cards section-->
        <div class="container page-content container-card">
        <div class="container-fluid centrado">
            <h3>¿Qué hacemos?</h3>
        </div>
            <div class="col-md-4">
                    <div class="testimonial-card z-depth-1 hoverable">
                        <a href="{{ url(config('routes.registro.registroEstudiante')) }}">
                            <div class="mask waves-effect waves-light">
                                <div class="card-up red">
                                </div>
                                <div class="avatar"><img src="{{ url('/img/global/estudiante_off.png')}}" class="img-circle img-responsive">
                                </div>
                                <div class="card-content">
                                    <h5>Alumnos</h5>
                                    <p><i class="fa fa-quote-left"></i> Esta bolsa de trabajo es una gran oportunidad para los estudiantes que tengan interés en trabajar o simplemente estén buscando una empresa donde hacer las prácticas, puesto que les ofrece la oportunidad de encontrar las ofertas que más se ajustan a sus conocimientos. <i class="fa fa-quote-right"></i></p>
                                </div>
                            </div>
                        </a>
                    </div>
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

        @include('partials.parallax.parallaxWelcome')

        <!-- Contact information-->
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 centrado">
                    <h3><i class="fa fa-paper-plane"></i> Información de contacto</h3>
                    <p class="lead"><strong><i class="fa fa-envelope"></i> Email del centro:</strong> <a href="mailto:30010978@murciaeduca.es?subject=Bolsa%20Empleo">30010978@murciaeduca.es</a></p>
                    <p class="lead"><strong><i class="fa fa-phone"></i> Teléfono:</strong> 968266922</p>
                    <p class="lead"><strong><i class="fa fa-fax"></i> Fax:</strong> 968342085</p>
                    <p class="lead"><strong><i class="fa fa-globe"></i> Web:</strong> <a target="_blank" href="http://www.iescierva.net">www.iescierva.net</a></p>
                    <p class="lead"><strong><i class="fa fa-link"></i> Moodle:</strong> <a target="_blank" href="http://moodle.iescierva.net/">moodle.iescierva.net</a></p>
                    <p class="lead"><strong><i class="fa fa-envelope-o"></i> Email de la bolsa de empleo:</strong> <a href="mailto:bolsa@iescierva.net?subject=Bolsa%20Empleo">bolsa@iescierva.net</a></p>
                    <p class="lead hide">
                        <i class="fa fa-map-marker"></i>
                        <a target="_blank" href="https://maps.google.com/maps?ll=37.961896,-1.133224&amp;z=15&amp;t=m&amp;hl=es-ES&amp;gl=US&amp;mapclient=apiv3&amp;cid=5114021630982515677">Ver en Google Maps</a>
                    </p>


              </div>
              <div class="col-md-6 map card-panel hoverable wow fadeInUp" id="map">
              <!-- Librería de google maps + API key -->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGyfVQZ3XHG7GRD51OlVNw1kACBKrg8Ww" type="text/javascript"></script>
                <!-- Script que inicializa el mapa -->
               <script src="/js/maps.js" type="text/javascript"></script>
              </div>
            </div>
        </div>

        @include('partials.footer.footerWelcome')

@endsection

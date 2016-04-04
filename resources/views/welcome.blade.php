@extends('layouts.app')

@section('content')

    @include('partials.nav.navWelcome')

    @include('partials.carrousel.carrouselWelcome')

        <!--Cards section-->
        <div class="container page-content container-card">
            <div class="col-md-4">
                    <div class="testimonial-card z-depth-1 hoverable">
                        <a href="{{ url('/estudiante') }}">
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
                        <a href="{{ url('/empresa') }}">
                            <div class="mask waves-effect waves-light">
                                <div class="card-up g light-blue">
                                </div>
                                <div class="avatar"><img src="{{ url('/img/global/empresario_off.png')}}">
                                </div>
                                <div class="card-content">
                                    <h5>Empresas</h5>
                                    <p><i class="fa fa-quote-left"></i> En esta aplicación las empresas dedicadas a todo tipo de negocios podrán publicar las ofertas de trabajo y/o FCT para obtener a estudiantes altamente cualificados en distintas áreas, lo cual beneficiará tanto a la empresa como al alumno. <i class="fa fa-quote-right"></i></p>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="testimonial-card z-depth-1 hoverable">
                        <a href="{{ url('/profesor') }}">
                            <div class="mask waves-effect waves-light">
                                <div class="card-up yellow">
                                </div>
                                <div class="avatar"><img src="{{ url('/img/global/profesor.jpg')}}" class="img-circle img-responsive">
                                </div>
                                <div class="card-content">
                                    <h5>Profesores</h5>
                                    <p><i class="fa fa-quote-left"></i> En esta web los profesores podrán gestionar toda la información sobre ofertas de trabajo y/o prácticas para sus estudiantes ya sean de su rama o de otra, permitiendo que sean los mismos estudiantes quienes se suscriban dichas ofertas. <i class="fa fa-quote-right"></i></p>
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

        </div>

        @include('partials.footer.footerWelcome')

@endsection

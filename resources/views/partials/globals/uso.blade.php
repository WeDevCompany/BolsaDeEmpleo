@extends('layouts.app')

@section('content')

    @include('partials.nav.navWelcome')

     @include('partials.carrousel.carrouselWelcome')



         <!--Cards Section-->
         <div class="container page-content container-card">
            <!--Card 1-->
            <a href="{{ url('/uso') }}">
                <div class="col-md-4">
                    <div class="elegant-card z-depth-1 hoverable">
                        <!-- Image wrapper -->
                        <div class="card-up view overlay">
                            <h5 class="card-label"></h5>
                            <img src="http://d1hw6n3yxknhky.cloudfront.net/022673605_prevstill.jpeg" class="img-responsive">
                            <div class="mask waves-effect waves-light"> </div>
                        </div>


                        <!-- Content -->
                        <div class="card-content">
                            <h5>Alumnos</h5>
                            <br>
                            <p>TEXTO PROVISIONAL</p>
                            <p>En esta sección, te explicaremos como sacar el potencial de esta web, como inscribirte en ciertas ofertas y todo lo que necesites saber. </p><br>
                            <p style="text-align:right">Click Me...</p>
                        </div>
                        <!-- Footer -->
                        <div class="card-footer red">

                        </div>
                    </div>
                </div>
            </a>
            <!--/.Card 1-->
               <!--Card 2-->
            <a href="{{ url('/uso') }}">
                <div class="col-md-4">
                    <div class="elegant-card z-depth-1 hoverable">
                        <!-- Image wrapper -->
                        <div class="card-up view overlay">
                            <h5 class="card-label"></h5>
                            <img src="http://img.youtube.com/vi/V_ubJtcVpns/maxresdefault.jpg" class="img-responsive">
                            <div class="mask waves-effect waves-light"> </div>
                        </div>


                        <!-- Content -->
                        <div class="card-content">
                            <h5>Empresas</h5>
                            <br>
                            <p>TEXTO PROVISIONAL</p>
                             <p>¿Eres una empresa? Aquí tienes toda la información que necesitas, como conseguir trabajadores cualificados, ofertar empleo...</p><br>
                            <p style="text-align:right">Click Me...</p>
                        </div>
                        <!-- Footer -->
                        <div class="card-footer light-blue">

                        </div>
                    </div>
                </div>
            </a>
            <!--/.Card 2-->
               <!--Card 3-->
            <a href="{{ url('/uso') }}">         
                <div class="col-md-4">
                    <div class="elegant-card z-depth-1 hoverable">
                        <!-- Image wrapper -->
                        <div class="card-up view overlay">
                            <h5 class="card-label"></h5>
                            <img src="https://www.tes.com/sites/default/files/computer%20class.jpg" class="img-responsive">
                            <div class="mask waves-effect waves-light"> </div>
                        </div>


                        <!-- Content -->
                        <div class="card-content">
                            <h5>Profesores</h5><br>
                             <p>TEXTO PROVISIONAL</p>
                             <p>Hello Teacher¡ En este apartado encontrarás todo lo que debes saber sobre el manejo de esta web.</p><br>
                            <p style="text-align:right">Click Me...</p>
                           
                        </div>
                        <!-- Footer -->
                        <div class="card-footer yellow">

                        </div>
                    </div>
                </div>
            </a>
            <!--/.Card 3-->
        </div>
            <!--/.Cards Section-->


        @include('partials.parallax.parallaxWelcome')

        <!-- Contact information-->
        <div class="container-fluid">

        </div>

        @include('partials.footer.footerWelcome')

@endsection

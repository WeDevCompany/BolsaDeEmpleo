@extends('layouts.app')

@section('content')

    @include('partials.nav.navWelcome')

    <!-- Carousel -->
        <div id="carousel1" class="carousel slide carousel-fade hoverable" style="height: 100%;">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel1" data-slide-to="0" class="active">
                </li>
                <li data-target="#carousel1" data-slide-to="1"></li>
                <li data-target="#carousel1" data-slide-to="2"></li>
                <li data-target="#carousel1" data-slide-to="3"></li>
                <li data-target="#carousel1" data-slide-to="4"></li>
                <li data-target="#carousel1" data-slide-to="5"></li>
                <li data-target="#carousel1" data-slide-to="6"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner z-depth-2" role="listbox">

                <!-- 1 slide -->
                <div class="item active">
                    <div class="carousel-caption">
                        <div class="verticalcenter">
                            <div class="animated fadeInDown">
                                <h4>Si eres un estudiante y deseas trabajar o buscar una empresa donde hacer practicas</h4>
                                <h5>No dudes en darte alta y trabajar con empresas punteras en tú sector, demuestra de que eres capaz y crece junto </h5>
                                <a href="/empresa" target="_blank" class="btn btn-default btn-stc waves-effect waves-light"><i class="fa fa-user right"></i>Registrate</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <!-- 2 slide -->
                <div class="item">
                    <div class="view overlay hm-blue-slight">
                        <a>
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown" style="z-index: 1">
                                <h5>Lorem ipsum dolor sit amet</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <!-- 3 slide -->
                <div class="item">
                    <div class="carousel-caption">
                        <div class="verticalcenter">
                            <div class="animated fadeInDown">
                                <h4>Si eres una empresa y buscas trabajadores</h4>
                                <h5>Si necesitas trabajadores cualificados y con altos conocimientos en su área de especialización no dude en registrarse</h5>
                                <a href="/empresa" target="_blank" class="btn btn-default btn-stc waves-effect waves-light"><i class="fa fa-user right"></i>Registrate</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <!-- 4 slide -->
                <div class="item">
                    <div class="view overlay hm-blue-slight">
                        <a>
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown">
                                <h5>Lorem ipsum dolor sit amet</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <!-- 5 slide -->
                <div class="item">
                    <div class="view overlay hm-blue-slight">
                        <a>
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown">
                                <h5>Lorem ipsum dolor sit amet</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <!-- 6 slide -->
                <div class="item">
                    <div class="view overlay hm-blue-slight">
                        <a>
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown">
                                <h5>Lorem ipsum dolor sit amet</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

                <!-- 7 slide -->
                <div class="item">
                    <div class="view overlay hm-blue-slight">
                        <a>
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                        <div class="carousel-caption hidden-xs">
                            <div class="animated fadeInDown">
                                <h5>Lorem ipsum dolor sit amet</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.item -->

            </div>
            <!-- /.carousel-inner -->

            <!-- Controls -->
            <a class="left carousel-control new-control" href="#carousel1" role="button" data-slide="prev">
                <span class="fa fa fa-angle-left waves-effect waves-light"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="right carousel-control new-control" href="#carousel1" role="button" data-slide="next">
                <span class="fa fa fa-angle-right waves-effect waves-light"></span>
                <span class="sr-only">Siguiente</span>
            </a>

        </div>
        <!-- /.carousel -->

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

        <!-- Parallax effect -->
        <section class="parallax" id="parallax-1">
            <div class="container text-center">
                <div class="carousel-caption">
                        <div class="verticalcenter white">
                            <div class="animated fadeInDown">
                                <h4>Si eres una empresa y buscas trabajadores</h4>
                                <h5>Si necesitas trabajadores cualificados y con altos conocimientos en su área de especialización no dude en registrarse</h5>
                                <a href="/empresa" target="_blank" class="btn btn-default btn-stc waves-effect waves-light"><i class="fa fa-user right"></i>Registrate</a>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
        <!-- / .Parallax -->

        <!-- Contact information-->
        <div class="container-fluid">

        </div>

        <!--Footer section-->
        <footer class="page-footer elegant-color center-on-small-only">
            <div class="container-fluid">
                <div class="row">

                    <!--First column-->
                    <div class="col-md-3 col-xs-offset-1">
                        <p class="column-title white-text">About Material Design</p>
                        <div class="column-content">
                            <p class="thin-100 white-text">Material Design (codenamed Quantum Paper) is a design language developed by Google.
                                <br>
                                <br> Material Design for Bootstrap (MDB) is a powerful Material Design UI KIT for most popular HTML, CSS, and JS framework - Bootstrap.</p>
                        </div>
                    </div>
                    <!--/.First column-->

                    <!--Second column-->
                    <div class="col-md-2 col-md-offset-1">
                        <p class="column-title white-text">USEFUL LINKS</p>

                        <ul>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">About MDB</a></li>
                            <li><a href="#">Suport</a></li>
                            <li><a href="#">Bug Report</a></li>
                            <li><a href="#">License</a></li>
                        </ul>

                    </div>
                    <!--/.Second column-->

                    <!--Third column-->
                    <div class="col-md-2">
                        <p class="column-title white-text">MDB Free Popular</p>

                        <ul>
                            <li><a href="#">Animations</a></li>
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">Carousel</a></li>
                            <li><a href="#">Buttons</a></li>
                            <li><a href="#">Parallax</a></li>
                        </ul>
                    </div>
                    <!--/.Third column-->

                    <!--Fourth column-->
                    <div class="col-md-2">
                        <p class="column-title white-text">MDB Pro Popular</p>

                        <ul>
                            <li><a href="#">E-commerce</a></li>
                            <li><a href="#">Cards</a></li>
                            <li><a href="#">SideNav</a></li>
                            <li><a href="#">MaterialBox</a></li>
                            <li><a href="#">Social Buttons</a></li>
                        </ul>
                    </div>
                    <!--/.Fourth column-->

                </div>
            </div>
            <div class="call-to-action inline-block">
                <ul class="list-inline">
                    <li>
                        <h5 class="white-text">Register for free </h5></li>
                    <li> <a class="btn btn-danger waves-effect waves-light">GET STARTED!</a></li>
                </ul>
            </div>

            <div class="social-section text-center">
                <a class="btn-sm-full fb-bg rectangle waves-effect waves-light"><i class="fa fa-facebook"> </i> <span>Facebook</span> </a>
                <a class="btn-sm-full tw-bg rectangle waves-effect waves-light"><i class="fa fa-twitter"> </i> <span>Twitter</span></a>
                <a class="btn-sm-full gplus-bg rectangle waves-effect waves-light"><i class="fa fa-google-plus"> </i> <span>Google +</span></a>
                <a class="btn-sm-full comm-bg rectangle waves-effect waves-light"><i class="fa fa-comments"> </i> <span>Forum</span></a>
            </div>


            <div class="footer-copyright text-center rgba-black-light">
                <div class="container-fluid">
                    © 2015 Copyright: <a href="http://www.MDBootstrap.com"> MDBootstrap.com </a>
                </div>
            </div>

        </footer>
        <!--/.Footer section-->

@endsection

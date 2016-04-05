<!-- Probar el menú con navbar-fixed-top -->
    <nav class="navbar black navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand waves-effect waves-light" href="{{ url('/') }}">
                <i class="fa fa-rocket"></i>
                    Bolsa de empleo
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav  waves-effect waves-light">
                    <li><a href="{{ url('/home') }}">Inicio</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" class=" waves-effect waves-light">Login</a></li>
                        <li class = "dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Registro<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/estudiante') }}">Estudiante</a></li>
                                <li><a href="{{ url('/profesor') }}">Profesor</a></li>
                                <li><a href="{{ url('/empresa') }}">Empresa</a></li>
                            </ul>
                        </li>
                    @else
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="images/profile" alt="" class="img-responsive img-circle img-navegador">
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Cambiar Imagen</a></li>
                                <li><a href="#">Cambiar Contraseña</a></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
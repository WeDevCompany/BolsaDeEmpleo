<!-- Probar el menú con navbar-static-top -->
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
                <a class="logo navbar-brand waves-effect waves-light" href="{{ url('/') }}">
                    <img style="height: 125%" src="{{ url('/img/icon.png') }}" alt="Bolsa-de-empleo-logo">

                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                 <ul class="nav navbar-nav">
                    <li><a class="waves-effect waves-light subrayado" href="{{ url(config('routes.index')) }}">Inicio</a></li>
                    <li><a class="waves-effect waves-light subrayado" href="{{ url('/uso') }}">FAQ</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{{ url('/login') }}" class=" waves-effect waves-light subrayado"><i class="fa fa-sign-in"></i> Login</a></li>
                    <li class = "dropdown">
                        <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
                            Registro<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url(config('routes.registro.registroEstudiante')) }}"><i class="fa fa-graduation-cap right"></i> Estudiante</a></li>
                            <li><a href="{{ url(config('routes.registro.registroProfesor')) }}"><i class="fa fa-university right"></i> Profesor</a></li>
                            <li><a href="{{ url(config('routes.registro.registroEmpresa')) }}"><i class="fa fa-building right"></i> Empresa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Probar el menú con navbar-static-top -->
    {{-- Si la ruta es / muestra un menú transparente y fijo sino --}}
        <nav class="navbar black navbar-default {{ Request::is('/') ? ' navbar-fixed-top navbar-transparent' : 'navbar-static-top black' }}" role="navigation">
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
                     <!-- Without session -->
                    <li><a class="waves-effect waves-light subrayado" href="{{ url(config('routes.index')) }}">Inicio</a></li>
                    <!-- With session -->
                    @if (!Auth::guest())
                        @if(\Auth::user()->rol === "administrador")
                            @include('partials.nav.navAdministrador')
                        @elseif (\Auth::user()->rol === "profesor")
                            @include('partials.nav.navProfesor')
                        @elseif(\Auth::user()->rol === "empresa")
                            @include('partials.nav.navEmpresa')
                        @elseif(\Auth::user()->rol === "estudiante")
                            <!-- Estudiante -->
                            @include('partials.nav.navEstudiante')
                        @endif
                    @endif
                <!-- Left Side Of Navbar END -->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    {{-- Si NO estas logeado --}}
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" class=" waves-effect waves-light subrayado"><i class="fa fa-sign-in"></i> Login</a></li>
                        <li class = "dropdown">
                            <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
                                Registro<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url(config('routes.registro.registroEstudiante')) }}"><i class="fa fa-graduation-cap right"></i> Estudiante</a></li>
                                <li><a href="{{ url(config('routes.registro.registroProfesor')) }}"><i class="fa fa-university right" aria-hidden="true"></i> Profesor</a></li>
                                <li><a href="{{ url(config('routes.registro.registroEmpresa')) }}"><i class="fa fa-building right" aria-hidden="true"></i> Empresa</a></li>
                            </ul>
                        </li>

                    {{-- Si Estas logeado --}}
                    @else
                        <div class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="{{ url('/img/imgUser/' . \Auth::user()->carpeta . '/' .  \Auth::user()->image) }}" alt="Imagen de perfil" class="img-responsive img-circle img-navegador">
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu perfil">
                                <li><a href="{{ url(\Auth::user()->rol . config('routes.perfil')) }}"><i class="fa fa-wrench right" aria-hidden="true"></i> Editar perfil</a></li>
                                <li><a href="#"><i class="fa fa-key right" aria-hidden="true"></i> Cambiar contraseña</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out right" aria-hidden="true"></i> Logout</a></li>
                            </ul>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

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
                    @include('partials.nav.navUserProfile')
                </ul>
            </div>
        </div>
    </nav>

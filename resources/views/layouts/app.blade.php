<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bolsa de empleo - I.E.S. Ingeniero de la cierva</title>

<!-- Material Design Icons -->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Font Awesome -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font­awesome/4.5.0/css/font­awesome.min.css">

<!-- Bootstrap core CSS -->

<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Material Design Bootstrap -->

<link href="{{ url('css/mdb.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    <!-- Probar el menú con navbar-fixed-top -->
    <nav class="navbar black navbar-default navbar-static-top">
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    Bolsa de Empleo
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Inicio</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>

<!-- Material Design Bootstrap -->
<script type="text/javascript" src="{{ url('js/mdb.js') }}"></script>

<!-- Script que permite crear un procesador de texto en un textarea -->
<script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>

@yield('scripts')
</body>
</html>

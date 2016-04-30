<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta name="encoding" charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Etiquetas para el Posicionamiento SEO -->
    <meta name="Bolsa de empleo IES Ingeniero de la cierva" content="Bolsa de empleo IES Ingeniero de la cierva" />
    <meta name="author" content="Emmanuel Valverde Ramos" />
    <meta name="author" content="Eduardo López Pardo" />
    <meta name="author" content="Pedro Hernandéz-Mora de Fuentes" />
    <meta name="organization" content="IES Ingeniero de la cierva" />
    <!-- Etiquetas para el Posicionamiento SEO -->
    @yield('css')
    <title>Bolsa de empleo - I.E.S. Ingeniero de la cierva @if(isset($zona))| {{$zona}} @endif</title>
    <noscript>Su navegador no tiene activado javascript, por favor activelo y recarge la página</noscript>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ url('img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('img/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- . /favicon -->

    <!-- Estilos diseñados por nosotros -->
    <link href="{{ url('css/normalize.css') }}" rel="stylesheet">

    <!-- Font Awsome Icons -->
    <link title="estilo-personalizado" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="{{ url('css/mdb.css') }}" rel="stylesheet">

    <!-- Estilos de dropzone -->
    <link href="{{ url('css/dropzone.css') }}" rel="stylesheet">

    <!-- Estilos para TagBox -->
    <link href="{{ url('css/tag-basic-style.css') }}" rel="stylesheet">

    <!-- Estilos diseñados por nosotros -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

    <!-- Estilos para chosen (select multiple) -->
    <link rel="stylesheet" href="{{ url('plugin/chosen/chosen.css') }}">


</head>
<body id="app-layout">

    @yield('content')

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>

    <!-- jQuery Validation -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js" type="text/javascript"></script>

    <!-- Script TagBox -->
    <script src="{{ url('js/tagging.min.js') }}"></script>

    <!-- Script Jquery -->
    <script src="{{ url('js/jquery-2.2.3.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="{{ url('js/mdb.js') }}"></script>

    <!-- Script que permite crear un procesador de texto en un textarea -->
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>

    <!-- Script que permite crear un dropzone -->
    <script src="{{ asset('/js/dropzone/dropzone.js') }}"></script>

    <!-- Script que permite el back-to-top -->
    <script src="{{ asset('/js/back-to-top.js') }}"></script>

    <!-- Script queautomatiza el carrusel -->
    <script src="{{url("/js/carrusel.js")}}" type="text/javascript" charset="utf-8"></script>

    @yield('scripts')

</body>
</html>

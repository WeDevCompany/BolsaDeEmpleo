<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Bolsa de empleo - I.E.S. Ingeniero de la cierva</title>

<!-- Font Awsome Icons (Preenir el error de descarga XML) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- Material Design Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Font Awesome -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font­awesome/4.5.0/css/font­awesome.min.css">

<!-- Bootstrap core CSS -->
<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Material Design Bootstrap -->
<link href="{{ url('css/mdb.css') }}" rel="stylesheet">

<!-- Estilos de dropzone -->
<link href="{{ url('css/dropzone.css') }}" rel="stylesheet">

<!-- Estilos diseñados por nosotros -->
<link href="{{ url('css/style.css') }}" rel="stylesheet">

</head>
<body id="app-layout">

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

<!-- Script que permite crear un dropzone -->
<script src="{{ asset('/js/dropzone/dropzone.js') }}"></script>

<!-- Script que permite el back-to-top -->
<script src="{{ asset('/js/back-to-top.js') }}"></script>

@yield('scripts')

</body>
</html>

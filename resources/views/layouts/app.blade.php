<!DOCTYPE html>
<html lang="es-ES">
<!--
    @autor Emmanuel Valverde Ramos
        mail: evrtrabajo@gmail.com
        twitter: @evrtrabajo
        linkedin: https://es.linkedin.com/in/emmanuel-valverde-ramos

    @autor Pedro Hernández-Mora de fuentes
        mail: pedrohdezmora@gmail.com
        twitter: @
        linkedin: https://es.linkedin.com/in/pedro-hernández-mora-de-fuentes-97496a122

    @version 2016-09-18 1.0

La propiedad intelectual de este proyecto pertenece a los autores de este, No se permite ninguna modificación de este código sin el consentimiento de los autores, cualquier modificación del código fuente de esta web sin el consentimiento de sus autores implica una violación de los derechos de autor de esta aplicación.

Fima:
------------------------------------------------------------------------------

$$\      $$\           $$$$$$$\
$$ | $\  $$ |          $$  __$$\
$$ |$$$\ $$ | $$$$$$\  $$ |  $$ | $$$$$$\ $$\    $$\
$$ $$ $$\$$ |$$  __$$\ $$ |  $$ |$$  __$$\\$$\  $$  |
$$$$  _$$$$ |$$$$$$$$ |$$ |  $$ |$$$$$$$$ |\$$\$$  /
$$$  / \$$$ |$$   ____|$$ |  $$ |$$   ____| \$$$  /
$$  /   \$$ |\$$$$$$$\ $$$$$$$  |\$$$$$$$\   \$  /
\__/     \__| \_______|\_______/  \_______|   \_/

------------------------------------------------------------------------------
-->
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
    <!-- Etiquetas del protocolo Open Graph FACEBOOK-->
    <meta property="og:title" content="Bolsa de empleo del IES ingeniero de la cierva" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:image" content="{{ url('img/favicon/ms-icon-144x144.png') }}" />
    <meta property="og:site_name" content="bolsaempleo" />
    <!-- Fin de las etiquetas del protocolo Open Graph -->
    <!-- META ETIQUETAS TWITTER -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="./">
    <meta name="twitter:title" content="Bolsa de empleo IES cierva">
    <meta name="twitter:description" content="Si eres estudiante del IES ingeniero de la cierva o una empresa buscado nuevos talentos no dudes en buscarlos aqui. ">
    <meta name="twitter:image" content="{{ url('img/favicon/ms-icon-144x144.png') }}">
    <meta name="twitter:creator" content="@evrtrabajo">
    <!-- fin de las meta etiquetas de twitter -->

    <!-- Etiquetas para el Posicionamiento SEO -->
    @yield('css')
    <title>Bolsa de empleo - I.E.S. Ingeniero de la cierva @if(isset($zona))| {{$zona}} @endif</title>
    <noscript>Su navegador no tiene activado javascript, por favor activelo y recarge la página</noscript>
    <!-- Favicon -->
    <!-- APPLE -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('img/favicon/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('img/favicon/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('img/favicon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('img/favicon/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('img/favicon/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('img/favicon/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('img/favicon/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('img/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('img/favicon/apple-touch-icon-180x180.png') }}">
    <!-- FIN DE APPLE -->

    <!-- ICONOS -->
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ url('img/favicon/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/favicon/favicon-16x16.png') }}">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <!-- FIN DE ICONOS -->

    <!-- Progressive web app -->
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('img/favicon/mstile-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="img/favicon/favicon.ico">

    <!-- ¿Es la web capaz de soportar mobiles? -->
    <meta name="mobile-web-app-capable" content="yes">
    <!-- . /favicon -->

    <!-- Estilos diseñados por nosotros para normalizar -->
    <link href="{{ url('css/normalize.css') }}" rel="stylesheet">

    <!-- Font Awsome Icons -->
    <!--link title="estilo-personalizado" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"-->

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font-Awsome -->
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="{{ url('css/mdb.css') }}" rel="stylesheet">

    <!-- Estilos de dropzone -->
    <link href="{{ url('css/dropzone.css') }}" rel="stylesheet">

    <!-- Estilos para TagBox -->
    <link href="{{ url('css/tag-basic-style.css') }}" rel="stylesheet">

    <!-- Estilos para chosen (select multiple) -->
    <link rel="stylesheet" href="{{ url('plugin/chosen/chosen.css') }}">

    <!-- Estilos de spin.js -->
    <link href="{{ url('css/spin.css') }}" rel="stylesheet">

    <!-- Estilos diseñados por nosotros -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

</head>
<body id="app-layout">

    @yield('content')

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>

    <!-- jQuery Validation -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js" type="text/javascript"></script>

    <!-- Objeto spin -->
    <script src="{{ url('/js/spin/spin.js') }}" type="text/javascript"></script>

    <!-- Objeto de ajax -->
    <script src="{{ url('/js/ajax/ajax.js') }}" type="text/javascript"></script>

    <!-- Script TagBox -->
    <script src="{{ url('js/tagging.min.js') }}" type="text/javascript" charset="utf-8"></script>

    <!-- Script Jquery -->
    <script src="{{ url('js/jquery-2.2.3.js') }}" type="text/javascript" charset="utf-8"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}" type="text/javascript" charset="utf-8"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="{{ url('js/mdb.js') }}" type="text/javascript" charset="utf-8"></script>

    <!-- Script que permite crear un procesador de texto en un textarea -->
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8"></script>

    <!-- Script que permite crear un dropzone -->
    <script src="{{ asset('/js/dropzone/dropzone.js') }}" type="text/javascript" charset="utf-8"></script>

    <!-- Script que permite el back-to-top -->
    <script src="{{ asset('/js/back-to-top.js') }}" type="text/javascript" charset="utf-8"></script>

    <!-- Script con la logica spin -->
    <script src="{{ asset('/js/spin/spin.min.js') }}" type="text/javascript" charset="utf-8"></script>

    <!-- Script que automatiza el carrusel -->
    <script src="{{url('/js/carrusel.js')}}" type="text/javascript" charset="utf-8"></script>

    <!-- Script que calcula las notificaciones -->
    @if (!Auth::guest())
        @if(\Auth::user()->rol === "administrador" || \Auth::user()->rol === "profesor" )
            <script src="{{url('/js/funcionalidad/notifications.js')}}" type="text/javascript" charset="utf-8"></script>
        @endif
    @endif
    <!-- Script que obtiene las notificaciones -->
    <script src="{{url('/js/funcionalidad/getNotifications.js')}}" type="text/javascript" charset="utf-8"></script>

    <!-- Script que permite a la imagen ponerse blanca con un mouse over -->
    <script src="{{url('/js/funcionalidad/imgPerfilMouseOver.js')}}" type="text/javascript" charset="utf-8"></script>

    <!-- Script que hace random el fondo -->
    <script src="{{url('/js/funcionalidad/backgroundPattern.js')}}" type="text/javascript" charset="utf-8"></script>

    <!-- Script que gestiona la sesión  -->
    <script src="{{url('/plugin/jquerysession.js')}}" type="text/javascript" charset="utf-8"></script>

    <!-- Script que evita el conflicto con los modales  -->
    <script src="{{url('/js/funcionalidad/removeConflictiveCalss.js')}}" charset="utf-8"></script>

    <!-- Script que evita el conflicto con los modales  -->
    <script src="/js/funcionalidad/fixCkeditor.js" charset="utf-8"></script>

    <!-- Script que valida formularios  -->
    <script src="/js/validaciones/validate/validate.min.js" charset="utf-8"></script>

    <script src="/js/validaciones/validate/additional-methods.js" charset="utf-8"></script>

    <script src="/js/validaciones/validate/localization/messages_es.js" charset="utf-8"></script>

    <script src="{{url('/js/modernizr-custom.js')}}" charset="utf-8"></script>

    <script src="{{url('/js/particles.js')}}" charset="utf-8"></script>

    <script src="{{url('/js/particlesConfig.js')}}" charset="utf-8"></script>

    <!-- Script que hace random el fondo -->
    @include('partials.session.sessionFlash')

    @yield('scripts')

</body>
</html>

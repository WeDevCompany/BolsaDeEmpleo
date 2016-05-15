<!-- ADMIN -->
@if(\Auth::user()->rol === "administrador")
    <li><a class="waves-effect waves-light subrayado" href="{{ url(config('routes.admin.statistics')) }}"><i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
@endif
<!-- Profesor -->
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
        <span class="badge social-counter right notificacion">10</span> <i class="fa fa-bell" aria-hidden="true"></i> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu"  aria-labelledby="notificaciones">
        <!-- ADMIN -->
        @if(\Auth::user()->rol === "administrador")
            <li><a href="{{ url(config('routes.admin.teacherNotification')) }}"><i class="fa fa-university right"  aria-hidden="true"></i><span class="badge social-counter right notificacion">5</span> Profesores</a></li>
        @endif
        <!-- PROFESORES -->
        <li><a href="{{ url(config('routes.teacher.studentNotification')) }}"><i class="fa fa-graduation-cap right"  aria-hidden="true"></i><span class="badge social-counter right notificacion">5</span> Alumnos</a></li>
        <li><a href="{{ url(config('routes.teacher.offertNotification')) }}"><i class="fa fa-cart-plus right"  aria-hidden="true"></i><span class="badge social-counter right notificacion">5</span> Ofertas</a></li>
    </ul>
</a></li>
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
     Alumnos<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu"  aria-labelledby="alumnos">
        <!-- ADMIN -->
        @if(\Auth::user()->rol === "administrador")
            <li><a href="{{ url(config('routes.admin.allStudents')) }}"><i class="fa fa-graduation-cap right" aria-hidden="true"></i> Todos</a></li>
        @endif
        <!-- PROFESORES -->
        <li><a href="{{ url(config('routes.teacher.allVerifiedStudents')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidos</a></li>
        <li><a href="{{ url(config('routes.teacher.allDeniedStudents')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegados</a></li>
    </ul>
</a></li>
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
     Ofertas<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="ofertas">
        <!-- ADMIN -->
        @if(\Auth::user()->rol === "administrador")
            <li><a href="{{ url(config('routes.admin.allOffers')) }}"><i class="fa fa-cart-plus right" aria-hidden="true"></i> Todas</a></li>
        @endif
        <!-- PROFESORES -->
        <li><a href="{{ url(config('routes.teacher.allVerifiedOffers')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidas</a></li>
        <li><a href="{{ url(config('routes.registro.registroProfesor')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegadas</a></li>
    </ul>
</a></li>
<!-- ADMIN -->
@if(\Auth::user()->rol === "administrador")
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
     Profesores<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="profesores">
        <li><a href="{{ url(config('routes.admin.allTeachers')) }}"><i class="fa fa-university right" aria-hidden="true"></i> Todas</a></li>
        <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidas</a></li>
        <li><a href="{{ url(config('routes.admin.allDeniedTeachers')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegadas</a></li>
    </ul>
</a></li>
@endif

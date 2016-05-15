<!-- Admin -->
<!-- Profesor -->
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
        <span class="badge social-counter right notificacion">10</span> <i class="fa fa-bell" aria-hidden="true"></i> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="notificaciones">
        <li><a href="{{ url(config('routes.teacher.studentNotification')) }}"><i class="fa fa-graduation-cap right"  aria-hidden="true"></i><span class="badge social-counter right notificacion">5</span> Alumnos</a></li>
        <li><a href="{{ url(config('routes.teacher.offertNotification')) }}"><i class="fa fa-university right"  aria-hidden="true"></i><span class="badge social-counter right notificacion">5</span> Ofertas</a></li>
    </ul>
</a></li>
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
     Alumnos<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="estudiantes">
        <li><a href="{{ url(config('routes.teacher.allStudents')) }}"><i class="fa fa-users right" aria-hidden="true"></i> Todos</a></li>
        <li><a href="{{ url(config('routes.teacher.allVerifiedStudents')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidos</a></li>
        <li><a href="{{ url(config('routes.teacher.allDeniedStudents')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegados</a></li>
    </ul>
</a></li>
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
     Ofertas<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="ofertas">
        <li><a href="{{ url(config('routes.registro.registroEstudiante')) }}"><i class="fa fa-rocket right" aria-hidden="true"></i> Todas</a></li>
        <li><a href="{{ url(config('routes.registro.registroEstudiante')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidas</a></li>
        <li><a href="{{ url(config('routes.registro.registroProfesor')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegadas</a></li>
    </ul>
</a></li>

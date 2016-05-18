<!-- ADMIN -->
<li><a class="waves-effect waves-light subrayado" href="{{ url(config('routes.admin.statistics')) }}"><i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>

<!-- Profesor -->
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
        <span class="badge social-counter right notificacion" id="resultado">10</span> <i class="fa fa-bell" aria-hidden="true"></i> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" id="notifications" aria-labelledby="notificaciones">
        <!-- ADMIN -->
        <li role="presentation" class="dropdown-header">Administrador</li>
        <li><a href="{{ url(config('routes.admin.teacherNotification')) }}"><i class="fa fa-university right" aria-hidden="true"></i><span class="badge social-counter right notificacion">5</span> Profesores</a></li>
        <li><a href="{{ url(config('routes.admin.studentNotification')) }}"><i class="fa fa-graduation-cap right"  aria-hidden="true"></i><span class="badge social-counter right notificacion">88</span> Alumnos</a></li>
        <li><a href="{{ url(config('routes.admin.offerNotification')) }}"><i class="fa fa-cart-plus right"  aria-hidden="true"></i><span class="badge social-counter right notificacion">5</span> Ofertas</a></li>
        <!-- PROFESORES -->
        <li role="presentation" class="dropdown-header">Profesor</li>
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
        <li role="presentation" class="dropdown-header">Administrador</li>
        <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidos</a></li>
        <li><a href="{{ url(config('routes.admin.allDeniedTeachers')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegados</a></li>

        <!-- PROFESORES -->
        <li role="presentation" class="dropdown-header">Profesor</li>
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
        <li role="presentation" class="dropdown-header">Administrador</li>
        <li><a href="{{ url(config('routes.admin.allVerifiedOffers')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidas</a></li>
        <li><a href="{{ url(config('routes.admin.allDeniedOffers')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegadas</a></li>

        <!-- PROFESORES -->
        <li role="presentation" class="dropdown-header">Profesor</li>
        <li><a href="{{ url(config('routes.teacher.allVerifiedOffers')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidas</a></li>
        <li><a href="{{ url(config('routes.teacher.allDeniedOffers')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegadas</a></li>
    </ul>
</a></li>
<!-- ADMIN -->
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
     Profesores<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="profesores">
        <!-- ADMIN -->
        <li role="presentation" class="dropdown-header">Administrador</li>
        <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidas</a></li>
        <li><a href="{{ url(config('routes.admin.allDeniedTeachers')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegadas</a></li>
    </ul>
</a></li>

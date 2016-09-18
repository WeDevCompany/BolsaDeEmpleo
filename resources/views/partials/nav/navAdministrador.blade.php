<!-- ADMIN -->
<li><a class="waves-effect waves-light subrayado" href="{{ url(config('routes.admin.statistics')) }}"><i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>

<!-- Profesor -->
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
        <span class="badge social-counter right notificacion" id="resultado"></span>
        <i class="fa fa-bell" aria-hidden="true"></i>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" id="notifications" aria-labelledby="notificaciones">
        <!-- ADMIN -->
        <li role="presentation" class="dropdown-header">Administrador</li>
        <li><a href="{{ url(config('routes.admin.teacherNotification')) }}"><i class="fa fa-university right" aria-hidden="true"></i><span class="badge social-counter right notificacion" id="allTeacherNotifications"></span> Profesores</a></li>
        <li><a href="{{ url(config('routes.admin.studentNotification')) }}"><i class="fa fa-graduation-cap right"  aria-hidden="true"></i><span class="badge social-counter right notificacion" id="allStudentNotifications"></span> Alumnos</a></li>
        <li><a href="{{ url(config('routes.admin.offerNotification')) }}"><i class="fa fa-cart-plus right"  aria-hidden="true"></i><span class="badge social-counter right notificacion" id="allOfferNotifications"></span> Ofertas</a></li>
        <!-- PROFESORES -->
        <li role="presentation" class="dropdown-header">Profesor</li>
        <li><a href="{{ url(config('routes.teacher.studentNotification')) }}"><i class="fa fa-graduation-cap right"  aria-hidden="true"></i><span class="badge social-counter right notificacion" id="studentNotifications"></span> Alumnos</a></li>
        <li><a href="{{ url(config('routes.teacher.offerNotification')) }}"><i class="fa fa-cart-plus right"  aria-hidden="true"></i><span class="badge social-counter right notificacion" id="offerNotifications"></span> Ofertas</a></li>
    </ul>
</a></li>
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
        <span class="label-show">Alumnos
            <span class="caret"></span>
        </span>
        <span class="icon-hidden">
            <i class="fa fa-graduation-cap"  aria-hidden="true"></i>
            <span class="caret"></span>
        </span>
    </a>
    <ul class="dropdown-menu" role="menu"  aria-labelledby="alumnos">
        <!-- ADMIN -->
        <li role="presentation" class="dropdown-header">Administrador</li>
        <li><a href="{{ url(config('routes.admin.allVerifiedStudents')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidos</a></li>
        <li><a href="{{ url(config('routes.admin.allDeniedStudents')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegados</a></li>

        <!-- PROFESORES -->
        <li role="presentation" class="dropdown-header">Profesor</li>
        <li><a href="{{ url(config('routes.teacher.allVerifiedStudents')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidos</a></li>
        <li><a href="{{ url(config('routes.teacher.allDeniedStudents')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegados</a></li>
    </ul>
</a></li>
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
     <span class="label-show">Ofertas <span class="caret"></span></span><span class="icon-hidden"><i class="fa fa-cart-plus"  aria-hidden="true"></i> <span class="caret"></span></span>
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
    <span class="label-show">Profesores <span class="caret"></span></span><span class="icon-hidden"><i class="fa fa-university"  aria-hidden="true"></i> <span class="caret"></span></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="profesores">
        <!-- ADMIN -->
        <li role="presentation" class="dropdown-header">Administrador</li>
        <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Admitidos</a></li>
        <li><a href="{{ url(config('routes.admin.allDeniedTeachers')) }}"><i class="fa fa-times right" aria-hidden="true"></i> Denegados</a></li>
    </ul>
</a></li>
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
    <span class="label-show">Empresas <span class="caret"></span></span><span class="icon-hidden"><i class="fa fa-building"  aria-hidden="true"></i> <span class="caret"></span></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="profesores">
        <!-- ADMIN -->
        <li role="presentation" class="dropdown-header">Administrador</li>
        <li><a href="{{ url(config('routes.admin.allVerifiedEnterprises')) }}">Admitidas</a></li>
        <li><a href="{{ url(config('routes.admin.allDeniedEnterprises')) }}">Denegadas</a></li>
        <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}">Centros de Trabajo</a></li>
        <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}">Responsables</a></li>
    </ul>
</a></li>
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
    <span class="label-show">Configuración <span class="caret"></span></span><span class="icon-hidden"><i class="fa fa-cog fa-spin fa-fw"  aria-hidden="true"></i> <span class="caret"></span></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="profesores">
        <!-- ADMIN -->
        <li role="presentation" class="dropdown-header">Administrador</li>
        <li><a href="{{ url(config('routes.admin.allProfFamilies')) }}"></i>Familias profesionales</a></li>
        <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}">Ciclos</a></li>
        <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}">Asignaturas</a></li>
        <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}">Tags</a></li>
    </ul>
</a></li>
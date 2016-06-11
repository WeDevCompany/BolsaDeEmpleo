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
            <img src="{{ url('/img/imgUser/' . \Auth::user()->carpeta . '/' .  \Auth::user()->image) }}" alt="Imagen de perfil" class="img-responsive background-white img-circle img-navegador" id="img_perfil">
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu perfil">
            @if(\Auth::user()->rol == "administrador" || \Auth::user()->rol == "profesor")
                <!-- Profesores -->
                <li role="presentation" class="dropdown-header">Profesor</li>
                @if(\Auth::user()->rol == "administrador")
                    <li><a href="{{ url(config('routes.admin.subjects')) }}">Asignaturas</a></li>
                @else
                    <li><a href="{{ url(config('routes.teacher.subjects')) }}">Asignaturas</a></li>
                @endif
            @elseif(\Auth::user()->rol == "empresa")
                <!-- Empresa -->
                <li role="presentation" class="dropdown-header">Empresa</li>
                <li><a href="{{ url(config('routes.admin.allDeniedTeachers')) }}"><i class="fa fa-building-o right" aria-hidden="true"></i></i>Centro de trabajo</a></li>
                <li><a href="{{ url(config('routes.admin.allDeniedTeachers')) }}"><i class="fa fa-users right" aria-hidden="true"></i>Responsable de practicas</a></li>
            @endif
            <li role="presentation" class="dropdown-header">Usuario</li>
            <li><a href="{{ url(\Auth::user()->rol . config('routes.perfil')) }}"><i class="fa fa-wrench right" aria-hidden="true"></i> Editar perfil</a></li>
            @if (\Auth::user()->rol == 'estudiante')
                <li><a href="{{ url(\Auth::user()->rol . config('routes.curriculum')) }}"><i class="fa fa-file-pdf-o right" aria-hidden="true"></i>Editar Curriculum</a></li>
            @endif
            <li><a href="#"><i class="fa fa-key right" aria-hidden="true"></i> Cambiar contraseña</a></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out right" aria-hidden="true"></i> Logout</a></li>
        </ul>
    </div>
@endif
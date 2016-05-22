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
                <li><a href="{{ url(config('routes.admin.allVerifiedTeachers')) }}">Asignaturas</a></li>
                <li><a href="{{ url(config('routes.admin.allDeniedTeachers')) }}">Ciclos</a></li>
            @elseif(\Auth::user()->rol == "empresa")
                <!-- Empresa -->
                <li role="presentation" class="dropdown-header">Empresa</li>
                <li><a href="{{ url(config('routes.admin.allDeniedTeachers')) }}">Información de la empresa</a></li>
            @endif
            <li role="presentation" class="dropdown-header">Usuario</li>
            <li><a href="{{ url(\Auth::user()->rol . config('routes.perfil')) }}"><i class="fa fa-wrench right" aria-hidden="true"></i> Editar perfil</a></li>
            <li><a href="#"><i class="fa fa-key right" aria-hidden="true"></i> Cambiar contraseña</a></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out right" aria-hidden="true"></i> Logout</a></li>
        </ul>
    </div>
@endif
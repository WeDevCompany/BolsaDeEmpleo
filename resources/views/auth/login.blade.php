@extends('layouts.app')
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection

@section('content')
<div class="loggin-background">
@include('partials.nav.navGuest')
<div class="container sin-padding">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default animated zoomIn">
                <div class="modal-content">
                <div class="modal-header text-center">
                    <h4><i class="fa fa-user"></i> Login</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="col-md-12" id="login-form" role="form" method="POST" action="{{ url('/authLogin') }}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                                    <i class="material-icons prefix">email</i>
                                    {{ Form::email('email', null,['required' => 'true' ,'class' => 'validate', 'id' => 'email', 'data-error' => 'Introduzca un email valido', 'minlength' => '6', 'maxlength' => '75', 'data-toggle' => 'tooltip']) }}
                                    {{ Form::label('email', 'E-Mail', ['for' => 'icon_email']) }}
                                </div>
                            </div>
                            <div class="text-center">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }} col-md-12">
                                    <i class="material-icons prefix">lock</i>
                                    {{ Form::password('password', ['required' => 'true' ,'class' => 'validate', 'id' => 'password','data-error' => 'Introduzca un password valido', 'minlength' => '6', 'maxlength' => '25', 'data-toggle' => 'tooltip']) }}
                                    {{ Form::label('password', 'Contraseña', ['for' => 'password']) }}
                                </div>
                            </div>
                                <div class="text-center">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">

                                    {!! app('captcha')->display(); !!}
                                </div>
                                <div class="text-center">
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light btn-login-media">
                                        <i class="fa fa-sign-in"></i>
                                        Login
                                    </button>
                                </div>
                                <div class="text-center">
                                    <a  href="{{ url('/password/reset') }}">¿Has olvidado tú contraseña?</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- loggin-background -->
</div>
@endsection

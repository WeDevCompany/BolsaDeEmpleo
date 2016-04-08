@extends('layouts.app')

@section('content')
@include('partials.nav.navGuest')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="modal-content">
                <div class="modal-header text-center">
                    <h4><i class="fa fa-user"></i> Login</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <div class="row">
                        <form class="col-md-12" role="form" method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                                    <i class="material-icons prefix">email</i>
                                    {{ Form::text('email', null,['class' => 'validate', 'id' => 'email']) }}
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
                                    {{ Form::password('password', ['class' => 'validate', 'id' => 'password']) }}
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
                                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-login-media">
                                        <i class="fa fa-sign-in"></i>
                                        Login
                                    </button>
                                </div>
                                <div class="text-center">
                                    <a  href="{{ url('/password/reset') }}">Has olvidado tú contraseña?</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

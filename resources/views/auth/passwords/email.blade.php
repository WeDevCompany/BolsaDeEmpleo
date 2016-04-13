@extends('layouts.app')

<!-- Main Content -->
@section('content')
    @include('partials.nav.navGuest')
    @section('scripts')
        {{-- Incluimos los scripts de validaciones --}}
        <script src="/js/validaciones/facada.js" charset="utf-8"></script>
    @endsection
<div class="container container-a-medida">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resetear contraseña</div>
                <div class="panel-body panel-body-a-medida">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" id="send-email-reset" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!--label class="col-md-4 control-label">E-Mail</label-->

                            <div class="col-md-12">
                                <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                                    <i class="material-icons prefix">email</i>
                                    {{ Form::email('email', null,['class' => 'validate', 'id' => 'email', 'data-error' => 'Introduzca un email valido', 'maxlength' => '75']) }}
                                    {{ Form::label('email', 'E-Mail', ['for' => 'icon_email']) }}
                                </div>
                                <div class="text-center">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" id="submit" class="btn btn-primary btn-login-media">
                                    <i class="fa fa-btn fa-envelope"></i> Resetear
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

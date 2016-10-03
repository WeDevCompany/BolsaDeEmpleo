@extends('layouts.app')

@section('content')
@include('partials.nav.navGuest')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resetear contraseña</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="token" required="true" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="input-field col-md-12">
                                    <i class="material-icons prefix">mail outline</i>
                                    {{ Form::label('email', 'Correo electrónico(*)') }}
                                    {{ Form::email('email', null, ['type' => 'email','id' => 'email', 'minlength' => '6','required' => 'true', 'title' => 'email que será su usuario', 'data-toggle' => 'tooltip']) }}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contraseña:</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" id="password" minlength="6" required="true">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmar contraseña</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" minlength="6" required="true">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-cog fa-fw margin-bottom fa-spin fa-refresh"></i> Resetear contraseña
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

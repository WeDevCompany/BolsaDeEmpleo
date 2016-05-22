@extends('layouts.app')
@section('content')
@include('partials.nav.navGuest')
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-university"></i>Confirmacion de cuenta</h4>

                    </div>
                    <div class="panel-body">
                         {{ Form::open(['url' => 'confirmado', 'method' => 'POST']) }}
                            {!! csrf_field() !!}

                            <div class="control-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <i class="material-icons prefix">account_circle</i>
                                        {{ Form::text('code', null,['class' => 'validate', 'id' => "code"]) }}
                                        {{ Form::label('code', 'Introduce el codigo') }}

                                    </div>
                                </div>
                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 text-center">
                                    <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                        <div class="show-responsive">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        </div>
                                        <div class="hidden-media">
                                            <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Registrar</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
@include('partials.nav.navEmpresa')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Alta de empresas</div>

                <div class="panel-body">
                     {{ Form::open(['route' => 'empresa..store', 'method' => 'POST', 'files' => 'true', 'id' => 'enterprise-register-form']) }}
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend style="width: auto;">Usuario</legend>
                            @include('generic.userfields')
                        </fieldset>
                        <fieldset>
                            <legend style="width:auto;  ">Empresa</legend>
                            @include('enterprise.partials.enterprisefields')
                        </fieldset>
                        <fieldset>
                            <legend style="width: auto;">Centro de trabajo</legend>
                            <fieldset>
                                <legend style="width: auto;">Contacto</legend>
                                @include('enterprise.partials.workcenterfields')
                            </fieldset>
                            <fieldset>
                                <legend style="width: auto;">Localización</legend>
                                @include('generic.statefields')
                                @include('generic.citiefields')
                            </fieldset>
                            <fieldset>
                                <legend style="width: auto;">Responsable del centro de trabajo</legend>
                                @include('enterprise.partials.enterpriseresponsablefields')
                            </fieldset>
                        </fieldset>
                            @include('generic.terms')
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light" id="submit">
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


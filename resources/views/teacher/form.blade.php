@extends('layouts.app')

@section('content')
@include('partials.nav.navProfesor')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido Profesor</div>
                <div class="panel-body">
                    @if(Session::has('message_Positive'))
                        <p class="alert alert-success">
                        {{ Session::get('message_Positive') }}
                        </p>
                    @elseif(Session::has('message_Negative'))
                        <p class="alert" style="color:black;background-color:#ffacac;border-color:#a94442">
                        {{ Session::get('message_Negative') }}
                        </p>
                    @endif
                    {{ Form::open(['route' => 'profesor..store', 'method' => 'POST', 'action' => '/profesor']) }}
                    @include('generic.userfields')
                    @include('teacher.teacherfields')
                    <button type="submit" class="btn btn-default">
                        Darme de alta
                    </button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                
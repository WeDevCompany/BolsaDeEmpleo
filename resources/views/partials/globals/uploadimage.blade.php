@extends('layouts.app')

@section('content')
@include('partials.nav.navEstudiante')
	<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cambiar imagen</div>

                <div class="panel-body">
                    Bienvenido {{ Auth::user()->email }}
                    {{ Auth::user()->image }}
                </div>
                <div style="margin: auto;">
                	<img src="images/profile" alt="" class="img-responsive img-circle img-resize">
                </div>
                <form method="POST" action="/uploadImage" accept-charset="UTF-8" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                	{{ Form::file('imagen',['id' => 'holi'])}}
                	{{ Form::submit('Cambiar Imagen', ['class' => 'btn btn-primary'])}}
                	
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

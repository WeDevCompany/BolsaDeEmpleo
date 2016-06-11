@extends('layouts.app')
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
    <script src="/js/dropzone/dropzoneConfig.js" charset="utf-8"></script>
@endsection
@section('content')
@include('partials.nav.navParent')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">

                        <h4><i class="fa fa-user"></i> Perfil de Usuario</h4>

                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <img src="{{ url('/img/imgUser/' . \Auth::user()->carpeta . '/' .  \Auth::user()->image) }}" alt="Imagen_de_usuario" class="img-responsive img-circle img-resize">

                        </div>
                    </div>

                    {!! Form::open(['url' => \Auth::user()->rol . config('routes.UploadImg'), 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone dropzone-width']) !!}
                        <div class="dz-message">
                            <h4><i class="fa fa-file-image-o" aria-hidden="true"></i></h4>
                        </div>
                        <button type="submit" class="btn btn-success" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i><span class="hidden-media"> Save</span></button>
                    {!! Form::close() !!}
                    <div><br></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
    <script src="/js/dropzone/dropzoneConfig.js" charset="utf-8"></script>
    @include('partials.session.sessionflash')
@endsection
@section('content')
@include('partials.nav.navParent')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">

                        <h4><i class="fa fa-file-pdf-o"></i> Cambiar Curriculum</h4>

                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <img src="{{ url('/img/global/Pdf-icon.png') }}" alt="Curriculum_de_usuario" class="img-responsive img-resize">

                        </div>
                    </div>
                    {!! Form::open(['url' => \Auth::user()->rol . config('routes.UploadCurriculum'), 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone dropzone-width']) !!}
                        <div class="dz-message">
                            <h4><i class="fa fa-file-image-o" aria-hidden="true"></i></h4>
                        </div>
                        <button type="submit" class="btn btn-success" id="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i><span class="hidden-media"> Save</span></button>
                    {!! Form::close() !!}
                    <div class="form-group extra-padding-curriculum">
                        <div class="col-md-12 text-center">
                            <a href="{{ url(config('routes.student.downloadCurriculum')) }}" type="button" class="btn btn-primary btn-login-media  waves-effect waves-light">
                                <div class="show-responsive">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </div>
                                <div class="hidden-media">
                                        <i class="fa fa-download"></i> <span class="hidden-media">Descargar Curriculum</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
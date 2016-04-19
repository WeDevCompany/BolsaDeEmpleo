@extends('layouts.app')

@section('content')
@include('partials.nav.navEstudiante')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">

                        <h4><i class="fa fa-user"></i> Perfil de Usuario</h4>

                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <img src="{{ url('/img/imgUser/' . \Auth::user()->carpeta . '/' .  \Auth::user()->image) }}" alt="" class="img-responsive img-circle img-resize">

                        </div>
                    </div>
                    
                    {!! Form::open(['url' => \Auth::user()->rol . config('routes.UploadImg'), 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone dropzone-width']) !!}
                        <div class="dz-message">
                            <h4><i class="fa fa-file-image-o" aria-hidden="true"></i></h4>
                        </div>
                        <button type="submit" class="btn btn-success" id="submit">Save</button>
                    {!! Form::close() !!}
                    <div><br></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>

        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: false,
            maxFilezise: 10,
            maxFiles: 1,    
            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                
                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                    location.reload();
                });
 
                this.on("success", 
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };

    </script>

@endsection
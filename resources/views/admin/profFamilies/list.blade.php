@extends('layouts.app')
@section('css')
    @include('keyword.subject.subjectKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de valbolaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row sin-margen">
        	<div class="col-md-12 sin-margen">
        		<div class="panel panel-default animated">
        			<div class="modal-content">
        				<!-- Titulo -->
    		            <div class="modal-header text-center">
    		                <h4 class="title" data-title="">
    		                	<i class="fa fa-graduation-cap"></i>
    		                	Asignaturas impartidas
    		                </h4>
    		            </div>
    					<div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('')
@endsection
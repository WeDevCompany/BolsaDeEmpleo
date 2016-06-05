@extends('layouts.app')
@section('css')
    @include('keyword.offer.offerKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de valbolaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection

@section('content')
@include('partials.nav.navParent')
	<main>
		<div class="container">
			<div class="row">
	            <div class="panel panel-default sin-margen ancho">
		    		<div class="row sin-margen extra-padding">
		            	<!-- Titulo -->
		                <div class="modal-header text-center">
		                    <h4 class="title" data-title="{!!mb_strtoupper($offer->title)!!}">{!!mb_strtoupper($offer->title)!!}</h4>
		                </div>
				    	@include('offer.partials.offerInformationOnlyOneOffer')
					    <div class="row extra-padding-bottom">
					    	@if(\Auth::user()->rol == "empresa")
	                            @include('offer.partials.adminAndEnterpriseBtn')

	                        @elseif(\Auth::user()->rol == "administrador")
	                            @include('offer.partials.adminAndEnterpriseBtn')

	                        @elseif(\Auth::user()->rol == "profesor")
	                            @include('offer.partials.teacherBtn')

	                        @elseif(\Auth::user()->rol == "estudiante")
	                            @include('offer.partials.studentBtn')

	                        @endif
					    </div>
					</div>
				</div>
			</div>
		</div>
		@if(isset($comments) && !$comments->isEmpty())
			<div class="container">
				<div class="row">
		            <div class="panel panel-default sin-margen ancho">
			    		<div class="row sin-margen extra-padding">
			            	<!-- Titulo -->
			                <div class="modal-header text-center">
			                    <h4 class="title" data-title="Comentários">Comentários</h4>
			                </div>
			                <div class="modal-body">
			                	<div class="row">
			                		<div class="col-md-12">
			                		@foreach($comments as $comment)
										<ul class="collection col-md-12 hoverable scroll">
									        <li class="collection-item avatar">
									            <img src="{!! url('/img/imgUser/' . $comment->carpeta . '/' .  $comment->image) !!}" alt="imagen_de_usuario" class="circle">
									            <figcaption><i class="fa fa-calendar" aria-hidden="true"></i> Creado: <time datetime="{{ isset($comment->created_at)}}">{{ isset($comment->updated_at) ? $comment->updated_at : $comment->created_at}}</time></figcaption>
									            <address>Autor: {!! $comment->firstName . ' ' . $comment->lastName !!}</address>
									            <span class="title">{!! $comment->title !!}</span>
									            <p>
									                {!! $comment->body !!}
									            </p>
									        </li>
									    </ul>
				                	@endforeach
									</div>
			                	</div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		@endif
	</main>
@include('partials.footer.footerWelcome')
@endsection

<div class="container">
	<div class="row">
        <div class="panel panel-default sin-margen ancho modal-content">
    		<div class="row sin-margen extra-padding">
            	<!-- Titulo -->
                <div class="modal-header text-center">
                    <h4 class="title" data-title="Comentários">Comentarios</h4>
                </div>
                <div class="modal-body">
                	<div class="row">
                		<div class="col-md-12">
	                		@if(isset($comments) && !$comments->isEmpty())
	                			<ul class="collection col-md-12">
	                			@foreach($comments as $comment)

								        <li class="collection-item avatar scroll">
								            <img src="{!! url('/img/imgUser/' . $comment->carpeta . '/' .  $comment->image) !!}" alt="imagen_de_usuario" class="circle">
								            <figcaption><i class="fa fa-calendar" aria-hidden="true"></i> Creado: <time datetime="{{ isset($comment->created_at)}}">{{ isset($comment->updated_at) ? $comment->updated_at : $comment->created_at}}</time></figcaption>
								            <address>Autor: {!! $comment->firstName . ' ' . $comment->lastName !!}</address>
								            <span class="title">{!! $comment->title !!}</span>
								            <p>
								                {!! $comment->body !!}
								            </p>
								            @if(\Auth::user()->id === $comment->idUser)
												@include('offer.partials.commentActionBtn')
									        @endif
								        </li>

			                	@endforeach
			                	</ul>
			                @else
			                	<ul class="collection col-md-12 text-center">
			                		Actualmente no existe ningun comentario para esta oferta.</br>
			                	</ul>
			                @endif
						</div>
						@if (\Auth::user()->rol !== 'estudiante')
							<div class="col-md-12 text-center">
	                            <button type="button" class="btn btn-primary btn-login-media waves-effect waves-light" data-toggle="modal" data-target="#myModalCreate">
	                                <div class="show-responsive">
	                                    <i class="fa fa-comment" aria-hidden="true"></i>
	                                </div>
	                                <div class="hidden-media">
	                                    <i class="fa fa-btn fa-comment"></i> <span class="hidden-media">Nuevo Comentario</span>
	                                </div>
	                            </button>
	                        </div>
	                    @endif
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.modal.commentCreateModal')
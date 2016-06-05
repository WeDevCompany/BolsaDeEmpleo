<div class="container">
	<div class="row">
        <div class="panel panel-default sin-margen ancho modal-content">
    		<div class="row sin-margen extra-padding">
            	<!-- Titulo -->
                <div class="modal-header text-center">
                    <h4 class="title" data-title="Comentários">Comentários</h4>
                </div>
                <div class="modal-body">
                	<div class="row">
                		<div class="col-md-12">
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
						</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
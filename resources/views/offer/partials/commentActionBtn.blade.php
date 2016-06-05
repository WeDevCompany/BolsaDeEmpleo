
	<div class="col-md-12 text-center">
		<div class="col-md-6">
			<a href="/{{\Auth::user()->rol}}/oferta/editar/{{ $offer->id }}" class="btn btn-warning btn-login-media hoverable waves-effect waves-light" id="verOferta">
		        <div class="show-responsive">
		            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		        </div>
		        <div class="hidden-media">
		            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span class="hidden-media">Editar comentario</span>
		        </div>
		    </a>
		</div>
		<div class="col-md-6">
			<a href="/{{\Auth::user()->rol}}/oferta/borrar/{{ $offer->id }}" class="btn btn btn-danger hoverable btn-login-media waves-effect waves-light" id="verOferta">
		        <div class="show-responsive">
		            <i class="fa fa-times" aria-hidden="true"></i>
		        </div>
		        <div class="hidden-media">
		            <i class="fa fa-times" aria-hidden="true"></i> <span class="hidden-media">Borrar comentario</span>
		        </div>
		    </a>
		</div>
	</div>
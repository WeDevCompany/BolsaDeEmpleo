<div class="row text-center">
	<div class="col-sm-6">
		<a href="/{{\Auth::user()->rol}}/oferta/{{ $offer->id }}" class="btn btn-primary btn-login-media waves-effect waves-light hoverable" id="verOferta">
	        <div class="show-responsive">
	            <i class="fa fa-eye" aria-hidden="true"></i>
	        </div>
	        <div class="hidden-media">
	            <i class="fa fa-eye" aria-hidden="true"></i> <span class="hidden-media">Ver Oferta</span>
	        </div>
	    </a>
    </div>
	<div class="col-sm-6">
		<a href="/{{\Auth::user()->rol}}/oferta/subscipcion/{{ $offer->id }}" class="btn btn-info btn-login-media waves-effect waves-light hoverable" id="verOferta">
	        <div class="show-responsive">
	            <i class="fa fa-bookmark" aria-hidden="true"></i>
	        </div>
	        <div class="hidden-media">
	            <i class="fa fa-bookmark" aria-hidden="true"></i> <span class="hidden-media">Suscribirse a la oferta</span>
	        </div>
	    </a>
	</div>
</div>
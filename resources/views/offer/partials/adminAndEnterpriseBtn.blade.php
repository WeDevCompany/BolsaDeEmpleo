<div class=" row text-center col-md-12">
	<div class="btn-group btn-group-sm row text-center">

		<a href="/{{\Auth::user()->rol}}/oferta/actualizar/{{ $offer->id }}" class="btn btn-info btn-login-media waves-effect hoverable waves-light" id="verOferta">
	        <div class="show-responsive">
	            <i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i>
	        </div>
	        <div class="hidden-media">
	            <i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i> <span class="hidden-media">Actualizar oferta</span>
	        </div>
	    </a>

		<a href="/{{\Auth::user()->rol}}/oferta/editar/{{ $offer->id }}" class="btn btn-warning btn-login-media hoverable waves-effect waves-light" id="verOferta">
	        <div class="show-responsive">
	            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	        </div>
	        <div class="hidden-media">
	            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span class="hidden-media">Editar oferta</span>
	        </div>
	    </a>

		<a href="#!"  data-toggle="modal" data-target="#deleteOffer" class="btn btn btn-danger hoverable btn-login-media waves-effect waves-light" id="verOferta">
	        <div class="show-responsive">
	            <i class="fa fa-times" aria-hidden="true"></i>
	        </div>
	        <div class="hidden-media">
	            <i class="fa fa-times" aria-hidden="true"></i> <span class="hidden-media">Borrar oferta</span>
	        </div>
	    </a>

	    <a href="#!"  data-toggle="modal" data-target="#hiredModal" class="btn btn btn-success hoverable btn-login-media waves-effect waves-light" id="verOferta">
	        <div class="show-responsive">
	            <i class="fa fa-users" aria-hidden="true"></i>
	        </div>
	        <div class="hidden-media">
	            <i class="fa fa-users" aria-hidden="true"></i> <span class="hidden-media">Contratados</span>
	        </div>
	    </a>

	</div>
</div>
@include('partials.modal.offerDelete')
@include('partials.modal.hiredEdit')
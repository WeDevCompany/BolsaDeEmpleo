<div class=" row text-center col-md-12">
	<div class="btn-group btn-group-sm row text-center">

		<a href="/{{\Auth::user()->rol}}/Centro/editar/{{ $workCenter->id }}" class="btn btn-warning btn-login-media hoverable waves-effect waves-light" id="verOferta">
	        <div class="show-responsive">
	            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	        </div>
	        <div class="hidden-media">
	            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span class="hidden-media">Editar Centro</span>
	        </div>
	    </a>

		<a href="#!" data-toggle="modal" data-target="#deleteWorkCenter" class="btn btn btn-danger hoverable btn-login-media waves-effect waves-light" id="verOferta">
	        <div class="show-responsive">
	            <i class="fa fa-times" aria-hidden="true"></i>
	        </div>
	        <div class="hidden-media">
	            <i class="fa fa-times" aria-hidden="true"></i> <span class="hidden-media">Borrar Centro</span>
	        </div>
	    </a>

	</div>
</div>
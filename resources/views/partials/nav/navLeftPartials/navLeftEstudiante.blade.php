@if(isset($inscrito))
<div class="row">
	<div class="row">
		<div class="col-md-12">
			<button type="button" class="btn btn-danger btn-login-media waves-effect waves-light hoverable" id="yaSuscrito">
		        <div class="show-responsive">
		            <i class="fa fa-check-square" aria-hidden="true"></i>
		        </div>
		        <div class="hidden-media">
		            <i class="fa fa-check-square" aria-hidden="true"></i> <span class="hidden-media">Ya estas inscrito</span>
		        </div>
		    </button>
		</div>
	</div>
</div>
@else
<div class="row">
	<div class="row">
		<div class="col-md-12">
			<a href="/{{\Auth::user()->rol}}/oferta/subscripcion/{{ $offer->id }}" class="btn btn-info btn-login-media waves-effect waves-light hoverable" id="verOferta">
		        <div class="show-responsive">
		            <i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i>
		        </div>
		        <div class="hidden-media">
		            <i class="fa fa-check-square-o" aria-hidden="true"></i> <span class="hidden-media">Inscribirse</span>
		        </div>
		    </a>
		</div>
	</div>
</div>
@endif
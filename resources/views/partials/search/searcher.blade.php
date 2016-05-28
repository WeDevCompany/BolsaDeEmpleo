<div class="col-md-4">
	@include('partials.search.filters')
</div>
<div class="col-md-6">
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar...']) }}
</div>
<div class="col-md-2 text-center">
	<button type="submit" class="btn btn-primary" type="button" id="buscador" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></button>
</div>


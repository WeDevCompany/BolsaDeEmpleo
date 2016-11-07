<div class="col-md-4">
    @include('partials.search.filtersOffer')
</div>
<div class="col-md-6">
    {{ Form::text('name', null, ['class' => 'form-control search-offer', 'placeholder' => 'Buscar...']) }}
</div>
<div class="col-md-2 text-center">
    <button type="submit" class="btn btn-warning hoverable btn-login-media waves-effect waves-light" type="button" id="buscador" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></button>
</div>
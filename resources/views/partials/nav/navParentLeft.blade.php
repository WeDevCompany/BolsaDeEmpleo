<div class="col-sm-4 text-center fixed">
	@if(\Auth::user()->rol === "profesor")
		{{-- incluimos la navegación de profesor --}}
		@include('partials.nav.navLeftPartials.navLeftProfesor')
	@elseif(\Auth::user()->rol === "administrador")
		{{-- incluimos la navegación del administrador --}}
		@include('partials.nav.navLeftPartials.navLeftProfesor')
	@elseif(\Auth::user()->rol === "empresa")
		{{-- incluimos la navegación de la empresa --}}
		@include('partials.nav.navLeftPartials.navLeftProfesor')
	@else
		{{-- incluimos la navegación del estudiante --}}
		@include('partials.nav.navLeftPartials.navLeftProfesor')
	@endif
</div>
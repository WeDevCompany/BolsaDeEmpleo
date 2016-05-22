<fieldset>
	<legend>Asignaturas que impartes</legend>
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('profFamilie', 'Familia profesional a la que pertenece',['class' => 'label-select']) }}
			{{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control']) }}
		</div>
		<div class="col-sm-4">
			@include('generic.tutor')
		</div>
		<div class="col-sm-8 hide">
			{{ Form::label('cycles', 'Ciclos',['class' => 'label-select']) }}
			{{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control']) }}
		</div>
		<div class="col-md-12">
			{{ Form::label('cycles', 'Ciclos impartidos',['class' => 'label-select']) }}
			{{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control']) }}
		</div>
		<div class="col-md-12">
			{{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control', 'multiple' => 'multiple']) }}
		</div>
	</div>
</fieldset>
<fieldset style="margin-top: 20px;">
	<legend>Asignaturas que impartes</legend>
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('profFamilie', 'Familia profesional a la que pertenece',['class' => 'label-select']) }}
			{{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control']) }}
		</div>
		<div class="extra-padding-top col-md-12">
			<div class="col-sm-4">
				@include('generic.tutor')
			</div>
			<div class="col-sm-8 hide" id="oculto">
				{{ Form::select('select[]',['0' => 'Seleccione el ciclo del que es tutor', 'L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control']) }}
			</div>
		</div>
		<div class="col-md-12">
			{{ Form::label('cycles', 'Ciclos que impartes',['class' => 'label-select']) }}
			{{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control', 'multiple' => 'multiple']) }}
		</div>
		<div class="col-md-12 extra-padding">
			{{ Form::label('cycles', 'Asignaturas impartidas',['class' => 'label-select']) }}
			{{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control', 'multiple' => 'multiple']) }}
		</div>
	</div>
</fieldset>
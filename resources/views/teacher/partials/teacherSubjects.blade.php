<fieldset style="margin-top: 20px;">
	<legend>Asignaturas que impartes</legend>
	<div class="row">
		<div class="col-md-12">
			@include('generic.profFamiliesfields')
		</div>
		<div class="extra-padding-top col-md-12">
			<div class="col-sm-4">
				@include('generic.tutor')
			</div>
			<div class="col-sm-8 hide" id="oculto">
				<select name="cycle0" class="chosen-select form-control" id="cycle0">
			    	@foreach($cycles as $ArrayId => $cycle)
			    		@if ($cycle['level'] === "Básico")
			    			@if ($basico == true)
				    			<optgroup label="Grados básicos" id="basico0">
							@endif
							{{ $basico=false }}
						@elseif ($cycle['level'] === "Medio")
							@if ($medio == true)
				    			<optgroup label="Grados medios" id="medio0">
							@endif
							{{ $medio=false }}
						@elseif ($cycle['level'] === "Superior")
							@if ($superior == true)
				    			<optgroup label="Grados superiores" id="superior0">
							@endif
							{{ $superior=false }}
						@endif
						<option value="{{ $cycle['id'] }}">[{{ $cycle['level'] }}] {{ $cycle['name'] }}</option>
					@endforeach
			    </select>
			    @if ($errors->has('cycle0'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('cycle0') }}</strong>
	                </span>
	            @endif
			</div>
		</div>
		<div class="col-md-12">
			{{ Form::label('cycles', 'Ciclos que impartes',['class' => 'label-select']) }}
			<select name="cycle1" class="chosen-select form-control" id="cycle1" multiple="multiple">
		    	@foreach($cycles as $ArrayId => $cycle)
		    		@if ($cycle['level'] === "Básico")
		    			@if ($basico == true)
			    			<optgroup label="Grados básicos" id="basico1">
						@endif
						{{ $basico=false }}
					@elseif ($cycle['level'] === "Medio")
						@if ($medio == true)
			    			<optgroup label="Grados medios" id="medio1">
						@endif
						{{ $medio=false }}
					@elseif ($cycle['level'] === "Superior")
						@if ($superior == true)
			    			<optgroup label="Grados superiores" id="superior1">
						@endif
						{{ $superior=false }}
					@endif
					<option value="{{ $cycle['id'] }}">[{{ $cycle['level'] }}] {{ $cycle['name'] }}</option>
				@endforeach
		    </select>
		    @if ($errors->has('cycle1'))
                <span class="help-block">
                    <strong>{{ $errors->first('cycle1') }}</strong>
                </span>
            @endif
		</div>
		<div class="col-md-12 extra-padding">
			{{ Form::label('cycles', 'Asignaturas impartidas',['class' => 'label-select']) }}
			{{ Form::select('select[]',['L' => 'Large', 'S' => 'Small'], old('select', null),['class' => 'chosen-select form-control', 'multiple' => 'multiple']) }}
		</div>
	</div>
</fieldset>
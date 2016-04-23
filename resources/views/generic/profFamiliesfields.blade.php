<div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-12">
	        {{ Form::label('family', 'Ciclos cursados',['style' => 'margin-top: -3em']) }}
    		<select name="family" class="chosen-select form-control" id="family">
		    	@foreach($profFamilies as $id => $profFamilie)
					<option value="{{ $id }}">{{ $profFamilie }}</option>
				@endforeach
		    </select>
		</div>
	</div>
</div>
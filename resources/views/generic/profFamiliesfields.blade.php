<div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-12">
	        {{ Form::label('family0', 'Ciclos cursados',['style' => 'margin-top: -3em']) }}
    		<select name="family" class="chosen-select form-control" id="family0">
		    	@foreach($profFamilies as $id => $profFamilie)
		    		@if ($id == 0)
						<option value="{{ $id }}" disabled="disabled" selected="selected">{{ $profFamilie }}</option>
					@else
						<option value="{{ $id }}">{{ $profFamilie }}</option>
					@endif
				@endforeach
		    </select>
		</div>
	</div>
</div>

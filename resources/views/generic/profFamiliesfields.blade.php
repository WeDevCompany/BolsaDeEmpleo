<div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-12">
	        {{ Form::label('family0', 'Familia profesional actual',['style' => 'margin-top: -3em']) }}
    		<select name="family[0]" class="chosen-select form-control" id="family0">
		    	@foreach($profFamilies as $id => $profFamilie)
		    		@if ($id == 0)
						<option value="{{ $id }}" selected="selected">{{ $profFamilie }}</option>
					@else
						<option value="{{ $id }}">{{ $profFamilie }}</option>
					@endif
				@endforeach
		    </select>
		    @if ($errors->has('family0'))
                <span class="help-block">
                    <strong>{{ $errors->first('family0') }}</strong>
                </span>
            @endif
		</div>
	</div>
</div>

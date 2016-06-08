<div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-12">
	        {{ Form::label('family[0]', 'Familia profesional correspondiente',['style' => 'margin-top: -3em']) }}
    		<select name="family[0]" class="chosen-select form-control" id="family0">
		    	@foreach($profFamilies as $id => $profFamilie)
		    		@if ($id == 0)
						<option value="{{ $id }}" selected="selected">{{ $profFamilie }}</option>
					@else
						<option value="{{ $id }}">{{ $profFamilie }}</option>
					@endif
				@endforeach
		    </select>
		    @if ($errors->has('family'))
                <span class="help-block">
                    <strong>{{ $errors->first('family') }}</strong>
                </span>
            @endif
		</div>
	</div>
</div>

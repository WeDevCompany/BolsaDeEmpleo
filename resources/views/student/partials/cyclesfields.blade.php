        <div class="form-group{{ $errors->has('cycles') ? ' has-error' : '' }}">
            <div class="row">
                <div class="input-field col-md-12">
                    {{ Form::label('cycle', 'Ciclos cursados',['class' => 'label-select']) }}
                    <select name="cycle[0]" class="chosen-select form-control" id="cycle0">
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
        </div>
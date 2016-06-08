        <div class="form-group{{ $errors->has('cycle') ? ' has-error' : '' }}">
            <div class="row">
                <div class="input-field col-md-12">
                    {{ Form::label('cycle[0]', 'Ciclos cursados',['class' => 'label-select']) }}
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
				    @if ($errors->has('cycle'))
		                <span class="help-block">
		                    <strong>{{ $errors->first('cycle') }}</strong>
		                </span>
		            @endif
                </div>
            </div>
        </div>
        <div class="form-group{{ $errors->has('yearFrom') ? ' has-error' : ''  }} form-group{{ $errors->has('yearTo') ? ' has-error' : '' }}">
            <div class="row">
		        <div class="input-field col-md-6 divdate">
        		    <label for="yearFrom[0]" class="divdatelab">A&ntilde;o de inicio</label>
		            <select name="yearFrom[0]" class="chosen-select form-control" id="yearFrom[0]">
						@for($i=date('Y')-26; $i<=date('Y'); $i++)
							<option value="{{ $i }}">{{ $i }}</option>
						@endfor
		            </select>
		            @if ($errors->has('yearFrom'))
		                <span class="help-block">
		                    <strong>{{ $errors->first('yearFrom') }}</strong>
		                </span>
		            @endif
        		</div>
   			    <div class="input-field col-md-6 divdate">
            		<label for="yearTo[0]" class="divdatelab">A&ntilde;o de fin</label>
					<select name="yearTo[0]" class="chosen-select form-control" id="yearTo[0]">
						@for($i=date('Y')-26; $i<=date('Y'); $i++)
							<option value="{{ $i }}">{{ $i }}</option>
						@endfor
		            </select>
		            @if ($errors->has('yearTo'))
		                <span class="help-block">
		                    <strong>{{ $errors->first('yearTo') }}</strong>
		                </span>
		            @endif
        		</div>
        	</div>
        </div>
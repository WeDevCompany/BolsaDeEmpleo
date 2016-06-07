{{ Form::label('cycle', 'Nombre del ciclo',['style' => 'margin-top: -3em']) }}
<select name="cycle" class="chosen-select form-control" id="cycle">
	@foreach($cycles as $id => $cycle)
		@if ($id == 0 && !$_GET)
			<option value="{{ $id }}" selected="selected">{{ $cycle }}</option>
		@elseif ($_GET && isset($_GET['cycle']) && $_GET['cycle'] == $id)
			<option value="{{ $id }}" selected="selected">{{ $cycle }}</option>
		@else
			<option value="{{ $id }}">{{ $cycle }}</option>
		@endif
	@endforeach
</select>
@if ($errors->has('cycle'))
    <span class="help-block">
        <strong>{{ $errors->first('cycle') }}</strong>
    </span>
@endif
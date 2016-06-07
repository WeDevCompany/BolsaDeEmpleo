{{ Form::label('yearFrom', 'Curso',['style' => 'margin-top: -3em']) }}
<select name="yearFrom" class="chosen-select form-control" id="yearFrom">
	@foreach($years as $id => $year)
		@if ($id == 0 && !$_GET)
			<option value="{{ $id }}" selected="selected">{{ $year }}</option>
		@elseif ($_GET && isset($_GET['yearFrom']) && $_GET['yearFrom'] == $id)
			<option value="{{ $id }}" selected="selected">{{ $year }}</option>
		@else
			<option value="{{ $id }}">{{ $year }}</option>
		@endif
	@endforeach
</select>
@if ($errors->has('yearFrom'))
    <span class="help-block">
        <strong>{{ $errors->first('yearFrom') }}</strong>
    </span>
@endif
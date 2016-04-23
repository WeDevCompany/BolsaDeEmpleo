<div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-12">
    {{ Form::label('family', 'Ciclos cursados',['style' => 'margin-top: -5%']) }}
    <select name="family" class="chosen-select form-control" id="family"></select>
    <!-- {{ Form::select('family',array(), null,['class' => 'chosen-select form-control', 'id' => 'family']) }} -->
</div>
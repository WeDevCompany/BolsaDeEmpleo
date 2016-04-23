<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-6">
            {{ Form::label('city', 'Ciudad',['style' => 'margin-top: -8%']) }}
            {{ Form::select('city',array('1' => 'A', '2' => 'B', '50' => 'C', '4' => 'D', '5' => 'E', '6' => 'F'), null,['class' => 'chosen-select form-control']) }}
        </div>
    </div>
    @if ($errors->has('city'))
        <span class="help-block">
            <strong>{{ $errors->first('city') }}</strong>
        </span>
    @endif
</div>
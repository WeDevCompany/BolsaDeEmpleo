<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-6">
            {{ Form::label('state', 'Comunidad autonoma',['style' => 'margin-top: -8%']) }}
            {{ Form::select('state',array('1' => 'A', '2' => 'B', '50' => 'C', '4' => 'D', '5' => 'E', '6' => 'F'), null,['class' => 'chosen-select form-control']) }}
        </div>
    </div>
    @if ($errors->has('state'))
        <span class="help-block">
            <strong>{{ $errors->first('state') }}</strong>
        </span>
    @endif
</div>
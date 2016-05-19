<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    <div class="row extra-padding">
        <div class="input-field col-md-12">
            {{ Form::label('state', 'Comunidad autonoma',['class' => "label-select"]) }}
            {{ Form::select('state',array('1' => 'A', '2' => 'B', '50' => 'C', '4' => 'D', '5' => 'E', '6' => 'F'), null,['class' => 'chosen-select  chosen-search form-control']) }}
        </div>
    </div>
    @if ($errors->has('state'))
        <span class="help-block">
            <strong>{{ $errors->first('state') }}</strong>
        </span>
    @endif
</div>
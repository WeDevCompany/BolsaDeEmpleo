<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <div class="row extra-padding">
        <div class="input-field col-md-4">
            {{ Form::label('state', 'Provincia',['class' => "label-select"]) }}
            {{ Form::select('state',array('1' => 'A', '2' => 'B', '50' => 'C', '4' => 'D', '5' => 'E', '6' => 'F'), null,['class' => 'chosen-select  chosen-search form-control']) }}
            @if ($errors->has('state'))
                <span class="help-block">
                    <strong>{{ $errors->first('state') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-field col-md-8">
            {{ Form::label('city', 'Ciudad',['class' => "label-select"]) }}
            {{ Form::select('city',array('1' => 'A', '2' => 'B', '50' => 'C', '4' => 'D', '5' => 'E', '6' => 'F'), null,['class' => 'chosen-select form-control']) }}
            @if ($errors->has('city'))
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
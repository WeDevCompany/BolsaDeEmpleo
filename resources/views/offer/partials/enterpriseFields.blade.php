<div style="margin: 1em 0 1em" class="control-group{{ $errors->has('enterpriseResponsable') ? ' has-error' : '' }} control-group{{ $errors->has('workcenter') ? ' has-error' : '' }}">
    <div class="row">
        <div class="input-field col-md-6">
            {{ Form::select('workcenter', $workCenters, null,['id' => "workcenter", 'class' => 'select form-control']) }}
            {{ Form::label('workcenter', 'Centro de trabajo', ['class' => 'label-select-minor']) }}
            @if ($errors->has('workcenter'))
                <span class="help-block">
                    <strong>{{ $errors->first('workcenter') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-field col-md-6 select-minor">
            {{ Form::select('enterpriseResponsable', ['L' => 'Large', 'S' => 'Small'], null,['id' => "enterpriseResponsable", 'class' => 'select form-control']) }}
            {{ Form::label('enterpriseResponsable', 'Responsable del centro de trabajo', ['class' => 'label-select-minor']) }}
            @if ($errors->has('enterpriseResponsable'))
               <span class="help-block">
                    <strong>{{ $errors->first('enterpriseResponsable') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
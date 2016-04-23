    <div class="form-group{{ $errors->has('cycles') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
        {{ Form::label('cycles', 'Ciclos cursados',['style' => 'margin-top: -5%']) }}
        {{ Form::select('cycles',array('1' => 'A', '2' => 'B', '50' => 'C', '4' => 'D', '5' => 'E', '6' => 'F'), null,['class' => 'chosen-select form-control', 'multiple' => true, 'id' => 'select-chosen']) }}
            </div>
    </div>
        @if ($errors->has('cycles'))
            <span class="help-block">
                <strong>{{ $errors->first('cycles') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('yearFrom') ? ' has-error' : '' }}">
        <div id="years">

        </div>
        @if ($errors->has('yearFrom') || $errors->has('yearTo'))
            <span class="help-block">
                <strong>{{ $errors->first('yearFrom') }}</strong>
                <strong style="padding-left: 27%">{{ $errors->first('yearTo') }}</strong>
            </span>
        @endif
    </div>

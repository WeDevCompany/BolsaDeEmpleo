        <div class="form-group{{ $errors->has('cycles') ? ' has-error' : '' }}">
            <div class="row">
                <div class="input-field col-md-12">
                    {{ Form::label('cycles', 'Ciclos cursados',['style' => 'margin-top: -3em']) }}
                    {{ Form::select('cycles', [], null,['class' => 'form-control',  'id' => 'cycles']) }}
                </div>
            </div>
        </div>


<!-- GENERAR SELECT ENTERO
    <div class="form-group{{ $errors->has('cycles') ? ' has-error' : '' }}">
        <div class="row">
        <div class="input-field col-md-12" id="selectCycles">
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
    </div> -->

    <div class="form-group{{ $errors->has('cycles') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
        {{ Form::label('cycles', 'Ciclos cursados',['style' => 'margin-top: -5%']) }}
        {{ Form::select('cycles',array('1' => 'Large', '2' => 'Small'), null,['class' => 'chosen-select form-control', 'multiple' => true]) }}
            </div>
    </div>
        @if ($errors->has('cycles'))
            <span class="help-block">
                <strong>{{ $errors->first('cycles') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('yearFrom') ? ' has-error' : '' }}">
        <div class="row">
        <div class="input-field col-md-6">
            {{ Form::label('yearFrom', 'Año de inicio') }}
            {{ Form::text('yearFrom', null) }}
        </div>
        <div class="input-field col-md-6">
            {{ Form::label('yearTo', 'Año de fin') }}
            {{ Form::text('yearTo', null) }}
        </div>
    </div>
        @if ($errors->has('yearFrom') || $errors->has('yearTo'))
            <span class="help-block">
                <strong>{{ $errors->first('yearFrom') }}</strong>
                <strong style="padding-left: 27%">{{ $errors->first('yearTo') }}</strong>
            </span>
        @endif
    </div>

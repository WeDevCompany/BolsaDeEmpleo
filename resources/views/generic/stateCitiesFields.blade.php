<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <div class="row extra-padding">
        <div class="input-field col-md-4">
            {{ Form::label('state', 'Provincia',['class' => "label-select"]) }}
            <select name="state" class="chosen-select chosen-search form-control" id="state">
                @foreach($states as $id => $state)
                    @if ($id == 0)
                        <option value="{{ $id }}" selected="selected">{{ $state }}</option>
                    @else
                        <option value="{{ $id }}">{{ $state }}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->has('state'))
                <span class="help-block">
                    <strong>{{ $errors->first('state') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-field col-md-8">
            {{ Form::label('citie', 'Ciudad',['class' => "label-select"]) }}
            <select name="citie" class="chosen-select form-control" id="citie">
                @foreach($cities as $ArrayId => $citie)
                    <option value="{{ $citie['id'] }}">{{ $citie['name'] }}</option>
                @endforeach
            </select>
            @if ($errors->has('city'))
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
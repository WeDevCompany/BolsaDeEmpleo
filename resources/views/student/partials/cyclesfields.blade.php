        <div class="form-group{{ $errors->has('cycles') ? ' has-error' : '' }}">
            <div class="row">
                <div class="input-field col-md-12">
                    {{ Form::label('cycles', 'Ciclos cursados',['class' => 'label-select']) }}
                    {{ Form::select('cycles', [], null,['class' => 'form-control',  'id' => 'cycles']) }}
                </div>
            </div>
        </div>

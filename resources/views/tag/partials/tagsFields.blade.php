<div class="control-group">
    <div class="row">
		<div class="col-md-12 extra-padding">
    		@if(!isset($tags[$id]))
    			<label for="oldBody" class="label-select">Tags actuales <b style="color:red">(Esta asignatura no tiene tags para este año).</b></label>
    		@else
    			{{ Form::label('oldBody', 'Tags actuales',['class' => 'label-select']) }}
    		@endif
        	<select name="oldBody[{{$id}}][]" id="oldBody[{{$id}}]" class="chosen-select form-control" multiple="multiple"
        		@if(!isset($tags[$id]))
        			disabled="disabled"
        		@endif
        	>
        		@if(is_array($tags) && isset($tags[$id]))
        			@foreach($tags[$id] as $idTag => $name)	
						<option name="tag[{{ $idTag }}]" value="{{ $idTag }}" selected="selected">{{ $name }}</option>
					@endforeach
				@endif
        	</select>
    	</div>
    </div>
</div>
<div class="control-group">
    <div class="row">
        <div class="input-field col-md-12">
        	{{ Form::label('newBody', 'Añade nuevos tags',['style' => 'transform:none; margin-top:-2.5em']) }}
            {{ Form::textarea('newBody', null,['id' => "newBody[$id]", 'class' => 'border-blue newTextAreaTags']) }}
        </div>
    </div>
</div>
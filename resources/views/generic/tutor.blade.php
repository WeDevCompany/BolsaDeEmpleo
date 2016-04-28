<div class="input-field{{ $errors->has('tutor') ? ' has-error' : '' }} col-md-12 tutor">
    {{ Form::checkbox('tutor', 'tutor', false, ['id' => 'tutor']) }}
    {{ Form::label('tutor', '¿Es tutor?', ['for' => 'tutor']) }}
</div>

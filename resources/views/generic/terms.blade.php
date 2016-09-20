
<div class="input-field{{ $errors->has('terminos') ? ' has-error' : '' }} col-md-12 terminos">

    {{ Form::checkbox('terminos', 'acepto', true, ['id' => 'terminos']) }}
    {{ Form::label('terminos', 'Acepto los terminos de esta aplicación', ['for' => 'terminos']) }}
    <div class="">
        <a  href="#" class="btn btn-link" data-toggle="modal" data-target="#terms">(Leer términos)</a>
    </div>
    @include('partials.modal.termsModal')
</div>

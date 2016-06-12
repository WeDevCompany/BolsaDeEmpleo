<div class="row extra-padding-bottom">
    <p><b>Responsables del centro de trabajo:</b></p>
    @foreach($responsables as $key => $responsable)
        @if($workCenter->id == $responsable->idWorkCenter)
            <span class="descripcion">{!! $responsable->name !!}</span><br>
        @endif
    @endforeach
</div>
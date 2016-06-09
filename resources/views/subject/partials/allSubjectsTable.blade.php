<table class="table table-striped">
	<tbody id="allSubjects">
		<tr>
            <th class="col-md-11">Nombre</th>
            <th class="col-md-1 subjectArrow no-padding">
                <div class="show-responsive">
                    <i id="cabeceras" class="fa fa-btn fa-arrow-circle-down"></i>
                </div>
                <div class="hidden-media">
                    <i id="cabeceras" class="fa fa-btn fa-arrow-circle-right"></i>
                </div>         
            </th>
        </tr>
		@foreach($allSubjects as $id => $subject)
            {{--*/ $found = false /*--}}
            @foreach($takedSubjects as $key => $subjectId)
                @if($id == $subjectId)
                    {{--*/ $found = true; /*--}}
                    <tr id="taked" style="background-color:#EEEEEE;" title="Esta asignatura es impartida por otro profesor.">
                    <?php break; ?>
                @endif
            @endforeach
            @if($found == false)
                <tr>
            @endif
            @if($found == false)
                <th class="col-md-11 subjectName">{{ $subject }}</th>
                <th class="col-md-1 subjectArrow no-padding">
                    <div class="show-responsive">
                        <i id="{{ $id }}" class="fa fa-btn fa-arrow-circle-down"></i>
                    </div>
                    <div class="hidden-media">
                        <i id="{{ $id }}" class="fa fa-btn fa-arrow-circle-right"></i>
                    </div>
                </th>
            @else
                <th class="col-md-11 subjectName">{{ $subject }}</th>
                <th class="col-md-1 no-padding"></th>
            @endif
    		</tr>
        @endforeach
    </tbody>
</table>
@if($_GET && isset($_GET['cycle']))
	<input class="hidden" type="password" name="cycleId" value="{{ $_GET['cycle'] }}">
@else
    <input class="hidden" type="password" name="cycleId" value="{{ $cycleId }}">
@endif
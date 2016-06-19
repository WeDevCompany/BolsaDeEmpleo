<table class="table table-striped">
	<tbody id="allSubjects">
		<tr>
            <th class="col-md-12 text-center">Nombre</th>
            <th class="col-md-1 subjectArrow no-padding"></th>
        </tr>
		@foreach($allSubjects as $id => $subject)
            {{--*/ $found = false /*--}}
            @foreach($takedSubjects as $key => $subjectId)
                @if($id == $subjectId)
                    {{--*/ $found = true; /*--}}
                    <tr id="taked" style="background-color:#dddddd;" title="Esta asignatura es impartida por otro profesor.">
                    <?php break; ?>
                @endif
            @endforeach
            @if($found == false)
                <tr>
            @endif
            @if($found == false)
                <td class="col-md-11 subjectName">{{ $subject }}</td>
                <td class="col-md-1 subjectArrow no-padding">
                    <div class="show-responsive">
                        <i id="{{ $id }}" class="fa fa-btn fa-arrow-circle-down"></i>
                    </div>
                    <div class="hidden-media">
                        <i id="{{ $id }}" class="fa fa-btn fa-arrow-circle-right"></i>
                    </div>
                </td>
            @else
                <td class="col-md-11 subjectName">{{ $subject }}</td>
                <td class="col-md-1 no-padding"></td>
            @endif
    		</tr>
        @endforeach
    </tbody>
</table>
@if($_GET && isset($_GET['cycle']))
	<input class="hidden" type="hidden" name="cycleId" value="{{ $_GET['cycle'] }}">
@else
    <input class="hidden" type="hidden" name="cycleId" value="{{ $cycleId }}">
@endif
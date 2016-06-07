<table class="table table-striped">
	<tbody id="allSubjects">
		<tr>
            <th class="col-md-11">Nombre</th>
            <th class="col-md-1 subjectArrow" style="padding:0"><i id="cabeceras" class="fa fa-btn fa-arrow-circle-right"></i></th>
        </tr>
		@foreach($allSubjects as $id => $subject)
            <tr>
                <th class="col-md-11 subjectName">{{ $subject }}</th>
                <th class="col-md-1 subjectArrow" style="padding:0"><i id="{{ $id }}" class="fa fa-btn fa-arrow-circle-right"></i><input type="checkbox" checked="checked" name="allSubjects[{{ $id }}]"></th>
    		</tr>
        @endforeach
    </tbody>
</table>
@if($_GET && isset($_GET['cycle']))
	<input style="display:none" type="password" name="cycleId" value="{{ $_GET['cycle'] }}">
@endif
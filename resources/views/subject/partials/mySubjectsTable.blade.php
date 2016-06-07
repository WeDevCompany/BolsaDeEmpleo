<table class="table table-striped">
	<tbody id="mySubjects">
		<tr id="cabecera">
			<th class="col-md-1 subjectArrow" style="padding:0"><i id="cabeceras" class="fa fa-btn fa-arrow-circle-left"></i></th>
            <th class="col-md-11">Nombre</th>
        </tr>
		@foreach($mySubjects as $id => $subject)
            <tr>
                <th class="col-md-1 subjectArrow" style="padding:0"><i id="{{ $id }}" class="fa fa-btn fa-arrow-circle-left"></i><input type="checkbox" checked="checked" name="mySubjects[{{ $id }}]"></th>
                <th class="col-md-11 subjectName">{{ $subject }}</th>
    		</tr>
        @endforeach
    </tbody>
</table>
@if($_GET && isset($_GET['yearFrom']))
	<input style="display:none" type="password" name="yearFromId" value="{{ $_GET['yearFrom'] }}">
@endif
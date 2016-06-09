<table class="table table-striped">
	<tbody id="mySubjects">
		<tr id="cabecera">
			<th class="col-md-1 subjectArrow no-padding">
                <div class="show-responsive">
                    <i id="cabeceras" class="fa fa-btn fa-arrow-circle-up"></i>
                </div>
                <div class="hidden-media">
                    <i id="cabeceras" class="fa fa-btn fa-arrow-circle-left"></i>
                </div>         
            </th>
            <th class="col-md-10">Nombre</th>
            <th class="col-md-1">Tags</th>
        </tr>
		@foreach($mySubjects as $id => $subject)
            <tr>
                <th class="col-md-1 subjectArrow no-padding">
                    <div class="show-responsive">
                        <i id="{{ $id }}" class="fa fa-btn fa-arrow-circle-up"></i>
                    </div>
                    <div class="hidden-media">
                        <i id="{{ $id }}" class="fa fa-btn fa-arrow-circle-left"></i>
                    </div>
                </th>
                <th class="col-md-10 subjectName">{{ $subject }}</th>
                <th class="col-md-1">
                    <button type="button" class="btn btn-warning btn-login-media hoverable waves-effect waves-light editTag" data-toggle="modal" data-target="#myModal{{ $id }}" id="editTags">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                </th>
    		</tr>
        @endforeach
    </tbody>
</table>
@if($_GET && isset($_GET['yearFrom']))
    <input class="hidden" type="password" name="yearFromId" value="{{ $_GET['yearFrom'] }}">
@else
    <input class="hidden" type="password" name="yearFromId" value="{{ $subjectYear }}">
@endif
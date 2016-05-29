{{ Form::open(['url' => [$urlDelete, 'USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) }}
{{ Form::close() }}
@include('partials.modal.deleteModal')
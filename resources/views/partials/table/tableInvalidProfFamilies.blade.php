@if ($errors->has('$profFamiliesInactives'))
    <span class="help-block">
        <strong>{{ $errors->first('$profFamiliesInactives') }}</strong>
    </span>
@endif
<div class="row"></div>
<div class="row">
    @include("profFamilies.partials.createNewProfFamily")
</div>

<div class="scroll">
    <table class="table table-condensed table-hover">
        <thead class"thead-inverse">
        <tr class="info">
            <th class="centrado">#</th>
            <th class="centrado">Nombre de la familia profesional</th>
            <th class="centrado">Edición</th>
            <th class="centrado">Activar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($profFamiliesInactives as $profFamilie)
            <tr data-id="{{ $profFamilie->id }}">
                <td scope="row" class="centrado">{!! $profFamilie->id !!}</td>
                <td class="min-with-100">{!! $profFamilie->name !!}</td>
                <td class="centrado">
                    <a href="#" class="btn btn-warning waves-effect waves-light btn-xs" data-toggle="modal" data-target="#editProfFamily{{ $profFamilie->id }}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                </td>
                <td class="centrado">
                    <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
                </td>
            </tr>

            @include('partials.modal.editProfFamily')

        @endforeach
        </tbody>
    </table>
    {!! $profFamiliesInactives->render() !!}

</div>
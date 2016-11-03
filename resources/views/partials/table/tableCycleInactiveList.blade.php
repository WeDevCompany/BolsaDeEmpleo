<table class="table table-condensed table-hover">
    <thead class"thead-inverse">
        <tr class="info">
            <th class="centrado">Restaurar</th>
            <th class="centrado">#</th>
            <th class="centrado">Nombre</th>
            <th class="centrado">Reactivar</th>
            <th class="centrado">Borrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cycles as $cycle)
            <tr data-id="{!! $cycle->id !!}">
                <td>
                    <p>
                        <input type="checkbox" id="ciclo_{!! $cycle->id !!}" value="{!! $cycle->id !!}" name="ciclo[]"  />
                        <label for="ciclo_{!! $cycle->id !!}"></label>
                    </p>
                </td>
                <td scope="row" class="centrado">{!! $cycle->id !!}</td>
                <td class="min-with-100">{!! $cycle->name !!}</td>
                <td class="centrado">
                    <a href="#" class="btn btn-default waves-effect waves-light btn-xs" data-toggle="modal" data-target="#cycleModal{{ $cycle->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Restaurar</a>
                </td>
                <td class="centrado">
                    <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($errors->has('$profFamiliesInactives'))
    <span class="help-block">
        <strong>{{ $errors->first('$profFamiliesInactives') }}</strong>
    </span>
@endif
<div class="row"></div>
<div class="row">
    <div class="col-sm-12 text-center">
        <p><b>Total de familias profesionales activas:</b> {{count($profFamiliesInactives)}}</p>
    </div>
</div>
@if(count($profFamiliesInactives) == 0)
    <div class="row">
        <div class="col-sm-12 text-center">
            <p><b>No existen familias profesionales inactivas</b></p>
        </div>
    </div>
@else
    <div class="scroll">
        <table class="table table-condensed table-hover">
            <thead class"thead-inverse">
            <tr>
                <th>#</th>
                <th>Nombre de la familia profesional</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($profFamiliesInactives as $profFamilie)
                <tr data-id="{{ $profFamilie->id }}">
                    <td scope="row">{!! $profFamilie->id !!}</td>
                    <td>{!! $profFamilie->name !!}</td>
                    <td>
                        <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif()

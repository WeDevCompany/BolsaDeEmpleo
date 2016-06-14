@if ($errors->has('profFamilies'))
    <span class="help-block">
        <strong>{{ $errors->first('profFamilies') }}</strong>
    </span>
@endif
<div class="row"></div>
<div class="row">
    <div class="col-sm-6">
        <p><b>Total empresas borradas:</b> {{$profFamilies->count()}}</p>
    </div>
    <div class="col-sm-6">
        <p>
            <b>Total de páginas:</b> {{$profFamilies->lastPage()}}
        </p>
    </div>
</div>
<div class="scroll">
    <table class="table table-condensed table-hover">
        <thead class"thead-inverse">
            <tr>
                <th>Validar</th>
                <th>#</th>
                <th>Nombre de la familia profesional</th>
                <th style="text-align:center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profFamilies as $profFamilie)
                <tr data-id="{{ $profFamilie->id }}">
                    <td>
                        <p>
                            <input type="checkbox" id="profFamilie_{!! $profFamilie->id !!}" value="{!! $profFamilie->id !!}" name="empresa[]"  />
                            <label for="profFamilie_{!! $profFamilie->id !!}"></label>
                        </p>
                    </td>
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
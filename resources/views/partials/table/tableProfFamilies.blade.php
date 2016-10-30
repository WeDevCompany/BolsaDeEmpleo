@if ($errors->has('profFamilies'))
    <span class="help-block">
        <strong>{{ $errors->first('profFamilies') }}</strong>
    </span>
@endif
<div class="row"></div>
<div class="row">
    <div class="col-sm-12 text-center">
        <button type="button" class="btn btn-primary btn-login-media waves-effect waves-light" data-toggle="modal" data-target="#createProfFamily">
            <div class="show-responsive">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>
            <div class="hidden-media">
                <i class="fa fa-plus" aria-hidden="true"></i> <span class="hidden-media">Nueva familia profesional</span>
            </div>
        </button>
    </div>
</div>
<div class="scroll">
    <table class="table table-condensed table-hover">
        <thead class"thead-inverse">
            <tr class="info">
                <th class="centrado">#</th>
                <th class="centrado">Nombre de la familia profesional</th>
                <th class="centrado">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profFamilies as $profFamilie)
                <tr data-id="{{ $profFamilie->id }}">
                    <td scope="row" class="centrado">{!! $profFamilie->id !!}</td>
                    <td class="min-with-100">{!! $profFamilie->name !!}</td>
                    <td class="centrado">
                        <a href="#" class="btn btn-warning waves-effect waves-light btn-xs" data-toggle="modal" data-target="#editProfFamily{{ $profFamilie->id }}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#deleteProfFamily{{ $profFamilie->id }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @include('partials.modal.deleteProfFamily')
                @include('partials.modal.editProfFamily')
            @endforeach
        </tbody>
    </table>
    {!! $profFamilies->render() !!}
</div>
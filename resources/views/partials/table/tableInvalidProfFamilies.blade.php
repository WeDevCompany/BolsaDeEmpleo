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
    {{ Form::open(['url' => $urlPost, 'method' => 'POST']) }}
    {!! csrf_field() !!}
    <table class="table table-condensed table-hover">
        <thead class"thead-inverse">
        <tr class="info">
            <th class="centrado">#</th>
            <th class="centrado">Nombre de la familia profesional</th>
            <th class="centrado">Edición</th>
            <th class="centrado">Restaurar</th>
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
                <td>
                    <p class="centrado">
                        <input type="checkbox" id="profFamilie_{!! $profFamilie->id !!}" value="{!! $profFamilie->id !!}" name="profFamilie[]"  />
                        <label for="profFamilie_{!! $profFamilie->id !!}"></label>
                    </p>
                </td>
            </tr>

            @include('partials.modal.editProfFamily')

        @endforeach
        </tbody>
    </table>
    <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-login-media  waves-effect waves-light">
                <div class="show-responsive">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </div>
                <div class="hidden-media">
                    <i class="fa fa-btn fa-gavel"></i> <span class="hidden-media">Restaurar</span>
                </div>
            </button>
        </div>
    </div>
    {{ Form::close() }}
    {!! $profFamiliesInactives->render() !!}

</div>
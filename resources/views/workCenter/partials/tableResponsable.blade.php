                    @if ($errors->has('estudiante'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estudiante') }}</strong>
                        </span>
                    @endif
                    <div class="row"></div>
                    <div class="scroll">
                        <table class="table table-condensed table-hover">
                            <thead class"thead-inverse">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Dni</th>
                                    <th>Centro de trabajo</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($responsables as $responsable)
                                    <tr data-id="{{ $responsable->id }}">   
                                        <td>{!! $responsable->firstName !!}</td>
                                        <td>{!! $responsable->lastName !!}</td>
                                        <td>{!! $responsable->dni !!}</td>
                                        <td>{!! $responsable->nameWc !!}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning waves-effect waves-light btn-xs" data-toggle="modal" data-target="#editResponsableModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    @include('partials.modal.responsableEdit')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
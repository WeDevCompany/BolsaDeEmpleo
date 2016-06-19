                    <div class="row"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total profesores validados:</b> {{$verifiedTeacher->count()}}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <b>Total de páginas:</b> {{$verifiedTeacher->lastPage()}}
                            </p>
                        </div>
                    </div>
                    <div class="scroll">
                        <table class="table table-condensed table-hover">
                            <thead class"thead-inverse">
                                <tr>
                                    <th>Imagen</th>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Dni</th>
                                    <th>Email</th>
                                    <th>Familia Profesional</th>
                                    <th>Rol Administrador</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($verifiedTeacher as $teacher)
                                    <tr data-id="{!! $teacher->id !!}">
                                        <td><img src="{!! url('/img/imgUser/' . $teacher->carpeta . '/' .  $teacher->image) !!}" alt="Imagen del Estudiante" class="img-responsive img-circle img-navegador"></td>
                                        <td scope="row">{!! $teacher->id !!}</td>
                                        <td>{!! $teacher->FullName !!}</td>
                                        <td>{!! $teacher->dni !!}</td>
                                        <td><a href="mailto:{!! $teacher->email !!}" target="_blank">{!! $teacher->email !!}</a></td>
                                        <td>{!! $teacher->name !!}</td>
                                        <td>
                                            @if($teacher->rol !== 'administrador')
                                                <a href="#" class="btn btn-warning waves-effect waves-light btn-xs" data-toggle="modal" data-target="#adminModal{{ $teacher->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Convertir en admin</a>
                                            @else
                                                Ya es administrador
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @include('partials.modal.adminModal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
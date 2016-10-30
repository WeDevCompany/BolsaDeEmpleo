                    <div class="row"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total estudiantes validados:</b> {{$verifiedStudent->count()}}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <b>Total de páginas:</b> {{$verifiedStudent->lastPage()}}
                            </p>
                        </div>
                    </div>
                    <div class="scroll">
                        <table class="table table-condensed table-hover">
                            <thead class"thead-inverse">
                                <tr class="info">
                                    <th>Imagen</th>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Dni</th>
                                    <th>Email</th>
                                    <th>Familia Profesional</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($verifiedStudent as $student)
                                    <tr data-id="{!! $student->id !!}">
                                        <td><img src="{!! url('/img/imgUser/' . $student->carpeta . '/' .  $student->image) !!}" alt="Imagen del Estudiante" class="img-responsive img-circle img-navegador"></td>
                                        <td scope="row">{!! $student->id !!}</td>
                                        <td class="min-with-100">{!! $student->FullName !!}</td>
                                        <td>{!! $student->dni !!}</td>
                                        <td><a href="mailto:{!! $student->email !!}">{!! $student->email !!}</a></td>
                                        <td>{!! $student->name !!}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
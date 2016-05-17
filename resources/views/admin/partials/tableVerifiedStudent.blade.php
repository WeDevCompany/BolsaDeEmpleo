                    @if ($errors->has('estudiante'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estudiante') }}</strong>
                        </span>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total por estudiantes:</b> {{$verifiedStudent->count()}}</p>
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
                                <tr>
                                    <th>Imagen</th>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Dni</th>
                                    <th>Email</th>
                                    <th>Familia Profesional</th>
                                    <th colspan="2" style="text-align:center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($verifiedStudent as $student)
                                    <tr data-id="{!! $student->id !!}">
                                        <td scope="row">{!! $student->id !!}</td>
                                        <td><img src="{!! url('/img/imgUser/' . $student->carpeta . '/' .  $student->image) !!}" alt="Imagen del Estudiante" class="img-responsive img-circle img-navegador"></td>
                                        <td>{!! $student->FullName !!}</td>
                                        <td>{!! $student->dni !!}</td>
                                        <td>{!! $student->email !!}</td>
                                        <td>{!! $student->name !!}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger waves-effect waves-light btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success waves-effect waves-light btn-xs"><i class="fa fa-check" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
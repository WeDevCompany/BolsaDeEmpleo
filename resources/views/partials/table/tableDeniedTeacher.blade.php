                    @if ($errors->has('profesor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profesor') }}</strong>
                        </span>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total profesores borrados:</b> {{$deniedTeacher->count()}}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <b>Total de páginas:</b> {{$deniedTeacher->lastPage()}}
                            </p>
                        </div>
                    </div>
                    <div class="scroll">
                        <table class="table table-condensed table-hover">
                            <thead class"thead-inverse">
                                <tr>
                                    <th>Validar</th>
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
                                @foreach($deniedTeacher as $teacher)
                                <tr data-id="{!! $teacher->id !!}">
                                    <td>
                                        <p>
                                            <input type="checkbox" id="profesor_{!! $teacher->id !!}" value="{!! $teacher->id !!}" name="profesor[]"  />
                                            <label for="profesor_{!! $teacher->id !!}"></label>
                                        </p>
                                    </td>
                                    <td><img src="{!! url('/img/imgUser/' . $teacher->carpeta . '/' .  $teacher->image) !!}" alt="Imagen del Profesor" class="img-responsive img-circle img-navegador"></td>
                                    <td scope="row">{!! $teacher->id !!}</td>
                                    <td>{!! $teacher->FullName !!}</td>
                                    <td>{!! $teacher->dni !!}</td>
                                    <td><a href="mailto:{!! $teacher->email !!}">{!! $teacher->email !!}</a></td>
                                    <td>{!! $teacher->name !!}</td>
                                    <td>
                                          <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                          <a href="#" class="btn btn-success waves-effect waves-light btn-xs"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

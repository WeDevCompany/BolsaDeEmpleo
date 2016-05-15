                    @if ($errors->has('profesor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profesor') }}</strong>
                        </span>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total por validar:</b> {{$invalidTeacher->count()}}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <b>Total de páginas:</b> {{$invalidTeacher->lastPage()}}
                            </p>
                        </div>
                    </div>
                    <div class="scroll">
                        <table class="table table-condensed table-hover">
                            <thead class"thead-inverse">
                                <tr>
                                    <th>Validar</th>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Dni</th>
                                    <th>Email</th>
                                    <th colspan="2" style="text-align:center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invalidTeacher as $teacher)
                                <tr data-id="{{ $teacher->id }}">
                                    <td>
                                        <p>
                                            <input type="checkbox" id="profesor_{{ $teacher->id }}" value="{{ $teacher->id }}" name="profesor[]"  />
                                            <label for="profesor_{{ $teacher->id }}"></label>
                                        </p>
                                    </td>
                                    <td scope="row">{!! $teacher->id !!}</td>
                                    <td>{!! $teacher->firstName !!}</td>
                                    <td>{!! $teacher->dni !!}</td>
                                    <td>{!! $teacher->email !!}</td>
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

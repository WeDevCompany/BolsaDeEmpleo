                    @if ($errors->has('estudiante'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estudiante') }}</strong>
                        </span>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total por validar:</b> </p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <b>Total de páginas:</b>
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
                                @foreach($invalidStudent as $key)
                                    @foreach($key as $student)
                                        <tr data-id="{{ $student->id }}">
                                            <td>
                                                <p>
                                                    <input type="checkbox" id="estudiante_{{ $student->id }}" value="{{ $student->id }}" name="estudiante[]"  />
                                                    <label for="estudiante_{{ $student->id }}"></label>
                                                </p>
                                            </td>
                                            <td scope="row">{!! $student->id !!}</td>
                                            <td>{!! $student->firstName !!}</td>
                                            <td>{!! $student->dni !!}</td>
                                            <td>{!! $student->email !!}</td>
                                            <td>
                                                  <a href="#" class="btn btn-danger waves-effect waves-light btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
                                                  <a href="#" class="btn btn-success waves-effect waves-light btn-xs"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    @if ($errors->has('estudiante'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estudiante') }}</strong>
                        </span>
                    @endif
                    <table class="table table-striped">
                        <tr>
                            <th>Validar</th>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Dni</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($invalidStudent as $student)
                        <tr data-id="{{ $student->id }}">
                            <td>
                                <p>
                                    <input type="checkbox" id="estudiante_{{ $student->id }}" value="{{ $student->id }}" name="estudiante[]"  />
                                    <label for="estudiante_{{ $student->id }}"></label>
                                </p>
                            </td>
                            <th>{{ $student->id }}</th>
                            <th>{{ $student->firstName }}</th>
                            <th>{{ $student->dni }}</th>
                            <th></th>
                            <th>
                                <a href="" class="btn-delete">Eliminar</a>
                            </th>
                        </tr>
                        @endforeach
                    </table>
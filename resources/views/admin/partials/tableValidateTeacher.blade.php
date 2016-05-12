                    @if ($errors->has('profesor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profesor') }}</strong>
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
                        @foreach($invalidTeacher as $teacher)
                        <tr data-id="{{ $teacher->id }}">
                            <td>
                                <p>
                                    <input type="checkbox" id="profesor_{{ $teacher->id }}" value="{{ $teacher->id }}" name="profesor[]"  />
                                    <label for="profesor_{{ $teacher->id }}"></label>
                                </p>
                            </td>
                            <th>{{ $teacher->id }}</th>
                            <th>{{ $teacher->firstName }}</th>
                            <th>{{ $teacher->dni }}</th>
                            <th></th>
                            <th>
                                <a href="" class="btn-delete">Eliminar</a>
                            </th>
                        </tr>
                        @endforeach
                    </table>
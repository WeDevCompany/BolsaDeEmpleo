                    @if ($errors->has('empresa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('empresa') }}</strong>
                        </span>
                    @endif
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total empresas borradas:</b> {{$deniedEnterprise->count()}}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <b>Total de páginas:</b> {{$deniedEnterprise->lastPage()}}
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
                                    <th>Empresa</th>
                                    <th>Cif</th>
                                    <th>Email</th>
                                    <th>Centro de trabajo principal</th>
                                    <th>Borrardo definitivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deniedEnterprise as $enterprise)
                                    <tr data-id="{{ $enterprise->id }}">
                                        <td>
                                            <p>
                                                <input type="checkbox" id="empresa_{!! $enterprise->id !!}" value="{!! $enterprise->id !!}" name="empresa[]"  />
                                                <label for="empresa_{!! $enterprise->id !!}"></label>
                                            </p>
                                        </td>
                                        <td><img src="{!! url('/img/imgUser/' . $enterprise->carpeta . '/' .  $enterprise->image) !!}" alt="Imagen del Estudiante" class="img-responsive img-circle img-navegador"></td>
                                        <td scope="row">{!! $enterprise->id !!}</td>
                                        <td>{!! $enterprise->name !!}</td>
                                        <td>{!! $enterprise->cif !!}</td>
                                        <td><a href="mailto:{!! $enterprise->email !!}">{!! $enterprise->email !!}</a></td>
                                        <td>{!! $enterprise->workCenterName !!}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
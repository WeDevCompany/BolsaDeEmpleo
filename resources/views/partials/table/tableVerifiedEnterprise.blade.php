                    <div class="row"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total empresas validados:</b> {{$verifiedEnterprise->count()}}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <b>Total de páginas:</b> {{$verifiedEnterprise->lastPage()}}
                            </p>
                        </div>
                    </div>
                    <div class="scroll">
                        <table class="table table-condensed table-hover">
                            <thead class"thead-inverse">
                                <tr>
                                    <th>Imagen</th>
                                    <th>#</th>
                                    <th>Empresa</th>
                                    <th>Cif</th>
                                    <th>Email</th>
                                    <th>Centro de trabajo principal</th>
                                    <th colspan="2" style="text-align:center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($verifiedEnterprise as $enterprise)
                                    <tr data-id="{!! $enterprise->id !!}">
                                        <td><img src="{!! url('/img/imgUser/' . $enterprise->carpeta . '/' .  $enterprise->image) !!}" alt="Imagen de la Empresa" class="img-responsive img-circle img-navegador"></td>
                                        <td scope="row">{!! $enterprise->id !!}</td>
                                        <td>{!! $enterprise->name !!}</td>
                                        <td>{!! $enterprise->cif !!}</td>
                                        <td><a href="mailto:{!! $enterprise->email !!}">{!! $enterprise->email !!}</a></td>
                                        <td>{!! $enterprise->workCenterName !!}</td>
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
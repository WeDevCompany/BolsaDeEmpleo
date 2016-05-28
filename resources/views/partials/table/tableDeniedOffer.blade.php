                    @if ($errors->has('oferta'))
                        <span class="help-block">
                            <strong>{{ $errors->first('oferta') }}</strong>
                        </span>
                    @endif
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total ofertas por validar:</b> {{$deniedOffer->count()}}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <b>Total de páginas:</b> {{$deniedOffer->lastPage()}}
                            </p>
                        </div>
                    </div>
                    <div class="scroll">
                        <table class="table table-condensed table-hover">
                            <thead class"thead-inverse">
                                <tr>
                                    <th>Validar</th>
                                    <th>Imagen</th>
                                    <th>Oferta</th>
                                    <th>Empresa</th>
                                    <th>Cif</th>
                                    <th>Centro de trabajo</th>
                                    <th>Email</th>
                                    <th>Familia Profesional</th>
                                    <th colspan="2" style="text-align:center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deniedOffer as $offer)
                                    <tr data-id="{{ $offer->id }}">
                                        <td>
                                            <p>
                                                <input type="checkbox" id="oferta_{!! $offer->id !!}" value="{!! $offer->id !!}" name="oferta[]"  />
                                                <label for="oferta_{!! $offer->id !!}"></label>
                                            </p>
                                        </td>
                                        <td><img src="{!! url('/img/imgUser/' . $offer->carpeta . '/' .  $offer->image) !!}" alt="Imagen del Estudiante" class="img-responsive img-circle img-navegador"></td>
                                        <td>{!! $offer->title !!}</td>
                                        <td>{!! $offer->enterpriseName !!}</td>
                                        <td>{!! $offer->cif !!}</td>
                                        <td>{!! $offer->workCenterName !!}</td>
                                        <td><a href="mailto:{!! $offer->email !!}">{!! $offer->email !!}</a></td>
                                        <td>{!! $offer->name !!}</td>
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
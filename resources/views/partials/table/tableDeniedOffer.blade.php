                    @if ($errors->has('oferta'))
                        <span class="help-block">
                            <strong>{{ $errors->first('oferta') }}</strong>
                        </span>
                    @endif
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Total ofertas borradas:</b> {{$deniedOffer->count()}}</p>
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
                                <tr  class="info">
                                    <th class="centrado">Validar</th>
                                    <th class="centrado">Imagen</th>
                                    <th class="centrado">Oferta</th>
                                    <th class="centrado">Empresa</th>
                                    <th class="centrado">Cif</th>
                                    <th class="centrado">Centro de trabajo</th>
                                    <th class="centrado">Email</th>
                                    <th class="centrado">Familia Profesional</th>
                                    <th class="centrado">Borrardo definitivo</th>
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
                                        <td class="centrado"><img src="{!! url('/img/imgUser/' . $offer->carpeta . '/' .  $offer->image) !!}" alt="Imagen de la Empresa" class="img-responsive img-circle img-navegador"></td>
                                        <td class="centrado">{!! $offer->title !!}</td>
                                        <td class="min-with-100">{!! $offer->enterpriseName !!}</td>
                                        <td class="centrado">{!! $offer->cif !!}</td>
                                        <td class="centrado">{!! $offer->workCenterName !!}</td>
                                        <td class="centrado"><a href="mailto:{!! $offer->email !!}">{!! $offer->email !!}</a></td>
                                        <td class="centrado">{!! $offer->name !!}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
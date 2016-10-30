<!-- Modal -->
<div class="modal fade" id="hiredModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::model($offer, ['url' => 'empresa/oferta/contratados', 'method' => 'post']) }}
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Estudiantes Contratados</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    {{ Form::hidden('idOffer', $offer->id, ['class' => 'form-control']) }}
                    {{ Form::label('hired', 'Estudiantes Contratados') }}
                    {{ Form::number('hired', $offer->hired, ['class' => 'form-control', 'max' => '10']) }}
                </div>
                <!--Footer-->
                    <div class="modal-footer">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-default waves-effect waves-light pull-left" data-dismiss="modal">
                                <div class="show-responsive">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                                <div class="hidden-media">
                                    <i class="fa fa-times"></i> <span class="hidden-media">Cerrar</span>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                <div class="show-responsive">
                                    <i class="fa fa-btn fa-users" aria-hidden="true"></i>
                                </div>
                                <div class="hidden-media">
                                    <i class="fa fa-btn fa-users"></i> <span class="hidden-media">Editar</span>
                                </div>
                            </button>
                        </div>
                    </div>
            </div>
            <!--/.Content-->
        {{ Form::close() }}
    </div>
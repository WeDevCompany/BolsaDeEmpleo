<!-- Modal -->
<div class="modal fade" id="deleteOffer" tabindex="-1" role="dialog" aria-labelledby="deleteOffer" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::model($offer, ['url' => \Auth::user()->rol . '/oferta/borrar', 'method' => 'post']) }}
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="deleteOffer">Borrar Oferta</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    {{ Form::hidden('idOffer', $offer->id, ['class' => 'form-control']) }}
                    ¿Desea borrar la oferta?.
                </div>
                <!--Footer-->
                    <div class="modal-footer">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary waves-effect waves-light pull-left" data-dismiss="modal">
                                <div class="show-responsive">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                                <div class="hidden-media">
                                    <i class="fa fa-times"></i> <span class="hidden-media">Cerrar</span>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger waves-effect waves-light" id="softDeletes">
                                <div class="show-responsive">
                                    <i class="fa fa-eraser" aria-hidden="true"></i>
                                </div>
                                <div class="hidden-media">
                                    <i class="fa fa-eraser" aria-hidden="true"></i> <span class="hidden-media">Borrar</span>
                                </div>
                            </button>
                        </div>
                    </div>
            </div>
            <!--/.Content-->
        {{ Form::close() }}
    </div>
</div>
<!-- /.Live preview-->
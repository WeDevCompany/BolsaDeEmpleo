<!-- Modal -->
<div class="modal fade" id="editResponsableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::model($responsable, ['url' => \Auth::user()->rol . '/responsable/editar', 'method' => 'post', 'id' => 'enterprise-register-form']) }}
            <!--Content-->
            <div class="modal-content modal-register">
                <!--Header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editar Responsable</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    {{ Form::hidden('id', null, ['class' => 'form-control']) }}
                    <fieldset id="fieldWorkAll0">
                            <section>
                                <fieldset id="fieldResponsable0">
                                <legend style="width: auto;">Crear Responsable del centro</legend>
                                    @include('workCenter.partials.enterpriseresponsablefields')
                                </fieldset>
                            </section>
                        </fieldset>
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
                            <button type="submit" class="btn btn-warning waves-effect waves-light">
                                <div class="show-responsive">
                                    <i class="fa fa-btn fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="hidden-media">
                                    <i class="fa fa-pencil-square-o"></i> <span class="hidden-media">Editar</span>
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
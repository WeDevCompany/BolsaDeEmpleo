<!-- Modal -->
<div class="modal fade" id="createResponsableModal" tabindex="-1" role="dialog" aria-labelledby="createWorkCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::open(['url' => \Auth::user()->rol . '/responsable/crear', 'method' => 'post', 'id' => 'enterprise-register-form']) }}
            <!--Content-->
            <div class="modal-content modal-register">
                <!--Header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editar Comentario</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <fieldset id="fieldWorkAll0">
                            <legend style="width: auto;">Centro de trabajo</legend>
                            <section>
                                <fieldset id="fieldWorkCity0">
                                    <div class="input-field col-md-12 select-minor">
                                        {{ Form::select('idWorkCenter', $enterpriseCenters, null,['id' => "idWorkCenter", 'class' => 'select form-control', 'required' => 'true', 'title' => 'Centros de trabajo', 'data-toggle' => 'tooltip']) }}
                                        {{ Form::label('idWorkCenter', 'Centro de trabajo', ['class' => 'label-select-minor']) }}
                                        @if ($errors->has('idWorkCenter'))
                                           <span class="help-block">
                                                <strong>{{ $errors->first('idWorkCenter') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </fieldset>
                                </fieldset>
                                <fieldset id="fieldResponsable0">
                                <legend style="width: auto;">Crear Responsable del centro</legend>
                                	@include('enterprise.partials.enterpriseresponsablefields')
                                </fieldset>
                                <div id="divAddResponsable" class="text-center">
                                    @include('enterprise.partials.btnAddEnterpriseResponsable')
                                </div>
                            </section>
                        </fieldset>
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
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <div class="show-responsive">
                                    <i class="fa fa-btn fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="hidden-media">
                                    <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Crear</span>
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
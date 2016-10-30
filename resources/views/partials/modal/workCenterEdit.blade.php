<!-- Modal -->
<div class="modal fade" id="editWorkCenter{!! $workCenter->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::model($workCenter, ['url' => \Auth::user()->rol . '/centro/editar', 'method' => 'post', 'id' => 'enterprise-register-form']) }}
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
                    {{ Form::hidden('id', null, ['class' => 'form-control']) }}
                    <fieldset id="fieldWorkAll0">
                            <legend style="width: auto;">Centro de trabajo</legend>
                            <section>
                                <fieldset id="fieldWorkCity0">
                                    <legend style="width: auto;">Datos del centro</legend>
                                    @include('enterprise.partials.workcenterfields')
                                    @include('generic.stateCitiesFields')
                                </fieldset>
                                <fieldset id="fieldResponsable0">
                                    <legend style="width: auto;">Responsable del centro</legend>
                                    <div class="control-group{{ $errors->has('responsable') ? ' has-error' : '' }}">
                                        <div class="row">
                                            <div class="input-field col-md-12">
                                                <i class="material-icons prefix">responsable</i>
                                                {{ Form::select('responsable[]', $allResponsables, null,['id' => "responsable", 'class' => 'chosen-select', 'multiple' => true,'required' => 'true', 'title' => 'Responsable del centro de trabajo', 'data-toggle' => 'tooltip']) }}
                                                {{ Form::label('responsable', 'Responsable centro de trabajo(*)', ['class' => 'label-select']) }}
                                                @if ($errors->has('responsable'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('responsable') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
                                    <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Editar</span>
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
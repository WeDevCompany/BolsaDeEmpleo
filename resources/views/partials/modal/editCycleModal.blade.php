<!-- Modal -->
<div class="modal fade" id="cycleModal{{ $cycle->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::open(['url' => 'administrador/configuración/ciclos/editar-ciclo/' . $cycle->id, 'method' => 'POST']) }}
            {!! csrf_field() !!}
            <!--Content-->
            <div class="modal-content border-orange">
                <!--Header-->
                <div class="modal-header text-center no-padding-bottom">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title titleTag" id="myModalLabel">Cambiar Rol a Administrador</h4>
                </div>
                <!--Body-->
                <div class="modal-body text-center">

                    {{ Form::label('profFamily', 'Familia profesional(*)', ['class' => 'label-select']) }}
                    {{ Form::select('profFamilies', $profFamilies, $cycle->profFamilie_id ,['class' => 'select form-control','required' => 'true', 'title' => 'Familia profesional', 'data-toggle' => 'tooltip']) }}

                    {{ Form::label('cycle', 'Ciclo') }}
                    {{ Form::text('name', $cycle->name,['id' => "cycle", 'required' => 'true', 'data-toggle' => 'tooltip']) }}

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
                        <button type="submit" class="btn btn-warning waves-effect waves-light">
                            <div class="show-responsive">
                                <i class="fa fa-btn fa-pencil-square-o" aria-hidden="true"></i>
                            </div>
                            <div class="hidden-media">
                                <i class="fa fa-btn fa-pencil-square-o"></i> <span class="hidden-media">Editar</span>
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
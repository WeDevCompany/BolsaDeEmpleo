<!-- Modal -->
<div class="modal fade" id="createCycle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::open(['url' => 'administrador/configuración/ciclos/crear', 'method' => 'POST']) }}
            {!! csrf_field() !!}
            <!--Content-->
            <div class="modal-content border-orange">
                <!--Header-->
                <div class="modal-header text-center no-padding-bottom">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title titleTag" id="myModalLabel">Nuevo Ciclo</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <section class="row">
                        <div class="col-md-12">
                            {{ Form::label('profFamily', 'Familia profesional(*)', ['class' => 'label-select']) }}
                            {{ Form::select('profFamilies', $profFamilies, null ,['class' => 'select form-control','required' => 'true', 'title' => 'Familia profesional', 'data-toggle' => 'tooltip']) }}

                            {{ Form::label('name', 'Nombre del ciclo') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'autofocus' => 'true', 'required' => 'true', 'pattern' => '^[a-zA-ZñÑÁÉÍÓÚáéíóú ]{1,75}$', 'title' => 'Nombre de una familia profesional válida']) }}
                        </div>
                    </section>
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
                                <i class="fa fa-btn fa-times" aria-hidden="true"></i>
                            </div>
                            <div class="hidden-media">
                                <i class="fa fa-check right"></i> <span class="hidden-media">Crear</span>
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
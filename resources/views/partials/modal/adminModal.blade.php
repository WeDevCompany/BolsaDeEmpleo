<!-- Modal -->
<div class="modal fade" id="adminModal{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::open(['url' => 'administrador/profesor/' . $teacher->id, 'method' => 'POST']) }}
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
                    ¿Desea cambiar el rol del profesor {{ $teacher->fullName }} a administrador?
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <div class="col-md-6">
                        <button type="button" class="btn btn btn-default waves-effect waves-light pull-left" data-dismiss="modal">
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
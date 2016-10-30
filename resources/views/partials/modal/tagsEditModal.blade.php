<!-- Modal -->
<div class="modal fade" id="myModal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{ Form::open(['url' => 'profesor/tags', 'method' => 'POST', 'id' => 'tag-form']) }}
            {!! csrf_field() !!}
            <!--Content-->
            <div class="modal-content border-orange">
                <!--Header-->
                <div class="modal-header text-center no-padding-bottom">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title titleTag" id="myModalLabel">Editar Tags</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <h5 class="text-center">{{ $subject }}</h5>
                    @include('tag.partials.tagsFields')
                    <input type="hidden" name="subject" value="{{ $id }}"></input>
                    @if($_GET && isset($_GET['yearFrom']))
                        <input class="hidden" type="hidden" name="yearFromId" value="{{ $_GET['yearFrom'] }}">
                    @else
                        <input class="hidden" type="hidden" name="yearFromId" value="{{ date('Y') }}">
                    @endif
                    @if($_GET && isset($_GET['cycle']))
                        <input class="hidden" type="hidden" name="cycleId" value="{{ $_GET['cycle'] }}">
                    @else
                        <input class="hidden" type="hidden" name="cycleId" value="{{ $cycleId }}">
                    @endif
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
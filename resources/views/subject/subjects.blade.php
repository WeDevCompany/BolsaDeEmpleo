@extends('layouts.app')
@section('css')
    @include('keyword.subject.subjectKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de valbolaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>
@endsection
@section('content')
@include('partials.nav.navParent')
	<div class="container">
	    <div class="row sin-margen">
	    	<div class="col-md-12 sin-margen">
	    		<div class="panel panel-default animated zoomIn">
	    			<div class="modal-content">
	    				<!-- Titulo -->
			            <div class="modal-header text-center">
			                <h4 class="title" data-title="">
			                	<i class="fa fa-book"></i>
			                	Asignaturas impartidas
			                </h4>
			            </div>
						<div class="panel-body">
							{{ Form::open(['url' => 'profesor/asignaturas', 'method' => 'GET', 'id' => 'search-subject-form']) }}
								<fieldset>
	                                <legend style="width:auto; margin-bottom:0">Ciclos impartidos</legend>
	                                <section id="cycles">
	                                	<div class="col-md-8 extra-padding-bottom extra-padding-1" style="padding-top:0">
		                                	@include('subject.partials.teacherCycles')
										</div>
										<div class="col-md-4 extra-padding-bottom extra-padding-1" style="padding-top:0">
		                                	@include('subject.partials.teacherYears')
										</div>
										<div class="form-group">
			                                <div class="col-md-12 text-center">
			                                    <button type="submit" class="btn btn-primary btn-login-media waves-effect waves-light" id="search">
			                                        <div class="show-responsive">
			                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
			                                        </div>
			                                        <div class="hidden-media">
			                                            <i class="fa fa-btn fa-graduation-cap"></i>&nbsp;&nbsp;<span class="hidden-media">Filtrar</span>
			                                        </div>
			                                    </button>
			                                </div>
			                            </div>
	                                </section>
	                            </fieldset>
	                        {{ Form::close() }}
							{{ Form::open(['url' => 'profesor/tutor', 'method' => 'POST', 'id' => 'tutor-form']) }}
                    			{!! csrf_field() !!}
		                        <div class="extra-padding-top col-md-12">
									<div class="col-sm-4">
										@include('generic.tutor')
									</div>
								@if(isset($tutors) && !empty($tutors) && is_array($tutors))
										<div class="col-sm-8 hide" id="oculto">
											{{ Form::label('cycleTutor', '¿De qué ciclo? (no olvide filtrar por año)',['class' => 'label-select']) }}
											<select name="cycleTutor" class="chosen-select form-control" id="cycleTutor">
												@foreach($tutors as $key => $array)
													<option value="{{ $array['id'] }}">{{ $array['name'] }}</option>
									            @endforeach
											</select>
											@if($_GET && isset($_GET['yearFrom']))
											    <input class="hidden" type="hidden" name="yearFromId" value="{{ $_GET['yearFrom'] }}">
											@else
											    <input class="hidden" type="hidden" name="yearFromId" value="{{ $subjectYear }}">
											@endif
										    @if ($errors->has('cycleTutor'))
								                <span class="help-block">
								                    <strong>{{ $errors->first('cycleTutor') }}</strong>
								                </span>
								            @endif
										</div>
									</div>
									<div class="col-md-12 text-center extra-padding">
	                                    <button type="submit" class="btn btn-primary btn-login-media waves-effect waves-light hide" disabled="disabled" id="newTutor">
	                                        <div class="show-responsive">
	                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
	                                        </div>
	                                        <div class="hidden-media">
	                                            <i class="fa fa-btn fa-graduation-cap"></i>&nbsp;&nbsp;<span class="hidden-media">Soy tutor</span>
	                                        </div>
	                                    </button>
	                                </div>
                            	@elseif(isset($tutors) && empty($tutors))
									<p id="oculto" class="hide" style="color:red">Necesita impartir una asignatura en algún ciclo para poder ser tutor de dicho ciclo.</p>
								</div>
								@endif
							{{ Form::close() }}
	                        {{ Form::open(['url' => 'profesor/asignaturas', 'method' => 'POST', 'id' => 'subject-form']) }}
                    			{!! csrf_field() !!}
								<fieldset>
	                                <section id="subjects">
		                                <div class="col-md-6">
		                                    <fieldset style="min-height:50px">
		                                        <legend style="width: auto;">Todas las asignaturas</legend>
												<div class="row">
													<div class="col-md-12">
														@include('subject.partials.allSubjectsTable')
									                </div>
								                </div>
		                                    </fieldset>
		                                </div>
		                                <div class="col-md-6">
		                                    <fieldset style="min-height:50px">
		                                        <legend style="width: auto;">Mis asignaturas</legend>
												<div class="row">
													<div class="col-md-12">
														@include('subject.partials.mySubjectsTable')
									                </div>
												</div>
		                                    </fieldset>
		                                </div>
	                                </section>
	                            </fieldset>
	                            <div class="form-group">
	                                <div class="col-md-12 text-center">
	                                    <button type="submit" class="btn btn-primary btn-login-media waves-effect waves-light" id="submit">
	                                        <div class="show-responsive">
	                                            <i class="fa fa-refresh" aria-hidden="true"></i>
	                                        </div>
	                                        <div class="hidden-media">
	                                            <i class="fa fa-btn fa-book"></i>&nbsp;&nbsp;<span class="hidden-media">Actualizar</span>
	                                        </div>
	                                    </button>
	                                </div>
	                            </div>
							{{ Form::close() }}
							<div id="allModals">
								@foreach($mySubjects as $id => $subject)
						            @include('partials.modal.tagsEditModal')
						        @endforeach
							</div>
						</div>
	    			</div>
	    		</div>
            </div>
        </div>
	</div>
@include('partials.footer.footerWelcome')
@endsection
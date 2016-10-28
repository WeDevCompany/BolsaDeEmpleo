@extends('layouts.app')
@section('content')
@include('partials.nav.navParent')
<div class="container">
    <div class="row">
        <div class="col-md-12 sin-margen">
            <div class="panel panel-default animated zoomIn">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-university"></i>Listado de ciclos</h4>
                    </div>
                    <div class="panel-body">

	                    <div class="scroll">
	                        <table class="table table-condensed table-hover">
	                            <thead class"thead-inverse">
	                                <tr>
	                                    <th>#</th>
	                                    <th>Nombre</th>
	                                    <th>Editar</th>
	                                    <th>Borrar</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                @foreach($cycles as $cycle)
	                                    <tr data-id="{!! $cycle->id !!}">
	                                        <td scope="row">{!! $cycle->id !!}</td>
	                                        <td>{!! $cycle->name !!}</td>
	                                        <td>
	                                            <a href="#" class="btn btn-warning waves-effect waves-light btn-xs" data-toggle="modal" data-target="#cycleModal{{ $cycle->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
	                                        </td>
	                                        <td>
	                                            <a href="#" class="btn btn-danger waves-effect waves-light btn-xs btn-delete" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i></a>
	                                        </td>
	                                    </tr>
	                                    @include('partials.modal.editCycleModal')
	                                @endforeach
	                            </tbody>
	                        </table>
	                    </div>
						{{ $cycles->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer.footerWelcome')
@endsection
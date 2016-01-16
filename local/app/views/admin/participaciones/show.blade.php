@extends('admin.adminlayouts.adminlayout')
@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
        {{HTML::style("assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css")}}
        {{HTML::style("assets/global/plugins/select2/select2.css")}}
        {{HTML::style("assets/global/plugins/jquery-multi-select/css/multi-select.css")}}
        {{HTML::style("assets/global/plugins/fullcalendar/fullcalendar.min.css")}}
    <!-- BEGIN THEME STYLES -->
@stop
@section('mainarea')

			<!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                {{$pageTitle}}
                <small>Participantes Lista</small>
            </h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ route('admin.participaciones.index') }}">Participaciones</a>
                        <i class="fa fa-angle-right"></i>
					</li>
					<li>

                    </li>

				</ul>

			</div>

            <!-- BEGIN PAGE CONTENT-->
            			<div class="row">
            				<div class="col-md-12">

                {{--INLCUDE ERROR MESSAGE BOX--}}
                @include('admin.common.error')
                {{--END ERROR MESSAGE BOX--}}
            					<div class="portlet box green-meadow calendar">
                                    <div class="portlet box blue">

                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-users"></i>Lista de Participantes en Lista
                                            </div>
                                            <div class="tools">
                                            </div>
                                        </div>

                                        <div class="portlet-body">

                                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                <thead>
                                                <tr>
                                                    <th> Descripcion</th>
                                                    <th> Nombres</th>
                                                    <th> Apellidos</th>
                                                    <th> Cedula de Identidad</th>
                                                    <th> Email</th>
                                                    <th> Telefono Voluntario</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach ($participantes as $part)
                                                    <tr id="row{{ $part->id }}">
                                                        <td> {{ $part->descripcion }}</td>
                                                        <td> {{ $part->nombres }} </td>
                                                        <td> {{ $part->apellidos }} </td>
                                                        <td> {{ $part->personalID,' ' ,$part->emision, 'LP' }}  </td>
                                                        <td> {{ $part->email}} </td>
                                                        <td> {{ $part->telefono }} </td>

                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
            					</div>
            				</div>
            			</div>
            			<!-- END PAGE CONTENT-->

@stop

@section('footerjs')

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
        {{HTML::script("assets/global/plugins/bootstrap-select/bootstrap-select.min.js")}}
        {{HTML::script("assets/global/plugins/select2/select2.min.js")}}

        {{HTML::script("assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js")}}
        {{HTML::script("assets/admin/pages/scripts/components-dropdowns.js")}}


		{{HTML::script('assets/admin/pages/scripts/ui-blockui.js')}}
        {{HTML::script("assets/global/plugins/moment.min.js")}}
        {{HTML::script("assets/global/plugins/fullcalendar/fullcalendar.min.js")}}

@stop
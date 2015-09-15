@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style("assets/global/plugins/bootstrap-datepicker/css/datepicker3.css")}}
    {{HTML::style("assets/global/plugins/select2/select2.css")}}
    {{HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css")}}
    <!-- END PAGE LEVEL STYLES -->
@stop
@section('mainarea')
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        {{$pageTitle}}
        <small>Actividades Lista</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('admin.participaciones.index')}}">Participaciones</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Lista</a>
            </li>
        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div id="load">

                @if(Session::get('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

            </div>
            <hr>
            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>Partipaciones Listas
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th> Actividad ID</th>
                            <th> Descripcion Actividad</th>
                            <th> VoluntarioID</th>
                            <th> ActividadID</th>
                            <th> Accion</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($actividades as $act)
                            <tr id="row{{ $act->id }}">
                                <td> {{ $act->id }}</td>
                                <td> {{ $act->descripcion }}</td>
                                <td>
                                    @foreach($participaciones as $par)
                                    <ul>
                                        <li>{{$par->voluntarios->nombres}}</li>
                                    </ul>
                                    @endforeach
                                </td>
                                <td> {{ $act->actividadID }} </td>
                                <td class="">
                                    <a class="btn purple"
                                       href="{{route('admin.participaciones.edit',$act->id) }}">
                                        <i class="fa fa-eye"></i> Agregar Asistentes
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->

        </div>
    </div>
    <!-- END PAGE CONTENT-->

    {{--DELETE MODAL CALLING--}}
    @include('admin.common.delete')
    {{--DELETE MODAL CALLING END--}}

@stop


@section('footerjs')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{ HTML::script("assets/global/plugins/select2/select2.min.js")}}
    {{ HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js")}}
    {{ HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js")}}
    {{ HTML::script("assets/admin/pages/scripts/table-managed.js")}}
    {{HTML::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js")}}
    {{HTML::script("assets/admin/pages/scripts/components-pickers.js")}}

    <!-- END PAGE LEVEL PLUGINS -->

@stop
	
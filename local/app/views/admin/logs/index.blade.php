@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style("assets/global/plugins/select2/select2.css")}}
    {{HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css")}}

@stop


@section('mainarea')
   <h3 class="page-title">
        <small>Lista de Logs</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('admin.logs.index')}}">Logs</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Lista</a>
            </li>
        </ul>

    </div>

    <div class="row">
        <div class="col-md-12">

            <div id="load">

                @if(Session::get('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

            </div>
             <hr>
            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>Logs
                    </div>
                </div>
                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_employees">
                        <thead>
                        <tr>
                            <th class="text-center">
                                ID Beneficiario o Personal
                            </th>
                            <th style="text-align: center">
                                tipo de contenido
                            </th>
                            <th class="text-center">
                                Accion
                            </th>
                            <th class="text-center">
                                Descripcion
                            </th>
                            <th class="text-center">
                                Detalles
                            </th>
                            <th class="text-center">
                                Fecha de Actividad
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($logs as $log)
                            <tr id="row{{ $log->user_id }}">

                                <td>
                                    {{ $log->content_id}}
                                </td>
                                <td>
                                    {{ $log->content_type }}
                                </td>
                                <td class="text-center">
                                    {{ $log->action }}
                                </td>
                                <td>
                                    {{ $log->description }}
                                </td>
                                <td>
                                    {{ $log->details }}
                                </td>
                                <td>
                                    {{ $log->created_at }}
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
    <!-- END PAGE LEVEL PLUGINS -->

    <script>
        jQuery(document).ready(function() {

            TableManaged.init();
        });
    </script>

@stop
	
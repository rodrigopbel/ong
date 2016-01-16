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
        Dashboard <small>Reportes & Estadisticas</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
        </ul>
        <div id="load">

            @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

        </div>
        <a href="{{route('admin.dashboard.create')}}" class="btn green">
            Nuevo Administrador <i class="fa fa-plus"></i>
        </a>

    </div>
    <!-- END PAGE HEADER-->
  {{--calender--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="portlet box blue calendar">--}}
    {{--<div class="portlet-title">--}}
    {{--<div class="caption">--}}
    {{--<i class="fa fa-gift"></i>{{Lang::get('core.attendance')}}--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="portlet-body">--}}
    {{--<div class="row">--}}

    {{--<div class="col-md-9 col-sm-12">--}}
    {{--<div id="calendar" class="has-toolbar">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-sm-3">--}}
    {{--<p><h3><a href="#" class="btn btn-sm red"></a> {{Lang::get('core.absent')}}</h3></p>--}}
    {{--<p><h3><a href="#" class="btn btn-sm blue"></a> {{Lang::get('core.present')}}</h3></p>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- END CALENDAR PORTLET-->--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}


    <!-- BEGIN DASHBOARD STATS -->

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>Administradores
                    </div>
                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_employees">
                        <thead>
                        <tr>
                            <th class="text-center">
                                Nombre Completo
                            </th>
                            <th class="text-center">
                                Email
                            </th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($administradores as $admin)
                            <tr id="row{{ $admin->name }}">
                                <td>
                                    {{ $admin->name }}

                                </td>
                                <td>
                                    {{$admin->email}}
                                </td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            {{--<div class="portlet box blue">--}}
                {{--<div class="portlet-title">--}}
                    {{--<div class="caption">--}}
                        {{--Gastos--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="portlet-body">--}}
                    {{--<div id="expenseChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
    </div>

        <!-- END DASHBOARD STATS -->
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
            <script src="http://code.highcharts.com/highcharts.js"></script>
            <script src="http://code.highcharts.com/modules/exporting.js"></script>
            {{--<script>--}}
                {{--jQuery(document).ready(function () {--}}

                    {{--TableManaged.init();--}}
                {{--});--}}
            {{--</script>--}}
            <script>
                function del(id, name) {
                    $('#deleteModal').appendTo("body").modal('show');
                    $('#info').html('Eliminar al Administrador : <strong>' + name + '</strong> ??');
                    console.log("ads");
                    $("#delete").click(function () {
                        console.log('236516');
                        var url = "{{ route('admin.dashboard.destroy',':id') }}";
                        url = url.replace(':id', id);

                        $.ajax({
                            type: "DELETE",
                            url: url,
                            dataType: 'json',
                            data: {"id": id}

                        }).done(function (response) {

                            if (response.success == "deleted")
                            {
                                $("html, body").animate({ scrollTop: 0 }, "slow");
                                $('#deleteModal').modal('hide');
                                $('#row'+id).fadeOut(500);
                                $('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Eliminada exitosamente!</p>");
                            }
                        });
                    })

                }
            </script>


            <!-- END PAGE LEVEL PLUGINS -->
    @stop
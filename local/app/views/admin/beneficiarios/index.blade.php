@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style("assets/global/plugins/select2/select2.css")}}
    {{HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css")}}
    <!-- END PAGE LEVEL STYLES -->

@stop


@section('mainarea')


    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <small>Lista de Beneficiarios</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('admin.beneficiarios.index')}}">Beneficiarios</a>
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
            <a href="{{route('admin.beneficiarios.create')}}" class="btn green">
                Nuevo <i class="fa fa-plus"></i>
            </a>
            <hr>
            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>Beneficiarios
                    </div>
                    <div class="tools" style="  padding: 5px;">
                        <div class="btn-group pull-right">
                            <a href="{{route('admin.beneficiarios.export') }}" class="btn yellow">
                                <i class="fa fa-file-excel-o"></i> Exportar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_employees">
                        <thead>
                        <tr>
                            <th class="text-center">
                                Nro Caso
                            </th>
                            <th class="text-center">
                                Foto
                            </th>
                            <th style="text-align: center">
                                Beneficiario
                            </th>
                            <th class="text-center">
                                Objetivo
                            </th>
                            <th class="text-center">
                                Antiguedad
                            </th>
                            <th class="text-center">
                                Telefono
                            </th>
                            <th class="text-center">
                                Estado
                            </th>
                            <th class="text-center">
                                Accion
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($beneficiarios as $ben)
                            <tr id="row{{ $ben->beneficiarioID }}">
                                <td>
                                    {{ $ben->beneficiarioID }}

                                </td>
                                <td class="text-center">
                                    {{HTML::image("/profileImages/{$ben->foto}",'foto',['height'=>'80px'])}}

                                </td>
                                <td>
                                    {{ $ben->nombres . " ". $ben->apellidos }}
                                </td>
                                <td>
                                    <p>Destino: <strong>{{ $ben->getObjetivo->destinos->destino or ''}}</strong></p>

                                    <p>Objetivo: <strong>{{ $ben->getObjetivo->objetivo or ''}}</strong></p>
                                </td>
                                <td class="text-center">
                                    {{ $ben->duracionVinculacion($ben->beneficiarioID) }}
                                </td>
                                <td>
                                    {{ $ben->telefono }}
                                </td>
                                <td>
                                    @if($ben->status=='activo')
                                        <span class="label label-sm label-success"> Activo </span>
                                    @else
                                        <span class="label label-sm label-danger"> Inactivo </span>
                                    @endif
                                </td>
                                <td class="">
                                    <p><a class="btn purple"
                                          href="{{ route('admin.beneficiarios.edit',$ben->beneficiarioID)  }}"><i
                                                    class="fa fa-edit"></i></a></p>

                                    <p><a class="btn red" style="width: 42px;" href="javascript:;"
                                          onclick="del('{{$ben->beneficiarioID}}','{{ $ben->nombres ." ".$ben->apellidos }}')"><i
                                                    class="fa fa-trash"></i></a></p>
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
        jQuery(document).ready(function () {

            TableManaged.init();
        });
    </script>
    <script>
        function del(id, name) {
            $('#deleteModal').appendTo("body").modal('show');
            $('#info').html('Eliminar al Beneficiario : <strong>' + name + '</strong> ??');
            $("#delete").click(function () {

                var url = "{{ route('admin.beneficiarios.destroy',':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    type: "DELETE",
                    url: url,
                    dataType: 'json',
                    data: {"id": id}

                }).done(function (response) {

                    if (response.success == "deleted") {
                        $("html, body").animate({scrollTop: 0}, "slow");
                        $('#deleteModal').modal('hide');
                        $('#row' + id).closest('tr').remove();
                        $('#load').html("<p class='alert alert-success text-center'><strong>" + name + "</strong> Eliminado correctamente</p>");
                    }
                });
            })

        }


    </script>
@stop
	
@extends('admin.adminlayouts.adminlayout')
@section('head')

    <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}
    {{HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}
    <!-- END PAGE LEVEL STYLES -->
@stop

{{$beneficiario}}
@section('mainarea')

    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title" xmlns="http://www.w3.org/1999/html">
        Reporte del Beneficiario {{$beneficiios[0]->nombres}}
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
                <a href="">Editar </a>

            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row ">
        <div class="profile-body">
            <div class="row margin-bottom-20">
                <!--Profile Post-->
                <div class="col-sm-6">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Detalle Beneficiario</h2>
                        </div>
                        <div class="panel-body panelHolder">
                            <table class="table table-light margin-bottom-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="primary-link">Nombre</span>
                                    </td>
                                    <td>
                                        {{$beneficiario[0]->nombres}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Apellidos</span>
                                    </td>
                                    <td>
                                        {{$beneficiario[0]->apellidos}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Genero</span>
                                    </td>
                                    <td>
                                        {{ucfirst($beneficiario[0]->genero)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Email</span>
                                    </td>
                                    <td>
                                        {{$beneficiario[0]->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Telefono</span>
                                    </td>
                                    <td>
                                        {{$beneficiario[0]->telefono}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Direccion</span>
                                    </td>
                                    <td>
                                        {{$beneficiario[0]->direccion}}
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            <div class="col-sm-6">
                <div class="panel-heading overflow-h">
                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Detalle Ayudas</h2>
                </div>
                <div class="panel-body panelHolder">
                    <table class="table table-light margin-bottom-0">
                        <tbody>
                        @foreach($beneficiario[0][ayudas] as $ayuda)
                        <tr>
                            <td>
                                <span class="primary-link">Requerimiento</span>
                            </td>
                            <td>
                                {{$ayuda->requerimiento}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
            </div>
            <hr>
        </div>
    </div>


    {{------------------------------------END NEW SALARY ADD MODALS--------------------------------------}}
{{--@stop--}}
@section('footerjs')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{ HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}
    {{ HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
    {{ HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{ HTML::script('assets/admin/pages/scripts/components-pickers.js')}}
    <!-- END PAGE LEVEL PLUGINS -->
@stop

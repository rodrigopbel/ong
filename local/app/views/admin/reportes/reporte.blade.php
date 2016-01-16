@extends('admin.adminlayouts.adminlayout')
@section('head')

    <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}
    {{HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}
    <!-- END PAGE LEVEL STYLES -->
@stop
@section('mainarea')

    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title" xmlns="http://www.w3.org/1999/html">
        Detalles del Beneficiario
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

        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row ">
        <div class="profile-body">
            <div class="row margin-bottom-20">
                <!--Profile Post-->
                <div class="col-sm-6">
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Detalle Saldo</h2>
                        </div>
                        <div class="panel-body panelHolder">
                            <table class="table table-light margin-bottom-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="primary-link">Ingresos</span>
                                    </td>
                                    <td>
                                        {{$ingresoTotal}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Egresos</span>
                                    </td>
                                    <td>
                                        {{$egresoTotal}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="primary-link">Saldo</span>
                                    </td>
                                    <td>
                                        {{$saldo}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-profile reporte">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Detalle Beneficiario </h2>
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
                    <div class="portlet-body">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Detalle de las Donaciones</h2>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead style="background:#767676; color :#fff">
                            <tr>
                                {{--<th> Saldo ID</th>--}}
                                <th> Aportante</th>
                                <th> Descripcion Donacion</th>
                                <th> Donacion</th>
                                <th> Fecha de Donacion</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($donaciones as $donacion)
                                <tr id="row{{ $donacion->id }}">

                                    {{--<td> {{ $saldo->id }} </td>--}}
                                    {{--<td> {{ $saldo->nombreBeneficiario }} </td>--}}
                                    <td> {{ $donacion->nombreAportante}}</td>
                                    <td> {{ $donacion->descripcion}} </td>
                                    <td> {{ $donacion->montodonacion}} </td>
                                    <td> {{ $donacion->created_at}} </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Detalle de las Ayudas</h2>
                        </div>
                    <div class="panel-body panelHolder">
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead style="background:#767676; color :#fff">
                            <tr>
                                <th> Nombre Aportante</th>
                                <th> Requerimiento</th>
                                {{--<th> Ayudas ID</th>--}}
                                <th> Gastos / Egresos</th>
                                <th> Fecha de Ayuda</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($ayudas as $ayuda)
                                <tr id="row{{ $ayuda->id }}">

                                    {{--<td> {{ $saldo->id }} </td>--}}
                                    <td> {{ $ayuda->nombreAportante }} </td>
                                    <td>   {{$ayuda->requerimiento}} </td>
                                    {{--<td> {{ $saldo->ayudasID}} </td>--}}
                                    <td> {{$ayuda->gastos}}</td>
                                    <td>  {{$ayuda->created_at}} </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="profile-body">
            <div class="row margin-bottom-20">
                <!--Profile Post-->

            </div>
        </div>
        <hr>
    </div>


    {{------------------------------------END NEW SALARY ADD MODALS--------------------------------------}}
@stop
@section('footerjs')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{ HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}
    {{ HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
    {{ HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{ HTML::script('assets/admin/pages/scripts/components-pickers.js')}}
    <!-- END PAGE LEVEL PLUGINS -->
@stop

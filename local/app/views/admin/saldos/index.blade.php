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
        <small>Saldos Lista</small>
    </h3>


    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('admin.saldos.index')}}">Saldos</a>
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
                        <i class="fa fa-users"></i>Lista de Saldos
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            {{--<th> Saldo ID</th>--}}
                            <th> Beneficiario</th>
                            <th> Aportante</th>
                            {{--<th> Ayudas ID</th>--}}
                            <th> Donacion</th>
                            <th> Ayuda</th>
                            <th> Saldo</th>
                            <th> Fecha</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($saldos as $saldo)
                            <tr id="row{{ $saldo->id }}">

                                {{--<td> {{ $saldo->id }} </td>--}}
                                <td> {{ $saldo->nombreBeneficiario }} </td>
                                <td> {{ $saldo->nombreAportante }} </td>
                                {{--<td> {{ $saldo->ayudasID}} </td>--}}
                                <td> {{ $saldo->donacion}} </td>
                                <td> {{ $saldo->ayuda}} </td>
                                <td> {{ $saldo->saldo}} </td>
                                <td> {{ $saldo->created_at}} </td>
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
	
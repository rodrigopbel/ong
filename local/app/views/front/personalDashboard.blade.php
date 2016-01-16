@extends('front.layouts.frontlayout')
@section('mainarea')

    <div class="col-md-9">
        <!--Profile Body-->
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
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Detalle Aportante</h2>
                        </div>
                        <div class="panel-body panelHolder">
                            <table class="table table-light margin-bottom-0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Nombre</span>
                                        </td>
                                        <td>
                                             {{$personal->nombres}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Apellidos</span>
                                        </td>
                                        <td>
                                            {{$personal->apellidos}}
                                        </td>
                                    </tr>
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<span class="primary-link">Fecha de Ingreso</span>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                             {{--{{ date('d-M-Y',strtotime($personal->fechanac))}}--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    <tr>
                                        <td>
                                            <span class="primary-link">Genero</span>
                                        </td>
                                        <td>
                                            {{ucfirst($personal->genero)}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Email</span>
                                        </td>
                                        <td>
                                            {{$personal->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Telefono</span>
                                        </td>
                                        <td>
                                             {{$personal->telefono}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Direccion</span>
                                        </td>
                                        <td>
                                            {{$personal->direccion}}
                                        </td>
                                    </tr>

                                    </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-profile  margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Destino de la Ayuda</h2>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead style="background:#767676; color :#fff">
                            <tr>
                                {{--<th> Saldo ID</th>--}}
                                <th> Beneficiario</th>
                                {{--<th> Ayudas ID</th>--}}
                                <th> Monto Donacion</th>
                                <th> Fecha de Donacion</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($ayudas as $ayuda)
                                <tr id="row{{ $ayuda->id }}">

                                    {{--<td> {{ $saldo->id }} </td>--}}
                                    {{--<td> {{ $saldo->nombreBeneficiario }} </td>--}}
                                    <td> {{ $ayuda->nombreBeneficiario}}</td>
                                    {{--<td> {{ $saldo->ayudasID}} </td>--}}
                                    <td> {{ $ayuda->gastos}} </td>
                                    <td> {{ $ayuda->created_at}} </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-sm-6 md-margin-bottom-20">
                    <div class="panel panel-profile margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-money"> SALDO :</i>{{$ingresoTotal}} (ingresoTotal) - {{$egresoTotal}} (egresoTotal) = {{$saldo}} </h2>
                        </div>
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-trophy"></i> Detalle de Beneficiario</h2>
                        </div>
                        <div id="scrollbar3" class="panel-body contentHolder">
                            @foreach($beneficiarios as $ben)
                                <table class="table table-light margin-bottom-0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Nombre</span>
                                        </td>
                                        <td>
                                            {{$ben->nombres}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Apellidos</span>
                                        </td>
                                        <td>
                                            {{$ben->apellidos}}
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <span class="primary-link">Fecha de Nacimiento</span>
                                    </td>
                                    <td>
                                    {{ date('d-M-Y',strtotime($personal->fechanac))}}
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Genero</span>
                                        </td>
                                        <td>
                                            {{ucfirst($ben->genero)}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Telefono</span>
                                        </td>
                                        <td>
                                            {{$ben->telefono}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Direccion</span>
                                        </td>
                                        <td>
                                            {{$ben->direccion}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Diagnostico</span>
                                        </td>
                                        <td>
                                            {{$ben->diagnostico}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endforeach


                        </div>
                    </div>
                    <hr/>
                    <div class="panel panel-profile margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-trophy"></i> Donaciones Realizadas</h2>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead style="background:#767676; color :#fff">
                            <tr>
                                {{--<th> Saldo ID</th>--}}
                                <th> Beneficiario</th>
                                {{--<th> Ayudas ID</th>--}}
                                <th> Monto Donacion</th>
                                <th> Fecha de Donacion</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($donaciones as $donacion)
                                <tr id="row{{ $donacion->id }}">

                                    {{--<td> {{ $saldo->id }} </td>--}}
                                    {{--<td> {{ $saldo->nombreBeneficiario }} </td>--}}
                                    <td> {{ $donacion->nombreBeneficiario}}</td>
                                    {{--<td> {{ $saldo->ayudasID}} </td>--}}
                                    <td> {{ $donacion->montodonacion}} </td>
                                    <td> {{ $donacion->created_at}} </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    {{--<div class="panel panel-profile no-bg">--}}
                        {{--<div class="panel-heading overflow-h">--}}
                            {{--<h2 class="panel-title heading-sm pull-left"><i class="fa fa-bullhorn"></i>Notificaciones</h2>--}}
                        {{--</div>--}}
                        {{--<div id="scrollbar2" class="panel-body contentHolder">--}}
                        {{--@if(count($noticeboards))--}}
                            {{--@foreach($noticeboards as $notice)--}}
                                {{--<div class="profile-event">--}}
                                    {{--<div class="date-formats">--}}
                                        {{--<span>{{date('d',strtotime($notice->created_at))}}</span>--}}
                                        {{--<small>{{date('m, Y',strtotime($notice->created_at))}}</small>--}}
                                    {{--</div>--}}
                                    {{--<div class="overflow-h">--}}
                                        {{--<h3 class="heading-xs"><a  href="" data-toggle="modal" data-target=".show_notice" onclick="show_notice({{$notice->id}});return false;">{{$notice->title}}</a></h3>--}}
                                        {{--<p>{{ Str::limit($notice->description,100)}}</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}

                        {{--</div>--}}
                    {{--</div>--}}

                </div>
                <!--End Profile Event-->

            </div><!--/end row-->

            <hr>

            <!--Profile Blog-->
            {{--<div class="panel panel-profile">--}}
                {{--<div class="panel-heading overflow-h">--}}
                    {{--<h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Calendario</h2>--}}
                {{--</div>--}}
                {{--<div class="panel-body panelHolder">--}}

                         {{--<div class="alert-blocks alert-blocks-info">--}}
                               {{--<div class="overflow-h">--}}
                                   {{--<strong class="color-dark">ULtima entrada <small class="pull-right"><em>{{$employee->lastAbsent($employee->employeeID,'date')}}</em></small></strong>--}}
                                    {{--<small class="award-name">{{$employee->lastAbsent($employee->employeeID)}}</small>--}}
                               {{--</div>--}}
                           {{--</div>--}}


                    {{--<div id='calendar'></div>--}}

                {{--</div>--}}
            {{--</div><!--/end row-->--}}
            <!--End Profile Blog-->

        </div>
        <!--End Profile Body-->
    </div>


                    {{--------------------------Show Notice MODALS-----------------}}




            <div class="modal fade show_notice in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <h4 id="myLargeModalLabel" class="modal-title show-notice-title" >
                            {{--Notice Title using Javascript--}}
                            </h4>
                        </div>
                        <div class="modal-body" id="show-notice-body">
                            {{--Notice full Description using Javascript--}}
                        </div>
                    </div>
                </div>
            </div>



  {{------------------------END Notice MODALS---------------------}}

@stop

@section('footerjs')


@stop
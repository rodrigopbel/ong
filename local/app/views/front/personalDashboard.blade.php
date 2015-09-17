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
                        <div class="panel-body panelHolder" >
                            <div id="scrollbar3" class="panel-body contentHolder">
                                <div class="alert-blocks" style="background:#fff">
                                    <div class="overflow-h">
                                        <strong class="color-dark">IDBeneficiario<small class="color-dark pull-right"><em>Gasto Realizado</em></small></strong>
                                        <small class="color-dark">Requerimiento</small><small class="color-dark ">NroFactura</small>
                                    </div>
                                </div>
                                @foreach($ayudas as $ayuda)
                                    <div class="alert-blocks">
                                        <div class="overflow-h">
                                            <strong class="color-dark">{{Str::words($ayuda->beneficiarioID,1,'')}} <small class="pull-right"><em>{{($ayuda->gastos)}}</em></small></strong>
                                            <small class="award-name">{{$ayuda->requerimiento}}</small><small class="award-name">{{$ayuda->numfactura}}</small>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
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
                            <div class="alert-blocks" style="background:#fff">
                                <div class="overflow-h">
                                    <strong class="color-dark">Nombre Completo <small class="pull-right"><em>Fecha Nacimiento</em></small></strong>
                                    <small class="award-name">Telefono</small>
                                </div>
                            </div>
                            @foreach($beneficiarios as $ben)
                                <div class="alert-blocks">
                                    <div class="overflow-h">
                                        <strong class="color-dark">{{Str::words($ben->nombres,1,'')}} {{Str::words($ben->apellidos,1,'')}} <small class="pull-right"><em>{{($ben->fechanac)}}</em></small></strong>
                                        <small class="award-name">{{$ben->telefono}}</small>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <hr/>
                    <div class="panel panel-profile margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-trophy"></i> Donaciones Realizadas</h2>
                        </div>
                        <div id="scrollbar3" class="panel-body contentHolder">
                            <div class="alert-blocks" style="background:#fff">
                                <div class="overflow-h">
                                    <strong class="color-dark">  Descripcion<small class="pull-right"><em>Fecha de Donacion</em></small></strong>
                                    <small class="award-name">Monto</small>
                                </div>
                            </div>
                            @foreach($donaciones as $donacion)
                                <div class="alert-blocks">
                                    <div class="overflow-h">
                                        <strong class="color-dark">{{Str::words($donacion->descripcion,1,'')}} <small class="pull-right"><em>{{($donacion->created_at)}}</em></small></strong>
                                        <small class="award-name">{{$donacion->montodonacion}}</small>
                                    </div>
                                </div>
                            @endforeach


                        </div>
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


    <script>

    	{{--$(document).ready(function() {--}}

    		{{--$('#calendar').fullCalendar({--}}
    {{--//			defaultDate: '2014-11-12',--}}
    			{{--editable: false,--}}
    			{{--eventLimit: true, // allow "more" link when too many events--}}
			{{--eventRender: function(event, element) {--}}
						{{--if(event.className=="holiday"){--}}
							{{--var dataToFind = moment(event.start).format('YYYY-MM-DD');--}}
                            	{{--$('.fc-day[data-date="'+dataToFind+'"]').css('background', 'rgba(255, 224, 205, 1)');--}}
                            {{--}--}}
				{{--},--}}
    			{{--events: [--}}

    				    {{-- Attendance on calendar --}}
                        {{--@foreach($attendance as $attend)--}}
                        {{--{--}}

                            {{--title: "{{$attend->status}}",--}}
                            {{--start:'{{$attend->date}}',--}}

                            {{--@if($attend->status=='absent')--}}
                                	{{--color: '#e50000',--}}
                                 	{{--title: "{{$attend->status}}-{{$attend->leaveType}}",--}}
                             {{--@endif--}}


                        {{--},--}}
                        {{--@endforeach--}}

                        {{--Holidays on Calendar--}}
                        {{--@foreach($holidays as $holiday)--}}
                        {{--{--}}
                        	{{--className:"holiday",--}}
                            {{--title: "{{$holiday->occassion}}",--}}
                            {{--start:'{{$holiday->date}}',--}}
                            {{--color: 'grey'--}}

                        {{--},--}}
                        {{--@endforeach--}}
    			{{--]--}}
    		{{--});--}}



    	{{--});--}}

    	function show_notice(id)
    	{
			$('.show-notice-title').html('<div class="text-center">{{HTML::image('front_assets/img/loading-spinner-blue.gif')}}</div>');
			$('#show-notice-body').html('<div class="text-center">{{HTML::image('front_assets/img/loading-spinner-blue.gif')}}</div>');

            $.ajax({
                    type: 'POST',
                    url: "{{URL::to('dashboard/notice/"+id+"') }}",
                    cache: false,
                    data: { "id": id},
                    success: function(response) {

                       $('.show-notice-title').html(response.title);
                        $('#show-notice-body').html(response.description);

                    },
                    error: function(xhr, textStatus, thrownError) {
                        alert('Something went wrong. Please Try again later!');
                    }
                });

    	}

    </script>
@stop
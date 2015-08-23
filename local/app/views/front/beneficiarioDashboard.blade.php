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
                                             {{$beneficiario->nombres}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Apellidos</span>
                                        </td>
                                        <td>
                                            {{$beneficiario->apellidos}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Fecha de Nacimiento</span>
                                        </td>
                                        <td>
                                             {{ date('d-M-Y',strtotime($beneficiario->fechanac))}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Genero</span>
                                        </td>
                                        <td>
                                            {{ucfirst($beneficiario->genero)}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Email</span>
                                        </td>
                                        <td>
                                            {{$beneficiario->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Telefono</span>
                                        </td>
                                        <td>
                                             {{$beneficiario->telefono}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Direccion</span>
                                        </td>
                                        <td>
                                            {{$beneficiario->direccion}}
                                        </td>
                                    </tr>																															<tr>
                                        <td>
                                            <span class="primary-link">Direccion Permanente</span>
                                        </td>
                                        <td>
                                            {{$beneficiario->direccionperm}}
                                        </td>
                                    </tr>
                                    </tbody>
                                    </table>
                        </div>
                    </div>

                    <div class="panel panel-profile no-bg margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Destino de la Ayuda</h2>
                        </div>
                        <div class="panel-body panelHolder">
                            <table class="table table-light margin-bottom-0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Caso #</span>
                                        </td>
                                        <td>
                                            {{$beneficiario->beneficiarioID}}
                                        </td>
                                    </tr>
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<span class="primary-link">Destino</span>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--{{$beneficiario->getDesignation->department->deptName}}--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<span class="primary-link">Objetivo</span>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--{{$beneficiario->getDesignation->designation}}--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<span class="primary-link">Fecha de Solicitud</span>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                             {{--{{date('d-M-Y',strtotime($beneficiario->diaingreso))}}--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<span class="primary-link">Monto Requerido ( <i class="fa {{$setting->currency_icon}}"></i> )</span>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}

                                            {{--@foreach($beneficiario->getSoldonacion as $salary)--}}
                                                {{--<p>{{$salary->type}} : {{$salary->salary}} <i class="fa {{$setting->currency_icon}}"></i> </p>--}}
                                            {{--@endforeach--}}


                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    </tbody>
                                    </table>
                        </div>
                    </div>

                    <div class="panel panel-profile no-bg margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Zonificacion</h2>
                        </div>
                        <div class="panel-body panelHolder">
                            <table class="table table-light margin-bottom-0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Departamento</span>
                                        </td>
                                        <td>
                                             {{$zonificacion->departamento or ''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Provincia</span>
                                        </td>
                                        <td>
                                             {{$zonificacion->provincia or ''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Localidad</span>
                                        </td>
                                        <td>
                                             {{$zonificacion->localidad or ''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Canton</span>
                                        </td>
                                        <td>
                                             {{$zonificacion->canton or ''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Zona</span>
                                        </td>
                                        <td>
                                             {{$zonificacion->zona or ''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="primary-link">Nota</span>
                                        </td>
                                        <td>
                                              {{$zonificacion->otros or ''}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Profile Post-->

                <!--Notice Board -->
                <div class="col-sm-6 md-margin-bottom-20">


                    <div class="panel panel-profile margin-top-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-trophy"></i> Donaciones Recibidas</h2>
                        </div>
                        <div id="scrollbar3" class="panel-body contentHolder">

                            @foreach($awards as $award)
                                <div class="alert-blocks">
                                    <div class="overflow-h">
                                        <strong class="color-dark">{{Str::words($award->employeeDetails->fullName,1,'')}} <small class="pull-right"><em>{{ucfirst($award->forMonth)}} {{$award->forYear}}</em></small></strong>
                                        <small class="award-name">{{$award->awardName}}</small>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <hr>

                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-bullhorn"></i>Notificaciones</h2>
                        </div>
                        <div id="scrollbar2" class="panel-body contentHolder">
                        @if(count($noticeboards))
                            @foreach($noticeboards as $notice)
                                <div class="profile-event">
                                    <div class="date-formats">
                                        <span>{{date('d',strtotime($notice->created_at))}}</span>
                                        <small>{{date('m, Y',strtotime($notice->created_at))}}</small>
                                    </div>
                                    <div class="overflow-h">
                                        <h3 class="heading-xs"><a  href="" data-toggle="modal" data-target=".show_notice" onclick="show_notice({{$notice->id}});return false;">{{$notice->title}}</a></h3>
                                        <p>{{ Str::limit($notice->description,100)}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        </div>
                    </div>

                    {{--<div class="panel panel-profile margin-top-20">--}}
                        {{--<div class="panel-heading overflow-h">--}}
                            {{--<h2 class="panel-title heading-sm pull-left"><i class="fa fa-send"></i> Otros</h2>--}}
                        {{--</div>--}}
                        {{--<div id="scrollbar3" class="panel-body contentHolder">--}}
                         {{--@if(count($holidays))--}}
                            {{--@foreach($holidays as $holiday)--}}
                            {{--Check for upcoming Holidays--}}
                            {{--@if(strtotime($holiday->date)>time())--}}
                                {{--<div class="alert-blocks alert-blocks-{{$holiday_color[$holiday->id%count($holiday_color)]}}">--}}
                                    {{--<div class="overflow-h">--}}
                                        {{--<strong class="color-{{$holiday_font_color[$holiday->id%count($holiday_font_color)]}}">{{$holiday->occassion}}--}}
                                            {{--<small class="pull-right"><em>{{date('d M Y',strtotime($holiday->date))}}</em></small>--}}
                                        {{--</strong>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                             {{--@endif--}}
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

    	$(document).ready(function() {

    		$('#calendar').fullCalendar({
    //			defaultDate: '2014-11-12',
    			editable: false,
    			eventLimit: true, // allow "more" link when too many events
			eventRender: function(event, element) {
						if(event.className=="holiday"){
							var dataToFind = moment(event.start).format('YYYY-MM-DD');
                            	$('.fc-day[data-date="'+dataToFind+'"]').css('background', 'rgba(255, 224, 205, 1)');
                            }
				},
    			events: [

    				    {{-- Attendance on calendar --}}
                        @foreach($attendance as $attend)
                        {

                            title: "{{$attend->status}}",
                            start:'{{$attend->date}}',

                            @if($attend->status=='absent')
                                	color: '#e50000',
                                 	title: "{{$attend->status}}-{{$attend->leaveType}}",
                             @endif


                        },
                        @endforeach

                        {{--Holidays on Calendar--}}
                        @foreach($holidays as $holiday)
                        {
                        	className:"holiday",
                            title: "{{$holiday->occassion}}",
                            start:'{{$holiday->date}}',
                            color: 'grey'

                        },
                        @endforeach
    			]
    		});



    	});

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
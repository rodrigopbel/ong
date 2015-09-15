@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style("assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css")}}
    {{HTML::style("assets/global/plugins/bootstrap-datepicker/css/datepicker3.css")}}
    <!-- BEGIN THEME STYLES -->
@stop


@section('mainarea')


    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Edit Attendance
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('admin.participaciones.index') }}">Participaciones</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Asistencia</a>
            </li>
        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            {{--INLCUDE ERROR MESSAGE BOX--}}
            @include('admin.common.error')
            {{--END ERROR MESSAGE BOX--}}
            <hr>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>
                        @if(isset($activiad->created_at))
                            Fecha , {{date('d M Y',strtotime($activiad->created_at))}}
                        @else
                           Rayos
                        @endif
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                        {{Form::open(['route'=>["admin.participaciones.update",$activiad->created_at],'class'=>'form-horizontal','method'=>'PATCH'])}}


                        <div class="form-body">

                            <h3 class="form-section">Fecha  {{date('d-M-Y',strtotime($activiad->created_at))}}</h3>

                            <div class="form-group">

                                <label class="col-md-1 control-group">Voluntario ID</label>
                                <label class="col-md-2 control-group">Nombres</label>
                                <label class="col-md-2 control-group">Apellidos</label>
                                <label class="col-md-2 control-group">Telefono</label>
                                <label class="col-md-2 control-group">Email</label>
                                <label class="col-md-2 control-group">Partipacion</label>
                            </div>

                            @foreach($voluntarios as $voluntario)
                                <div class="form-group">
                                    <label class="col-md-1 control-group">{{$voluntario->personalID}} </label>
                                    <label class="col-md-2 control-group">{{$voluntario->nombres}} </label>
                                    <label class="col-md-2 control-group">{{$voluntario->apellidos}} </label>
                                    <label class="col-md-2 control-group">{{$voluntario->telefono}} </label>
                                    <label class="col-md-2 control-group">{{$voluntario->email}} </label>

                                    <div class="col-md-2">
                                        <input type="checkbox" id="checkbox{{$voluntario->personalID}}"
                                               onchange="showHide('{{$voluntario->personalID}}');return false;"
                                               class="make-switch" name="checkbox[{{$voluntario->personalID}}]" checked
                                               data-on-color="success" data-on-text="P" data-off-text="A"
                                               data-off-color="danger">
                                        <input type="hidden" name="employees[]" value="{{$voluntario->personalID}}">
                                    </div>


                                </div>
                            @endforeach

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" data-loading-text="Submitting..."
                                                class="demo-loading-btn btn green"><i class="fa fa-edit"></i> Guardar
                                        </button>

                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}

                            @endif
                                    <!-- END FORM-->

                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>
        </div>
        <!-- END PAGE CONTENT-->



        @stop

        @section('footerjs')

            <!-- BEGIN PAGE LEVEL PLUGINS -->
            {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
            {{HTML::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js")}}
            {{HTML::script("assets/admin/pages/scripts/components-pickers.js")}}

            <!-- END PAGE LEVEL PLUGINS -->

            <script>
                jQuery(document).ready(function () {
                    ComponentsPickers.init();

                });
            </script>
            <script>

                $('.leaveType').hide();
                $('.reason').hide();
                $('.halfLeaveType').hide();


                {{--@foreach($attendanceArray as $attend)--}}
                {{--{--}}
                    {{--@if($attend['status']=='absent')--}}
                    {{--$('#leaveTypeLabel').show(100);--}}
                    {{--$('#reasonLabel').show(100);--}}

                    {{--@if($attend['leaveType']=='half day')--}}
                    {{--$("#halfLeaveType{{$attend['employeeID']}}").show();--}}
                    {{--@endif--}}
                        {{--@if($attend['halfDayType']	!=null)--}}
                    {{--$('#halfDayLabel').show(100);--}}
                    {{--@endif--}}

                {{--$("#checkbox{{$attend['employeeID']}}").bootstrapSwitch('state', false);--}}

                    {{--@else--}}
                         {{--$("#reason{{$attend['employeeID']}}").hide();--}}
                    {{--$("#leaveType{{$attend['employeeID']}}").hide();--}}
                    {{--$("#halfLeaveType{{$attend['employeeID']}}").hide();--}}
                    {{--@endif--}}


                {{--}--}}
                {{--@endforeach--}}
              function showHide(id) {
                    $('#leaveTypeLabel').show(100);
                    $('#reasonLabel').show(100);


                    if ($('#checkbox' + id + ':checked').val() == 'on') {
                        $('#leaveType' + id).hide(1000);
                        $('#reason' + id).hide(1000);

                    } else {
                        $('#leaveType' + id).show(100);

                        $('#reason' + id).show(500);
                    }
                }

                function halfDayToggle(id, value) {

                    if (value == 'half day') {
                        $('#halfDayLabel').show(100);
                        $('#halfLeaveType' + id).show(100);
                    } else {
                        $('#halfLeaveType' + id).hide(100);
                    }


                }


            </script>
@stop
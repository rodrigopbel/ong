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
                <a href="{{route('admin.dashboard.index')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('admin.attendances.index') }}">Attendace</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Update attendace</a>
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

            <div class="row">


                <hr>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-edit"></i>
                            @if(isset($todays_holidays->date))
                                Holiday , {{date('d M Y',strtotime($todays_holidays->date))}}
                            @else
                                Mark Attendance
                            @endif
                        </div>
                        <div class="tools">
                        </div>
                    </div>

                    <div class="portlet-body form">

                        @if(isset($todays_holidays->date))
                            <div class="note note-info">
                                <h4 class="block">{{date('D', strtotime($todays_holidays->date))}}</h4>

                                <p>
                                    Holiday on the occassion of {{ $todays_holidays->occassion }}
                                </p>
                            </div>
                        @elseif(count($employees)==0)
                            <hr>
                            <div class="note note-warning">
                                <h4 class="block">Employees Missing</h4>

                                <p>
                                    Please add some employees to the database
                                </p>
                            </div>
                            <hr>
                            @else
                                    <!-- BEGIN FORM-->
                            {{Form::open(['route'=>["admin.partipaciones.update",$date],'class'=>'form-horizontal','method'=>'PATCH'])}}


                            <div class="form-body">

                                <h3 class="form-section">Date  {{date('d-M-Y',strtotime($date))}}</h3>

                                <div class="form-group">

                                    <label class="col-md-1 control-group">EmployeeID</label>
                                    <label class="col-md-2 control-group">Name</label>
                                    <label class="col-md-2 control-group">Status </label>
                                    <label class="col-md-2 control-group leaveType" id="leaveTypeLabel">Type of
                                        leave </label>
                                    <label class="col-md-2 control-group"><span class="halfLeaveType" id="halfDayLabel">half Day leave type</span>
                                    </label>

                                    <label class="col-md-3 control-group reason" id="reasonLabel">Reason </label>

                                </div>

                                @foreach($employees as $employee)
                                    <div class="form-group">
                                        <label class="col-md-1 control-group">{{$employee->personalID}} </label>
                                        <label class="col-md-2 control-group">{{$employee->nombres}} {{$employee->apellidos}} </label>

                                        <div class="col-md-2">
                                            <input type="checkbox" id="checkbox{{$employee->employeeID}}"
                                                   onchange="showHide('{{$employee->employeeID}}');return false;"
                                                   class="make-switch" name="checkbox[{{$employee->employeeID}}]"
                                                   checked data-on-color="success" data-on-text="P" data-off-text="A"
                                                   data-off-color="danger">
                                            <input type="hidden" name="employees[]" value="{{$employee->employeeID}}">
                                        </div>
                                        <div class="col-md-2">
                                            @if(isset($attendanceArray[$employee->employeeID]['leaveType']))
                                                {{ Form::select('leaveType['.$employee->employeeID.']', $leaveTypes,$attendanceArray[$employee->employeeID]['leaveType'],['class' => 'form-control leaveType','onchange'=>'halfDayToggle('.$employee->employeeID.',this.value)','id'=>'leaveType'.$employee->employeeID.''] ) }}
                                            @else
                                                {{ Form::select('leaveType['.$employee->employeeID.']', $leaveTypes,null,['class' => 'form-control leaveType','onchange'=>'halfDayToggle('.$employee->employeeID.',this.value)','id'=>'leaveType'.$employee->employeeID.''] ) }}
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            @if(isset($attendanceArray[$employee->employeeID]['leaveType']))
                                                {{ Form::select('leaveTypeWithoutHalfDay['.$employee->employeeID.']', $leaveTypeWithoutHalfDay,$attendanceArray[$employee->employeeID]['halfDayType'],['class' => 'form-control halfLeaveType','id'=>'halfLeaveType'.$employee->employeeID.''] ) }}
                                            @else
                                                {{ Form::select('leaveTypeWithoutHalfDay['.$employee->employeeID.']', $leaveTypeWithoutHalfDay,null,['class' => 'form-control halfLeaveType','id'=>'halfLeaveType'.$employee->employeeID.''] ) }}
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control reason"
                                                   id="reason{{$employee->employeeID}}"
                                                   name="reason[{{$employee->employeeID}}]" placeholder="Absent Reason"
                                                   value="{{ $attendanceArray[$employee->employeeID]['reason'] or ''}}">
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" data-loading-text="Submitting..."
                                                    class="demo-loading-btn btn green"><i class="fa fa-edit"></i> Submit
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
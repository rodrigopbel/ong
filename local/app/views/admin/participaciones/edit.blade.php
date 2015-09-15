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


                    <div class="portlet-body form">

                                    <!-- BEGIN FORM-->
                            {{Form::open(['route'=>["admin.partipaciones.update",$vol->created_at],'class'=>'form-horizontal','method'=>'PATCH'])}}


                            <div class="form-body">

                                <h3 class="form-section">Date  {{date('d-M-Y',strtotime($vol->created_at))}}</h3>

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

                                @foreach($voluntarios as $vol)
                                    <div class="form-group">
                                        <label class="col-md-1 control-group">{{$vol->personalID}} </label>
                                        <label class="col-md-2 control-group">{{$vol->nombres}} {{$vol->apellidos}} </label>

                                        <div class="col-md-2">
                                            <input type="checkbox" id="checkbox{{$vol->personalID}}"
                                                   onchange="showHide('{{$vol->personalID}}');return false;"
                                                   class="make-switch" name="checkbox[{{$vol->personalID}}]"
                                                   checked data-on-color="success" data-on-text="P" data-off-text="A"
                                                   data-off-color="danger">
                                            <input type="hidden" name="employees[]" value="{{$vol->personalID}}">
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
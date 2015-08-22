@extends('admin.adminlayouts.adminlayout')

@section('head')

    <!-- BEGIN PAGE LEVEL STYLES -->
    {{ HTML::style("assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css") }}
    {{ HTML::style("assets/global/plugins/bootstrap-select/bootstrap-select.min.css") }}
    {{ HTML::style("assets/global/plugins/select2/select2.css") }}
    {{ HTML::style("assets/global/plugins/jquery-multi-select/css/multi-select.css") }}
    <!-- BEGIN THEME STYLES -->
@stop


@section('mainarea')

			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			    {{$pageTitle}}
			</h3>
			<div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings.edit','setting') }}">Configuraciones</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href=""> Notificaciones</a>
                    </li>
                </ul></li>
				</ul>
			
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <div id="load">

                                   {{--INLCUDE ERROR MESSAGE BOX--}}
                                   @include('admin.common.error')
                                   {{--END ERROR MESSAGE BOX--}}


                      </div>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cog"></i>Notificaciones
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body form">

						<!------------------------ BEGIN FORM ---------------------->
						{{ Form::model($setting, ['method' => 'PATCH','files' => true, 'route' => ['admin.notificationSettings.update', $setting->id],'class'=>'form-horizontal form-bordered']) }}
                                    <div class="form-body">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Ayuda : </label>
                                            <div class="col-md-6">
                                            	 <input  type="checkbox" value="1"   class="make-switch" name="award_notification" @if($setting->award_notification==1)checked	@endif data-on-color="success" data-on-text="Si" data-off-text="No" data-off-color="danger">
                                            </div>
                                        </div>

                                        {{--<div class="form-group">--}}
                                        {{--<label class="col-md-2 control-label">Attendance Marked:</label>--}}
                                            {{--<div class="col-md-6">--}}
                                             {{--<input  type="checkbox" value="1"   class="make-switch" name="attendance_notification" @if($setting->attendance_notification==1)checked	@endif data-on-color="success" data-on-text="Yes" data-off-text="No" data-off-color="danger">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                   				 {{--<div class="form-group">--}}
                                        {{--<label class="col-md-2 control-label">Notice Board:</label>--}}
                                            {{--<div class="col-md-6">--}}
                                            {{--<input  type="checkbox" value="1"   class="make-switch" name="notice_notification" @if($setting->notice_notification==1)checked	@endif data-on-color="success" data-on-text="Yes" data-off-text="No" data-off-color="danger">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}


                                     {{--<div class="form-group">--}}
                                        {{--<label class="col-md-2 control-label">Leave Application:</label>--}}
                                            {{--<div class="col-md-6">--}}
                                            {{--<input  type="checkbox" value="1"   class="make-switch" name="leave_notification" @if($setting->leave_notification==1)checked	@endif data-on-color="success" data-on-text="Yes" data-off-text="No" data-off-color="danger">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
							 <div class="form-group">
							  <label class="col-md-2 control-label">Beneficiario:</label>
								  <div class="col-md-6">
								  <input  type="checkbox" value="1"   class="make-switch" name="employee_add" @if($setting->employee_add==1)checked	@endif data-on-color="success" data-on-text="Si" data-off-text="No" data-off-color="danger">
								  </div>
							  </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" data-loading-text="Actualizando..." class="demo-loading-btn btn green"><i class="fa fa-check"></i> Guardar</button>

                                                    </div>
                                                </div>
                                            </div>
                        	{{ Form::close() }}
                       <!------------------------- END FORM ----------------------->

						</div>
					    </div>
					<!-- END EXAMPLE TABLE PORTLET-->
					
				    </div>

			</div>
			<!-- END PAGE CONTENT-->



@stop

@section('footerjs')

<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script("assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js") }}
{{ HTML::script('assets/global/plugins/bootstrap-select/bootstrap-select.min.js') }}
{{ HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
{{ HTML::script('assets/global/plugins/select2/select2.min.js') }}
{{ HTML::script('assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}
{{ HTML::script('assets/admin/pages/scripts/components-dropdowns.js') }}



<script>
        jQuery(document).ready(function() {
           ComponentsDropdowns.init();
        });

    </script>
<!-- END PAGE LEVEL PLUGINS -->
@stop
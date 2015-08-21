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
						<a href="{{ route('admin.notificationSettings.edit',$admin->id) }}">Configuraciones</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""> General</a>
					</li>
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
								<i class="fa fa-cog"></i>Login {{$pageTitle}}
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body form">

						<!------------------------ BEGIN FORM---------------------->
						{{ Form::model($admin, ['method' => 'PATCH','route' => ['admin.profile_settings.update', $admin->id],'class'=>'form-horizontal form-bordered']) }}

                                    <div class="form-body">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Nombre: <span class="required">
                                        * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $admin->name }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-md-2 control-label"> Email: <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $admin->email}}" >
                                            </div>
                                        </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" data-loading-text="Updating..." class="demo-loading-btn btn green"><i class="fa fa-check"></i> Guardar</button>

                                                    </div>
                                                </div>
                                            </div>
                        						{{ Form::close() }}
                       <!------------------------- END FORM ----------------------->

						</div>
					    </div>
					<!-- END EXAMPLE TABLE PORTLET-->
					
				    </div>
				                <div class="portlet box blue">
                						<div class="portlet-title">
                							<div class="caption">
                								<i class="fa fa-key"></i>Cambiar Contraseña
                							</div>
                							<div class="tools">
                							</div>
                						</div>

                						<div class="portlet-body form">

                						<!------------------------ BEGIN FORM Change Password---------------------->
                						{{ Form::model($admin, ['method' => 'PATCH', 'route' => ['admin.profile_settings.update', $admin->id],'class'=>'form-horizontal form-bordered']) }}

                                                    <div class="form-body">

                                                        <div class="form-group">
                                                        <label class="col-md-2 control-label">Contraseña: <span class="required">
                                                        * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input type="password" class="form-control" name="password" placeholder="Contraseña" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label class="col-md-2 control-label">Confirmar Contraseña: <span class="required">
                                                            * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" >
                                                            </div>
                                                        </div>
                                                            <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <button type="submit" data-loading-text="Updating..." class="demo-loading-btn btn green"><i class="fa fa-check"></i> Guardar</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                    {{ Form::close() }}
                                       <!------------------------- END FORM Change Password ----------------------->

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
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
								<i class="fa fa-cogs"></i>Editar {{$pageTitle}}
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body form">

						<!------------------------ BEGIN FORM---------------------->
						{{ Form::model($setting, ['method' => 'PATCH','files' => true, 'route' => ['admin.settings.update', $setting->id],'class'=>'form-horizontal form-bordered']) }}

                                    <div class="form-body">

                                          <div class="form-group">
                                           <label class="control-label col-md-2">Logo</label>
                                           <div class="col-md-6">
                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                   <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                                                   {{HTML::image('assets/admin/layout/img/logo.png')}}

                                                   </div>
                                                   <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                   </div>
                                                   <div>
                                                       <span class="btn default btn-file">
                                                       <span class="fileinput-new">
                                                       Cambiar Imagen </span>
                                                       <span class="fileinput-exists">
                                                       Cambiar </span>
                                                       <input type="file" name="logo">
                                                       </span>
                                                       <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                       Eliminar </a>
                                                   </div>
                                               </div>
                                               <div class="clearfix margin-top-10">
                                                        <span class="label label-danger">
                                                        NOTA! </span> Tamano Maximo 117px x 30px

                                                    </div>

                                           </div>
                                       </div>

                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Organizacion : <span class="required">
                                        * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="website" placeholder="Nombre de la Organizacion" value="{{ $setting->website }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Email: <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $setting->email}}" >
                                            </div>
                                        </div>

                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Nombre del Usuario: <span class="required">  * </span></label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $setting->name}}">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                            <label class="control-label col-md-2">Moneda</label>
                                            <div class="col-md-6">
                                                <select class="bs-select form-control" data-show-subtext="true" name="currency">
                                                    <option data-icon="fa-usd"  value="fa-usd:USD" @if($setting->currency=='USD') selected @endif>USD</option>
                                                    <option data-icon="fa-euro" value="fa-euro:EURO" @if($setting->currency=='EURO') selected @endif >EURO</option>
                                                    <option data-icon="fa-bs"  value="fa-BS:BS" @if($setting->currency=='BS') selected @endif>BS</option>

                                                </select>
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
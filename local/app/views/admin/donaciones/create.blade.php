@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style("assets/global/plugins/bootstrap-select/bootstrap-select.min.css")}}
    {{HTML::style("assets/global/plugins/select2/select2.css")}}
    {{HTML::style("assets/global/plugins/jquery-multi-select/css/multi-select.css")}}
    <!-- BEGIN THEME STYLES -->
@stop


@section('mainarea')

			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
                Donaciones
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ route('admin.donaciones.index') }}">Donaciones</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Nueva Donacion</a>
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


					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-trophy"></i>Nueva Donacion
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body form">

						<!-- BEGIN FORM-->
						{{Form::open(array('url'=>"admin/donaciones",'class'=>'form-horizontal form-bordered','method'=>'POST'))}}


                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Descripcion de la Donacion:</label>

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="descripcion" placeholder="Descripcion de la Donacion" value="{{ Input::old('descripcion') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Monto: <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="montodonacion" placeholder="Monto" value="{{ Input::old('montodonacion') }}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Seleccionar Aportante: </label>
                                            <div class="col-md-6">
                                                {{ Form::select('personalID', $personales,null,['class' => 'form-control input-xlarge select2me','data-placeholder'=>'Seleccionar Aportante...']) }}

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Seleccionar Bnefeciario: </label>
                                            <div class="col-md-6">
                                                {{ Form::select('beneficiarioID', $beneficiarios,null,['class' => 'form-control input-xlarge select2me','data-placeholder'=>'Seleccionar Aportante...']) }}

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
{{HTML::script("assets/global/plugins/bootstrap-select/bootstrap-select.min.js")}}
{{HTML::script("assets/global/plugins/select2/select2.min.js")}}
{{HTML::script("assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js")}}
<!-- END PAGE LEVEL PLUGINS -->
@stop
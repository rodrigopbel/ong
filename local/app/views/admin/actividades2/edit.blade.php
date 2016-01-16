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
			<i class="fa fa-edit"></i> Edit
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ route('admin.ayudas.index') }}">Ayudas </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""> Editar Ayuda</a>
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
								<i class="fa fa-edit"></i>Editar Ayuda
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body form">
						<!------------------------ BEGIN FORM---------------------->
						{{ Form::model($ayuda, ['method' => 'PATCH', 'route' => ['admin.ayudas.update', $ayuda->id],'class'=>'form-horizontal form-bordered']) }}

                                    <div class="form-body">

                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Requerimiento: </label>
                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="requerimiento"  value="{{ $ayuda->requerimiento }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Centro de Salud: </label>
                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="centroSalud"  value="{{ $ayuda->centroSalud }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nit: </label>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="nit"  value="{{ $ayuda->nit }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nro de Factura: </label>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="numfactura"  value="{{ $ayuda->numfactura }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nombre del Aportante:</label>

                                            <div class="col-md-8">
                                                {{ Form::select('personalID',$personales ,$ayuda->aportanteID,['class'=>'form-control input-xlarge select2me']) }}

                                            </div>
                                        </div>
                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Nombre del Beneficiario:</label>

                                            <div class="col-md-8">
                                                {{ Form::select('beneficiarioID', $beneficiarios,$ayuda->beneficiarioID,['class'=>'form-control input-xlarge select2me']) }}
                                             </div>
                                     </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Gastos: ( <span class="fa {{$setting->currency_icon}}"></span> BS.)</label>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="gastos"  value="{{ $ayuda->gastos }}">
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
{{HTML::script("assets/global/plugins/bootstrap-select/bootstrap-select.min.js")}}
{{HTML::script("assets/global/plugins/select2/select2.min.js")}}
{{HTML::script("assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js")}}
<!-- END PAGE LEVEL PLUGINS -->
@stop
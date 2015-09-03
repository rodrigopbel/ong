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
			Ayuda
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ route('admin.ayudas.index') }}">Ayuda</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Nueva Ayuda</a>
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
								<i class="fa fa-trophy"></i>Nueva Ayuda
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body form">

						<!-- BEGIN FORM-->
						{{Form::open(array('url'=>"admin/ayudas",'class'=>'form-horizontal form-bordered','method'=>'POST'))}}


                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Monto Aporte: <span class="required">
                                        * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="montoaporte" placeholder="Monto Aporte" value="{{ Input::old('montoaporte') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Anomino: <span class="required">
                                        * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="anonimo" placeholder="Anonimo" value="{{ Input::old('anonimo') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Tipo Aporte: <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-6">
                                                {{ Form::select('tipo_aporte', array('ap' => 'AP', 'a' => 'A'), Input::old('tipo_aporte'),array('class'=>'form-control')) }}

                                                 </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Id Aporte: <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-6">
                                                {{ Form::select('personalID', $personal,null,['class' => 'form-control input-xlarge select2me','data-placeholder'=>'Seleccionar Aportante...']) }}

                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Nombre del Beneficiario:</label>

                                            <div class="col-md-8">
                                             {{ Form::select('beneficiarioID', $beneficiarios,null,['class' => 'form-control input-xlarge select2me','data-placeholder'=>'Seleccionar Beneficiario...']) }}
                                           </div>

                                          <div class="form-group">
                                          <label class="col-md-2 control-label">Mes:</label>

                                              <div class="col-md-3">
                                                <select class="form-control  select2me" name="porelMes">
                                                    <option value="" selected="selected">Mes</option>
                                                    <option value="enero"  @if(strtolower(date('F'))=='enero')selected='selected'@endif >Enero</option>
                                                    <option value="febrero" @if(strtolower(date('F'))=='febrero')selected='selected'@endif>Febrero</option>
                                                    <option value="marzo"    @if(strtolower(date('F'))=='marzo')selected='selected'@endif>Marzo</option>
                                                    <option value="abril"    @if(strtolower(date('F'))=='abril')selected='selected'@endif>Abril</option>
                                                    <option value="mayo"      @if(strtolower(date('F'))=='mayo')selected='selected'@endif>Mayo</option>
                                                    <option value="junio"     @if(strtolower(date('F'))=='junio')selected='selected'@endif>Junio</option>
                                                    <option value="julio"     @if(strtolower(date('F'))=='julio')selected='selected'@endif>Julio</option>
                                                    <option value="agosto"   @if(strtolower(date('F'))=='agosto')selected='selected'@endif>Agosto</option>
                                                    <option value="septiembre" @if(strtolower(date('F'))=='septiembre')selected='selected'@endif>Septiembre</option>
                                                    <option value="octubre"  @if(strtolower(date('F'))=='octubre')selected='selected'@endif>Octubre</option>
                                                    <option value="noviembre" @if(strtolower(date('F'))=='noviembre')selected='selected'@endif>Noviembre</option>
                                                    <option value="dicimbre" @if(strtolower(date('F'))=='dicimbre')selected='selected'@endif>Diciembre</option>
                                             </select>
                                                 </div>

                                                         <label class="col-md-2 control-label">Año:</label>

                                                   <div class="col-md-3">
                                                   {{ Form::selectYear('porelAnio', 2013, date('Y'),date('Y'),['class' => 'form-control select2me']) }}

                                                 </div>
                                            </div>

                                         {{--<label class="col-md-2 control-label">Nombre del Aportante:</label>--}}

                                         {{--<div class="col-md-8">--}}
                                             {{--{{ Form::select('personalID', $personal,null,['class' => 'form-control input-xlarge select2me','data-placeholder'=>'Seleccionar Aportante...']) }}--}}
                                         {{--</div>--}}

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
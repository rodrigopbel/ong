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
			<i class="fa fa-edit"></i> Edit <small>{{ $ayuda->ayudaName }} given to {{ $ayuda->beneficiarioDetails->beneficiarioID }}</small>
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
                                        <label class="col-md-2 control-label">Nombre de la Ayuda: <span class="required">
                                        * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="ayudaName" placeholder="Nombre de la Ayuda" value="{{ $ayuda->ayudaName }}">
                                            </div>
                                        </div>


                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Monto: ( <span class="fa {{$setting->currency_icon}}"></span> )</label>

                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="montoaporte" placeholder="Monto" value="{{ $ayuda->montoaporte }}">
                                                </div>
                                    </div>


                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Nombre del Beneficiario:</label>

                                            <div class="col-md-8">
                                            {{ Form::select('beneficiarioID', $beneficiarios,$ayuda->beneficiarioID,['class'=>'form-control input-xlarge select2me']) }}

                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Mes:</label>

                                              <div class="col-md-3">
                                             <select class="form-control select2me" name="forMonth">
                                                <option value="" selected="selected">Mes</option>
                                                <option value="enero"  @if($ayuda->forMonth=='enero')selected='selected'@endif >Enero</option>
                                                <option value="febrero" @if($ayuda->forMonth=='febrero')selected='selected'@endif>Febrero</option>
                                                <option value="marzo"    @if($ayuda->forMonth=='marzo')selected='selected'@endif>Marzo</option>
                                                <option value="abril"    @if($ayuda->forMonth=='abril')selected='selected'@endif>Abril</option>
                                                <option value="mayo"      @if($ayuda->forMonth=='mayo')selected='selected'@endif>Mayo</option>
                                                <option value="junio"     @if($ayuda->forMonth=='junio')selected='selected'@endif>Junio</option>
                                                <option value="julio"     @if($ayuda->forMonth=='julio')selected='selected'@endif>Julio</option>
                                                <option value="agosto"   @if($ayuda->forMonth=='agosto')selected='selected'@endif>Agosto</option>
                                                <option value="septiembre" @if($ayuda->forMonth=='septiembre')selected='selected'@endif>Septiembre</option>
                                                <option value="octubre"  @if($ayuda->forMonth=='octubre')selected='selected'@endif>Octubre</option>
                                                <option value="noviembre" @if($ayuda->forMonth=='noviembre')selected='selected'@endif>Noviembre</option>
                                                <option value="dicimbre" @if($ayuda->forMonth=='dicimbre')selected='selected'@endif>Diciembre</option>
                                         </select>

                                               </div>

                                             <label class="col-md-2 control-label">Año:</label>

                                                   <div class="col-md-3">
                                                            {{ Form::selectYear('porelAnio', 2013, 2015,$ayuda->porelAnio,['class'=>'form-control select2me']) }}
                                             </div>
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
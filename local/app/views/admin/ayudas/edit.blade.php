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
			<i class="fa fa-edit"></i> Edit <small>{{ $award->awardName }} given to {{ $award->employeeDetails->fullName }}</small>
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
						{{ Form::model($award, ['method' => 'PATCH', 'route' => ['admin.ayudas.update', $award->id],'class'=>'form-horizontal form-bordered']) }}

                                    <div class="form-body">

                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Nombre de la Ayuda: <span class="required">
                                        * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="awardName" placeholder="Nombre de la Ayuda" value="{{ $award->awardName }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Gift Item: <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="gift" placeholder="Gift" value="{{ $award->gift }}" >
                                            </div>
                                        </div>

                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Monto: ( <span class="fa {{$setting->currency_icon}}"></span> )</label>

                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="cashPrice" placeholder="Monto" value="{{ $award->cashPrice }}">
                                                </div>
                                    </div>


                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Nombre del Beneficiario:</label>

                                            <div class="col-md-8">
                                            {{ Form::select('employeeID', $employees,$award->employeeID,['class'=>'form-control input-xlarge select2me']) }}

                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Mes:</label>

                                              <div class="col-md-3">
                                             <select class="form-control select2me" name="forMonth">
                                                <option value="" selected="selected">Mes</option>
                                                <option value="january"  @if($award->forMonth=='january')selected='selected'@endif >Enero</option>
                                                <option value="february" @if($award->forMonth=='february')selected='selected'@endif>Febrero</option>
                                                <option value="march"    @if($award->forMonth=='march')selected='selected'@endif>Marzo</option>
                                                <option value="april"    @if($award->forMonth=='april')selected='selected'@endif>Abril</option>
                                                <option value="may"      @if($award->forMonth=='may')selected='selected'@endif>Mayo</option>
                                                <option value="june"     @if($award->forMonth=='june')selected='selected'@endif>Junio</option>
                                                <option value="july"     @if($award->forMonth=='july')selected='selected'@endif>Julio</option>
                                                <option value="august"   @if($award->forMonth=='august')selected='selected'@endif>Agosto</option>
                                                <option value="september" @if($award->forMonth=='september')selected='selected'@endif>Septiembre</option>
                                                <option value="october"  @if($award->forMonth=='october')selected='selected'@endif>Octubre</option>
                                                <option value="november" @if($award->forMonth=='november')selected='selected'@endif>Noviembre</option>
                                                <option value="december" @if($award->forMonth=='december')selected='selected'@endif>Diciembre</option>
                                         </select>

                                               </div>

                                             <label class="col-md-2 control-label">Año:</label>

                                                   <div class="col-md-3">
                                                            {{ Form::selectYear('forYear', 2013, 2015,$award->forYear,['class'=>'form-control select2me']) }}
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
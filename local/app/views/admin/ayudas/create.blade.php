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
						<a href="">Give an Awards</a>
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
								<i class="fa fa-trophy"></i>Give an Award
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body form">

						<!-- BEGIN FORM-->
						{{Form::open(array('url'=>"admin/ayudas",'class'=>'form-horizontal form-bordered','method'=>'POST'))}}


                                    <div class="form-body">

                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Nombre de la Ayuda: <span class="required">
                                        * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="awardName" placeholder="Nombre de la ayuda" value="{{ Input::old('awardName') }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Gift Item: <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="gift" placeholder="Gift" value="{{ Input::old('gift') }}" >
                                            </div>
                                        </div>

                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Monto:  <span class="fa {{$setting->currency_icon}}"></span></label>

                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="cashPrice" placeholder="Monto" value="{{ Input::old('cashPrice') }}">
                                                </div>
                                    </div>


                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Nombre del Beneficiario:</label>

                                            <div class="col-md-8">
                                             {{ Form::select('employeeID', $employees,null,['class' => 'form-control input-xlarge select2me','data-placeholder'=>'Select Employee...']) }}
                                           </div>

                                          <div class="form-group">
                                          <label class="col-md-2 control-label">Mes:</label>

                                              <div class="col-md-3">
                                                <select class="form-control  select2me" name="forMonth">
                                                    <option value="" selected="selected">Month</option>
                                                    <option value="january"  @if(strtolower(date('F'))=='january')selected='selected'@endif >January</option>
                                                    <option value="february" @if(strtolower(date('F'))=='february')selected='selected'@endif>February</option>
                                                    <option value="march"    @if(strtolower(date('F'))=='march')selected='selected'@endif>March</option>
                                                    <option value="april"    @if(strtolower(date('F'))=='april')selected='selected'@endif>April</option>
                                                    <option value="may"      @if(strtolower(date('F'))=='may')selected='selected'@endif>May</option>
                                                    <option value="june"     @if(strtolower(date('F'))=='june')selected='selected'@endif>June</option>
                                                    <option value="july"     @if(strtolower(date('F'))=='july')selected='selected'@endif>July</option>
                                                    <option value="august"   @if(strtolower(date('F'))=='august')selected='selected'@endif>August</option>
                                                    <option value="september" @if(strtolower(date('F'))=='september')selected='selected'@endif>September</option>
                                                    <option value="october"  @if(strtolower(date('F'))=='october')selected='selected'@endif>October</option>
                                                    <option value="november" @if(strtolower(date('F'))=='november')selected='selected'@endif>November</option>
                                                    <option value="december" @if(strtolower(date('F'))=='december')selected='selected'@endif>December</option>
                                             </select>
                                                 </div>

                                                         <label class="col-md-2 control-label">Año:</label>

                                                   <div class="col-md-3">
                                                   {{ Form::selectYear('forYear', 2013, date('Y'),date('Y'),['class' => 'form-control select2me']) }}

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
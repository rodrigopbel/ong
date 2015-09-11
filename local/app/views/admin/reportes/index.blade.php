@extends('admin.adminlayouts.adminlayout')

@section('head')
	<!-- BEGIN PAGE LEVEL STYLES -->
	{{HTML::style("assets/global/plugins/select2/select2.css")}}
	{{HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css")}}
	<!-- END PAGE LEVEL STYLES -->

@stop


@section('mainarea')

{{--{{dd("hola a todos")}}--}}
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
						<a href="#">Reportes</a>
						<i class="fa "></i>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <h2>Reportes Diarios</h2>
        {{--{{Form::open(array('id' => 'reporte-form',''))}}--}}
        {{ Form::open(['route' => 'ReporteBen', 'method' => 'GET', 'role' => 'form']) }}
        <div class="col-md-8">
            <div id="alert"></div>
            <label for="">Seleccione el Beneficiario para el reporte: </label>
            {{ Form::select('beneficiarioID', $beneficiarios,null,['id'=>'beneficiario','name' => 'beneficiario','class' => 'form-control input-xlarge select2me','data-placeholder'=>'Seleccionar Beneficiario...']) }}
            <button type="submit" data-loading-text="Generando..." class="demo-loading-btn btn green generarReporte"><i class="fa fa-check"></i> Generar Reporte</button>
        </div>
        {{ Form::close() }}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2>Reportes Mensuales</h2>
        <div class="form-group">
        {{ Form::open(['route' => 'ReporteBenMen', 'method' => 'GET', 'role' => 'form']) }}
        </div>
        <div class="col-md-8">
            {{ Form::select('beneficiarioID', $beneficiarios,null,['id'=>'beneficiario','name' => 'beneficiario','class' => 'form-control input-xlarge select2me','data-placeholder'=>'Seleccionar Beneficiario...']) }}
            <div class="form-group">
                <label class="col-md-2 control-label">Meses:</label>

                <div class="col-md-3">
                    <select class="form-control  select2me" name="meses">
                        <option value="" selected="selected">Meses</option>
                        <option value="1"  @if(strtolower(date('F'))=='january')selected='selected'@endif >Enero</option>
                        <option value="2" @if(strtolower(date('F'))=='february')selected='selected'@endif>Febrero</option>
                        <option value="3"    @if(strtolower(date('F'))=='march')selected='selected'@endif>Marzo</option>
                        <option value="4"    @if(strtolower(date('F'))=='april')selected='selected'@endif>Abril</option>
                        <option value="5"      @if(strtolower(date('F'))=='may')selected='selected'@endif>Mayo</option>
                        <option value="6"     @if(strtolower(date('F'))=='june')selected='selected'@endif>Junio</option>
                        <option value="7"     @if(strtolower(date('F'))=='july')selected='selected'@endif>Julio</option>
                        <option value="8"   @if(strtolower(date('F'))=='august')selected='selected'@endif>Agosto</option>
                        <option value="9" @if(strtolower(date('F'))=='september')selected='selected'@endif>Septiembre</option>
                        <option value="10"  @if(strtolower(date('F'))=='october')selected='selected'@endif>Octubre</option>
                        <option value="11" @if(strtolower(date('F'))=='november')selected='selected'@endif>Noviembre</option>
                        <option value="12" @if(strtolower(date('F'))=='december')selected='selected'@endif>Diciembre</option>
                    </select>
                </div>

                <label class="col-md-2 control-label">Anios:</label>

                <div class="col-md-3">
                    <select class="form-control  select2me" name="anios">
                        <option value="" selected="selected">Anios</option>
                        <option value="2015" selected='selected'>2015</option>
                        <option value="2016" selected='selected'>2016</option>
                        <option value="2017" selected='selected'>2017</option>
                        <option value="2018" selected='selected'>2018</option>
                        <option value="2019" selected='selected'>2019</option>
                        <option value="2020" selected='selected'>2020</option>
                    </select>

                </div>
            </div>
            <button type="submit" data-loading-text="Generando..." class="demo-loading-btn btn green generarReporte"><i class="fa fa-check"></i> Generar Reporte</button>
        </div>
        {{ Form::close() }}
    </div>
</div>


			<!-- END PAGE CONTENT-->

			{{--DELETE MODAL CALLING--}}
                @include('admin.common.delete')
            {{--DELETE MODAL CALLING END--}}
@stop
@section('footerjs')


<!-- BEGIN PAGE LEVEL PLUGINS -->
	{{ HTML::script("assets/global/plugins/select2/select2.min.js")}}
    {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js")}}

<!-- END PAGE LEVEL PLUGINS -->
<script>

</script>
@stop
	
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
        {{ Form::open(['route' => 'ReporteBenMen', 'method' => 'GET', 'role' => 'form']) }}
        <label class="radio checked">
            <span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span>
            {{ Form::radio('paymentOption', '1', array('data-toggle' => 'radio')) }}
            <b>Iron</b> - $1.50 / month / domain
        </label>
        <label class="radio">
            <span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span>
            {{ Form::radio('paymentOption', '2', array('data-toggle' => 'radio')) }}
            <b>Gold</b> - $12.99 / year / domain
        </label>
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
	
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
        {{Form::open(array('id' => 'reporte-form'))}}
        <div class="col-md-8">

            <div id="alert"></div>
            <label for="">Seleccione el Beneficiario para el reporte: </label>
            {{ Form::select('beneficiarioID', $beneficiarios,null,['id'=>'beneficiario','name' => 'beneficiario','class' => 'form-control input-xlarge select2me','data-placeholder'=>'Seleccionar Beneficiario...']) }}
            <button type="submit" data-loading-text="Generando..." class="demo-loading-btn btn green generarReporte"><i class="fa fa-check"></i> Generar Reporte</button>
            <button type="submit" class="btn-u btn-block input-group" id="submitbutton" onclick="reporte();return false;">Generar Reporte </button>
        </div>
        {{ Form::close() }}
    </div>
</div> <br/>

			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div id="load">
					@if(Session::get('success'))
					    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

					</div>

					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-trophy"></i>Reportes
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">


							<table class="table table-striped table-bordered table-hover" id="reportes">
							<thead>
							<tr>
								<th> AyudaID </th>
								<th> Nombre Beneficiario </th>
								<th> Requerimiento </th>
                                <th> Fecha Ayuda </th>
                                <th> Ingresos </th>
                                <th> Gastos </th>
                                <th> Saldo </th>
                            </tr>
							</thead>
							<tbody>
                        <tr >
                                <td>{{-- AyudaID --}}</td>
                                <td>{{-- Nombre Beneficiario --}}</td>
                                <td>{{-- Requerimiento --}}</td>
                                <td>{{-- Fecha Ayuda --}} </td>
                                <td>{{-- Ingresos --}}</td>
                                <td>{{-- Gastos --}}</td>
                                <td>{{-- Saldo --}}</td>

                            </tr>



							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

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
    function login(){

        $('#alert').html('<div class="alert alert-info"><span class="fa fa-info"></span> {{Lang::get('messages.submitting')}}</div>');
        $("#submitbutton").prop('disabled', true);

        $.ajax({
            type: "POST",
            url: " {{ URL::to('/reportesben') }} ",
            dataType: 'json',
            data: $('#reporte-form').serialize()

        }).done( function( response ) {

            $('#alert').html('');
            if(response.status == "success")
            {
                $('#alert').html('<div class="alert alert-success alert-dismissable"><span class="fa fa-check"></span> '+response.msg+'</div>');
                $('.input-group').remove();
                $('#submitbutton').remove();
                window.location.href= "{{route('donaciones')}}";
            }
            else if(response.status == "error")
            {

                var arr = response.msg;
                var alert1 ='';

                $("#submitbutton").prop('disabled', false);

                $.each(arr, function(index, value)
                {
                    if (value.length != 0)
                    {
                        alert1 += '<p>&#10006;  '+ value+ '</p>';

                    }
                });

                $('#alert').html('<div class="alert alert-danger alert-dismissable"> '+alert1+'</div>');

            }

        });
    }
</script>
@stop
	
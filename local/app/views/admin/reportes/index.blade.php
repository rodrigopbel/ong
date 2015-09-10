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
        {{Form::open(array('class'=>'form-horizontal form-bordered','method'=>'POST'))}}
        <div class="col-md-8">
            <label for="">Seleccione el Beneficiario para el reporte: </label>
            {{ Form::select('beneficiarioID', $beneficiarios,null,['id'=>'beneficiario','class' => 'form-control input-xlarge select2me','data-placeholder'=>'Seleccionar Beneficiario...']) }}
            <button type="submit" data-loading-text="Generando..." class="demo-loading-btn btn green generarReporte"><i class="fa fa-check"></i> Generar Reporte</button>
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

//        $('#beneficiario').on('change',function(){
//            var data = {
//                'id' : $(this).val()
//            };
//            console.log(data);
//        });
        {{--$('.generarReporte').on('click', function(){--}}
{{--//            alert($('#beneficiario').val());--}}
{{--//            console.log($('#beneficiario').val());--}}
            {{--var id = $('#beneficiario').val();--}}
            {{--var data = {--}}
                {{--'id' : id--}}
            {{--};--}}
            {{--$.ajax({--}}
                {{--url: '{{route("admin.ajax_reportes")}}',--}}
                {{--type: 'POST',--}}
                {{--data : data,--}}
                {{--dataType: 'JSON',--}}
                {{--beforeSend: function(){--}}
                    {{--console.log("generando reporte");--}}
                {{--},--}}
                {{--error : function (){--}}
                    {{--console.log("surgio algun error");--}}
                {{--},--}}
                {{--success: function(respuesta){--}}
                    {{--if(respuesta){--}}
                        {{--console.log(respuesta);--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
        $('form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url: '{{route("admin.ajax_reportes")}}',
                type: 'POST',
                data : {id : $('#beneficiario').val()},
                dataType: 'JSON',
                beforeSend: function(){
                    console.log("generando reporte");
                },
                error : function (e){
                    console.log(e);
                },
                success: function(respuesta){
                    if(respuesta){
                        console.log(respuesta);
                    }
                }
            });
        });


       	{{--$('#reportes').dataTable( {--}}
            {{--"bProcessing": true,--}}
            {{--"bServerSide": true,--}}
            {{--"sAjaxSource": "{{ route("admin.ajax_reportes") }}",--}}
            {{--"aaSorting": [[ 1, "asc" ]],--}}
            {{--"aoColumns": [--}}
                {{--{ 'sClass': 'center', "bSortable": true  },--}}
                {{--{ 'sClass': 'center', "bSortable": true  },--}}
                {{--{ 'sClass': 'center', "bSortable": true },--}}
                {{--{ 'sClass': 'center', "bSortable": true },--}}
                {{--{ 'sClass': 'center', "bSortable": true },--}}
                {{--{ 'sClass': 'center', "bSortable": false }--}}
            {{--],--}}
            {{--"columnDefs": [--}}
                        {{--{--}}
                            {{--"targets": [ 0 ],--}}
                            {{--"visible": false,--}}
                            {{--"searchable": false--}}
                        {{--},{--}}
                          {{--"targets": [ 5 ],--}}
                          {{--"visible": false,--}}
                          {{--"searchable": true--}}
                      {{--}--}}
                        {{--],--}}
            {{--"lengthMenu": [--}}
                            {{--[5, 15, 20, -1],--}}
                            {{--[5, 15, 20, "All"] // change per page values here--}}
                        {{--],--}}
            {{--"sPaginationType": "full_numbers",--}}
            {{--"fnRowCallback": function( nRow, aData, iDisplayIndex ) {--}}
                {{--var row = $(nRow);--}}
                {{--row.attr("id", 'row'+aData['0']);--}}
                {{--console.log(aData);--}}
            {{--}--}}
        {{--});--}}
</script>
@stop
	
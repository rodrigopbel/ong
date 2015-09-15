@extends('admin.adminlayouts.adminlayout')

@section('head')
	<!-- BEGIN PAGE LEVEL STYLES -->
	{{HTML::style("assets/global/plugins/select2/select2.css")}}
	{{HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css")}}
	<!-- END PAGE LEVEL STYLES -->

@stop


@section('mainarea')


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
						<a href="#">Actividades</a>
						<i class="fa "></i>
					</li>

				</ul>

			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
									<div class="row">
                        				<div class="col-md-6">

				 <a class="btn green" data-toggle="modal" href="{{URL::to('admin/actividades/create')}}">
                                       Nueva Actividad
                <i class="fa fa-plus"></i> </a>
                                        </div>
                                    </div>
                                     <hr>
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
								<i class="fa fa-trophy"></i>Lista de Actividades
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body">


							<table class="table table-striped table-bordered table-hover" id="actividades">
							<thead>
							<tr>
								<th> ActividadID </th>
								<th> Fecha </th>
								<th> Actividad</th>
								<th> Lugar </th>
								<th> Lista de Voluntarios </th>
								<th> Participantes </th>
                                <th> Fecha Creacion </th>



								<th> Accion </th>
							</tr>
							</thead>
							<tbody>
                        <tr >
                                <td>{{-- ActividadID --}}</td>
                                <td>{{-- Fecha --}}</td>
                                <td>{{-- Actividad --}}</td>
                                <td>{{-- Lugar --}} </td>
                                <td>{{-- Lista de Voluntarios --}}</td>
                                <td>{{-- Participantes --}}</td>
                                <td>{{-- Fecha Creacion --}}</td>

                                <td>{{-- Action --}} </td>
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
        jQuery(document).ready(function() {

            ComponentsPickers.init();
        });

        var $insertBefore = $('#insertBefore');
        var $i = 0;
        $('#plusButton').click(function(){
            $i = $i+1;
            $(' <div class="form-group"> ' +
            '<div class="col-md-3"><input class="form-control form-control-inline input-medium date-picker'+$i+'" name="date['+$i+']" type="text" value="" placeholder="Fecha"/></div>' +
            '<div class="col-md-6"><input class="form-control form-control-inline" name="descripcion['+$i+']" type="text" value="" placeholder="Descripcion"/></div>' +
            '<div class="col-md-3"><input class="form-control form-control-inline" name="lugar['+$i+']" type="text" value="" placeholder="Lugar"/></div>' +
            '</div>').insertBefore($insertBefore);
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.date-picker'+$i).datepicker();
        });

        	$('#actividades').dataTable( {
                        "bProcessing": true,
                        "bServerSide": true,
                        "sAjaxSource": "{{ route("admin.ajax_actividades") }}",
                        "aaSorting": [[ 1, "asc" ]],
                        "aoColumns": [
                            { 'sClass': 'center', "bSortable": true  },
                            { 'sClass': 'center', "bSortable": true  },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": false }


                        ],
                        "columnDefs": [
                                    {
                                        "targets": [ 0 ],
                                        "visible": false,
                                        "searchable": false
                                    },{
									  "targets": [ 5 ],
									  "visible": false,
									  "searchable": true
								  }
                                    ],
                        "lengthMenu": [
										[5, 15, 20, -1],
										[5, 15, 20, "All"] // change per page values here
									],
                        "sPaginationType": "full_numbers",
                        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                            var row = $(nRow);
                            row.attr("id", 'row'+aData['0']);
                        }

             });



		function del(id,ayudaaName,actividad)
		{

			$('#deleteModal').appendTo("body").modal('show');
			$('#info').html('Esta seguro de Eliminar <strong>'+actividad+'</strong> dado a <strong>'+ayudaaName+'</strong>??');
			$("#delete").click(function()
			{
					var url = "{{ route('admin.actividades.destroy',':id') }}";
					url = url.replace(':id',id);
					 $.ajax({

		                type: "DELETE",
		                url : url,
		                dataType: 'json',
		                data: {"id":id}

		            	}).done(function(response)
		           		  {

		               	 	 if(response.success == "deleted")
		                 	 {
		                 	 		$("html, body").animate({ scrollTop: 0 }, "slow");
		                  	   		$('#deleteModal').modal('hide');
		                  	   		 $('#row'+id).fadeOut(500);

		                 	  		$('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Eliminada exitosamente!</p>");
		                  	 }
		           		 });
				})

			}
</script>
@stop
	
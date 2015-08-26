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
			<small>Lista de Personal</small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Inicio</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{route('admin.personal.index')}}">Personal</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Lista</a>
				</li>
			</ul>
		</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div id="load">
				{{--@if(Session::get('success'))--}}
                    {{--<div class="alert alert-success">{{ Session::get('success') }}</div>--}}
                {{--@endif--}}
            </div>
            <a href="{{route('admin.personal.create')}}" class="btn green">
                Nuevo <i class="fa fa-plus"></i>
            </a><hr>
			<div class="portlet box blue">
                <div class="portlet-title">
					<div class="caption">
				    	<i class="fa fa-users"></i>Personal
					</div>
					{{--<div class="tools" style="  padding: 5px;">--}}
                        {{--<div class="btn-group pull-right">--}}
                        	{{--<a  href="{{route('admin.personal.export') }}" class="btn yellow">--}}
								 {{--<i class="fa fa-file-excel-o"></i>    Exportar--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_employees">
						<thead>
							<tr>
								<th class="text-center">
									 PersonalID
								</th>
								<th class="text-center">
                                     Foto
                                </th>
								<th style="text-align: center">
									 Nombres
								</th>
								<th class="text-center">
                                	 Apellidos
                                </th>
								<th class="text-center">
                                	 Email
                                </th>
								<th class="text-center">
									 Tipo
								</th>
								<th class="text-center">
									 Estado
								</th>
								<th class="text-center">
									 Accion
								</th>
							</tr>
							</thead>
							<tbody>
					        {{--@foreach ($personales as $personal)--}}
                                {{--<tr id="row{{ $personal->personalID }}">--}}
                                    {{--<td>--}}
                                            {{--{{ $personal->personalID }}--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--{{HTML::image("/profileImages/{$personal->foto}",'ProfileImage',['height'=>'80px'])}}--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                          {{--{{ $employee->nombres}}--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                          {{--{{ $personal->apellidos}}--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                          {{--{{ $personal->email}}--}}
                                    {{--</td>--}}
                                     {{--<td>--}}
                                          {{--{{ $personal->tipoPersonal }}--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--@if($employee->estado=='activo')--}}
                                        {{--<span class="label label-sm label-success"> Activo </span>--}}
                                    {{--@else--}}
                                        {{--<span class="label label-sm label-danger"> Inactivo </span>--}}
                                     {{--@endif--}}
                                    {{--</td>--}}
                                    {{--<td class="">--}}
                                    {{--<p> <a class="btn purple" href="{{ route('admin.personal.edit',$employee->employeeID)  }}"><i class="fa fa-edit"></i> Editar</a></p>--}}
                                    {{--<p>    <a class="btn red" style="width: 50px;" href="javascript:;" onclick="del('{{$personal->personalID}}','{{ $personal->email }}')"><i class="fa fa-trash"></i> Eliminar</a></p>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
							{{--@endforeach--}}
							</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @include('admin.common.delete')
    @stop
    @section('footerjs')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
	{{ HTML::script("assets/global/plugins/select2/select2.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js")}}
    {{ HTML::script("assets/admin/pages/scripts/table-managed.js")}}
<!-- END PAGE LEVEL PLUGINS -->
	<script>
	jQuery(document).ready(function() {
	   TableManaged.init();
	});
	</script>
	<script>
	function del(id,name)
    		{
    			$('#deleteModal').appendTo("body").modal('show');
    			$('#info').html('Esta seguro de querer eliminar al Personal : <strong>'+name+'</strong> ??');
    			$("#delete").click(function()
    			{
    					var url = "{{ route('admin.personal.destroy',':id') }}";
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
    		                 	  		$('#row'+id).closest('tr').remove();
    		                 	  		$('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Eliminado correctamente</p>");
    		                  	 }
    		           		 });
    				})
    			}
</script>
@stop
	
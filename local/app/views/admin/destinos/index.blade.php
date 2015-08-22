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
                        <a href="#">Objetivos y Destinos</a>
                        <i class="fa"></i>
                    </li>

				</ul>
			
			</div>
			<!-- END PAGE HEADER-->

			  <div id="load">
                        {{--INLCUDE ERROR MESSAGE BOX--}}
                               @include('admin.common.error')
                       {{--END ERROR MESSAGE BOX--}}
                        </div>

			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->


				<a class="btn green" data-toggle="modal" href="#static">
                                        Nuevo Destino
                         <i class="fa fa-plus"></i> </a>

                     <hr>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-briefcase"></i> Lista
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body">

							<table class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
								<th>
									 ID
								</th>
								<th>
									 Destino
								</th>
								<th>
									 Objetivos
								</th>

								<th>
									 Accion
								</th>
							</tr>
							</thead>
							<tbody>
				@if(count($destinos)>0)
				@foreach ($destinos as $destino)
							<tr id="row{{ $destino->id }}">
								<td>
									  {{ $destino->id }}
								</td>
								<td>
								 {{ $destino->destino }}

								</td>

								<td>
                                    <ol>
                                    @foreach($destino->objetivos as $obj)
                                     <li>   {{ $obj->objetivo }}</li>

                                    @endforeach
                                    </ol>
								</td>
								<td class=" ">
                                	<a class="btn purple"  data-toggle="modal" href="#edit_static" onclick="showEdit({{$destino->id}},'{{ $destino->destino }}')"><i class="fa fa-edit"></i></a>

              						<a class="btn red" style="width: 42px;" href="javascript:" onclick="del({{$destino->id}},'{{ $destino->destino }}')"><i class="fa fa-trash"></i></a>
                                </td>
							</tr>
				@endforeach
				@endif
					
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->

        {{--MODALS--}}

             			<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title"><strong><i class="fa fa-plus"></i> Nuevo  Destino</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet-body form">

                                                                    						<!-- BEGIN FORM-->
                                        {{Form::open(array('route'=>"admin.destinos.store",'class'=>'form-horizontal ','method'=>'POST'))}}


                                            <div class="form-body">

                                                    <p class="text-success">
                                                            Destino
                                                           </p>
                                                  <div class="form-group">
                                                      <div class="col-md-12">
                                                         <input class="form-control form-control-inline " name="destino" type="text" value="" placeholder="Destino"/>

                                                      </div>

                                                 </div>
                                                <hr>
                                                 <p class="text-success">
                                                          Objetivo
                                                </p>
                                                <div class="form-group">
                                                     <div class="col-md-6">
                                                        <input class="form-control form-control-inline input-medium " name="objetivo[0]" type="text" value="" placeholder="Objetivo #1"/>
                                                     </div>
                                                    <div class="col-md-6">

                                                   </div>
                                                </div>
                                                 <div id="insertBefore"></div>
                                                <button type="button" id="plusButton" class="btn btn-sm green form-control-inline">
                                                                Nuevo Objetivo<i class="fa fa-plus"></i>
                                                </button>

                                         </div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn green"><i class="fa fa-check"></i> Enviar</button>

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
            </div>
                        </div>

          {{--MODALS--}}


{{--------------------------EDIT MODALS-----------------}}

             			<div id="edit_static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title"><strong><i class="fa fa-edit"></i> Editar Destino</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet-body form">

                                                                                        <!-- BEGIN FORM-->


                                    {{ Form::open(['method' => 'PATCH', 'url' => '','class'=>'form-horizontal','id'=>'edit_form']) }}

                                        <div class="form-body">

                                                <p class="text-success">
                                              Objetivo
                                            </p>
                                              <div class="form-group">
                                                  <div class="col-md-12">
                                                     <input class="form-control form-control-inline " name="destino" id="edit_destName" type="text" value="" placeholder="Destino" />

                                                  </div>

                                             </div>

                                            <div id="destresponse"></div>


                                             <div id="insertBefore_edit"></div>
                                            <button type="button" id="plus_edit_Button" class="btn btn-sm green form-control-inline">
                                                            Nuevo Objetivo<i class="fa fa-plus"></i>
                                            </button>

                                     </div>
                                     <br>
							   <div class="note note-warning">
							   {{Lang::get('messages.deleteNoteDesignation')}}
							   </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" data-loading-text=" Actualizando..." class="demo-loading-btn btn green"><i class="fa fa-edit"></i> Actualizar</button>

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
                    </div>
                    </div>

  {{------------------------END EDIT MODALS---------------------}}


			{{--DELETE MODAL CALLING--}}
                @include('admin.common.delete')
            {{--DELETE MODAL CALLING END--}}
@stop



@section('footerjs')

<script>

             var $insertBefore = $('#insertBefore');
                    var $i = 0;
                    $('#plusButton').click(function(){
                         $i = $i+1;
                        $(' <div class="form-group"> <div class="col-md-12"><input class="form-control form-control-inline input-medium"  name="objetivo['+$i+']" type="text"  placeholder="Objetivo #'+($i+1)+'"/></div></div>').insertBefore($insertBefore);

                    });
//-----EDIT Modal

        var $insertBefore_edit = $('#insertBefore_edit');
             var $j = 0;
             var $countIds = 0;
            $('#plus_edit_Button').click(function(){
                $countIds = parseInt($('#countobjs').val());
                if ($countIds>0) {
                    $j= $countIds;
                }
              $j = $j+1;
              $(' <div class="form-group" id="edit_field"> <div class="col-md-12"><input class="form-control form-control-inline input-medium"  name="objetivo['+$j+']" type="text"  placeholder="Objetivo #'+($j)+'"/></div></div>').insertBefore($insertBefore_edit);


            });

		function del(id,dept)
		{

			$('#deleteModal').appendTo("body").modal('show');
			$('#info').html('Esta muy seguro de querer eliminar <strong>'+dept+'</strong> este objetivo?<br>' +
			 '<br><div class="note note-warning">' +
			  '{{Lang::get('messages.deleteNoteDepartment')}}'+
              '</div>');
			$("#delete").click(function()
			{
				var url = "{{ route('admin.destinos.destroy',':id') }}";
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
                                $('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Eliminado Correctamente</p>");
                         }
                     });
				})

			}

			function showEdit(id,destName)
			{

                    $('div[id^="edit_field"]').remove();
                    var url = "{{ route('admin.destinos.update',':id') }}";
                    url = url.replace(':id',id);
                    $('#edit_form').attr('action',url );

					var get_url = "{{ route('admin.destinos.edit',':id') }}";
					get_url = get_url.replace(':id',id);

			        $("#edit_destName").val(destName);
			        $("#destresponse").html('<div class="text-center">{{HTML::image('assets/admin/layout/img/loading-spinner-blue.gif')}}</div>');

                    $.ajax({

                            type: "GET",
                            url : get_url,

                            data: {"id":id}

                            }).done(function(response)
                              {
                                        $("#destresponse").html(response);
                                        $j = $('input#objetivo').length-1;
                             });

			}
</script>
@stop
	
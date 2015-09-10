@extends('admin.adminlayouts.adminlayout')
{{dd("dentro")}}
@section('head')

	<!-- BEGIN PAGE LEVEL STYLES -->
	{{HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}
	{{HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}
	<!-- END PAGE LEVEL STYLES -->
@stop


@section('mainarea')

        			<!-- BEGIN PAGE HEADER-->
<h3 class="page-title" xmlns="http://www.w3.org/1999/html">
        			Reporte del Beneficiario
        			</h3>
        			<div class="page-bar">
        				<ul class="page-breadcrumb">
        					<li>
        						<i class="fa fa-home"></i>
                                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
        						<i class="fa fa-angle-right"></i>
        					</li>
        					<li>
        						<a href="{{route('admin.reportes.index')}}">Beneficiarios</a>
        						<i class="fa fa-angle-right"></i>
        					</li>
        					<li>
                                <a href="">Editar </a>

                            </li>
        				</ul>
        			</div>
        			<!-- END PAGE HEADER-->
        			<div class="clearfix">
        			</div>
        			<div class="row ">
        				<div class="col-md-6 col-sm-6">
        					<div class="portlet box purple-wisteria">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-calendar"></i>Detalles Generales
        							</div>
        						</div>


        						<div class="portlet-body">
                                {{--------------------Personal Info Form--------------------------------------------}}
        						<div class="form-body">
                            				<div class="form-group ">
        										<label class="control-label col-md-3">Foto</label>
        										<div class="col-md-9">
        											<div class="fileinput fileinput-new" data-provides="fileinput">
        												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
        												 {{HTML::image("/profileImages/{$beneficiario->foto}",'foto')}}
                                                         <input type="hidden" name="hiddenImage" value="{{$beneficiario->foto}}">
        												</div>
        												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
        												</div>
        												<div>
        													<span class="btn default btn-file">
        													<span class="fileinput-new">
        													Sellecionar imagen </span>
        													<span class="fileinput-exists">
        													Cambiar </span>
        													<input type="file" name="foto">
        													</span>
        													<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
        													Eliminar </a>
        												</div>
        											</div>

        											<div class="clearfix margin-top-10">
                                                            <span class="label label-danger">
                                                            NOTA! </span> Tamano de imagen (872px x 724px)

                                                        </div>
        											</div>
        										</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Nombres<span class="required">* </span></label>
        										<div class="col-md-9">
        											<input type="text" name="nombres" class="form-control" value="{{$beneficiario->nombres}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Apellidos</label>
        										<div class="col-md-9">
        											<input type="text" name="apellidos" class="form-control" value="{{$beneficiario->apellidos}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="control-label col-md-3">Fecha de Nacimiento</label>
        										<div class="col-md-3">
        											<div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
        												<input type="text" class="form-control" name="date_of_birth" readonly value="@if(empty($beneficiario->fechanac))@else{{date('d-m-Y',strtotime($beneficiario->fechanac))}}@endif" >
        												<span class="input-group-btn">
        												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
        												</span>
        											</div>
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Genero</label>
        										<div class="col-md-9">
        											<select class="form-control" name="genero">

        												<option value="hombre" @if($beneficiario->genero=='hombre') selected @endif>Varon</option>
        												<option value="mujer"  @if($beneficiario->genero=='mujer') selected @endif>Mujer</option>
														<option value="otros"  @if($beneficiario->genero=='otros') selected @endif>Otros</option>
        											</select>
        										</div>
        									</div>

        									<div class="form-group">
        										<label class="col-md-3 control-label">Telefono</label>
        										<div class="col-md-9">
        											<input type="text" name="telefono" class="form-control" value="{{$beneficiario->telefono}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Direccion Actual</label>
        										<div class="col-md-9">
        											<textarea name="direccion" class="form-control" rows="3">{{$beneficiario->direccion}}</textarea>
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Direccion Permanente</label>
        										<div class="col-md-9">
        											<textarea name="direccionperm" class="form-control" rows="3">{{$beneficiario->direccionperm}}</textarea>
        										</div>
        									</div>
        									<h4><strong>Cuenta de Beneficiario</strong></h4>
        									<div class="form-group">
                                                    <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="email" class="form-control" value="{{$beneficiario->email}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Password</label>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="oldpassword" value="{{$beneficiario->password}}">
                                                        <input type="text" name="password" class="form-control">
                                                    </div>
                                                </div>
        								</div>
        						</div>
        					</div>
        				</div>
        				<div class="col-md-6 col-sm-6">
        					<div class="portlet box red-sunglo">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-calendar"></i>Detalles de la Donacion
        							</div>
        						</div>
        						<div class="portlet-body">

        						{{--------------------Company Form--------------------------------------------}}
        								<div class="form-body">
        									<div class="form-group">
        										<label class="col-md-3 control-label">Caso #<span class="required">* </span></label>
        										<div class="col-md-9">
        											<input type="text" name="beneficiarioID" class="form-control" readonly value="{{$beneficiario->beneficiarioID}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Destino<span class="required">* </span></label>
        										<div class="col-md-9">
        											{{ Form::select('destino', $destinos,$beneficiario->getObjetivo->destID,['class' => 'form-control select2me','id'=>'destino','onchange'=>'objetivos();return false;']) }}
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Objetivo<span class="required">* </span></label>
        										<div class="col-md-9">

        											 <select  class="select2me form-control" name="objetivo" id="objetivo" >

                                                     </select>
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="control-label col-md-3">Fecha de Solicitud</label>
        										<div class="col-md-3">
        											<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
        												<input type="text" class="form-control" name="fechaing" readonly value="@if(empty($beneficiario->fechaing))00-00-0000 @else {{date('d-m-Y',strtotime($beneficiario->fechaing))}} @endif">
        												<span class="input-group-btn">
        												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
        												</span>
        											</div>
        										</div>
        									</div>
        									<div class="form-group">
                                                    <label class="control-label col-md-3">Fecha de Devinculacion</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                            <input type="text" class="form-control" name="fecha_desvinculacion" readonly value="@if(empty($beneficiario->fecha_desvinculacion)) @else {{date('d-m-Y',strtotime($beneficiario->fecha_desvinculacion))}} @endif">
                                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                	<div class="form-group">
														<label class="control-label col-md-3">Estado</label>
														<div class="col-md-3">
															   <input  type="checkbox" value="activo" onchange="remove_exit();" class="make-switch" name="status" @if($beneficiario->status=='activo')checked	@endif data-on-color="success" data-on-text="Activo" data-off-text="Inactivo" data-off-color="danger">
														</div>
													</div>

        									<hr>
        									<h4><strong>Monto Requerido  ( <i class="fa {{$setting->currency_icon}}"></i> )</strong></h4>

                                         @foreach($beneficiario->getSoldonacion as $solicitud)
                                         <div id="salary{{$solicitud->id}}">
                                              <div class="form-group" >
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" name="tipo[{{$solicitud->id}}]" value="{{$solicitud->tipo}}">
                                                     </div>

                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" name="monto[{{$solicitud->id}}]" value="{{$solicitud->monto}}">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <a class="btn btn-sm red" onclick="del('{{$solicitud->id}}','{{$solicitud->tipo}}')"><i class="fa fa-trash"></i> </a>

                                                    </div>
                                                </div>
                                                </div>
                                         @endforeach
        							{{----------------Company Form end -------------}}

        						</div>
        					</div>

        					<div class="portlet box red-sunglo">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-calendar"></i>Zonificacion
        							</div>
        							<div class="actions">
        								<a href="javascript:;" onclick="UpdateDetails('{{$beneficiario->beneficiarioID}}','zonificacion');return false" data-loading-text="Actualizando..."  class="demo-loading-btn-ajax btn btn-sm btn-default ">
        								<i class="fa fa-save"></i> Guardar </a>
        							</div>
        						</div>
        						<div class="portlet-body">

        						{{--------------------Bank Account Form--------------------------------------------}}
        							{{Form::open(['class'   =>  'form-horizontal','id'  =>  'bank_details_form'])}}
        							<input type="hidden" name="updateType" class="form-control" value="zonificacion">

        							<div id="alert_bank"></div>
        								<div class="form-body">
        									<div class="form-group">
        										<label class="col-md-3 control-label">Departamento</label>
        										<div class="col-md-9">
        											<input type="text" name="departamento" class="form-control" value="{{$zonificacion->departamento or ''}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Provincia</label>
        										<div class="col-md-9">
        											<input type="text" name="provincia" class="form-control" value="{{$zonificacion->provincia or ''}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Localidad</label>
        										<div class="col-md-9">
        											<input type="text" name="localidad" class="form-control" value="{{$zonificacion->localidad or ''}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Canton</label>
        										<div class="col-md-9">
        											<input type="text" name="canton" class="form-control" value="{{$zonificacion->canton or ''}}">
        										</div>
        									</div>

       									    <div class="form-group">
        										<label class="col-md-3 control-label">Zona</label>
        										<div class="col-md-9">
        											<input type="text" name="zona" class="form-control" value="{{$zonificacion->zona or ''}}">
        										</div>
        									</div>

        									<div class="form-group">
        										<label class="col-md-3 control-label">Nota</label>
        										<div class="col-md-9">
													<textarea class="form-control" name="otros" rows="3">{{$zonificacion->otros or '' }}</textarea>
        										</div>
        									</div>
        								</div>
        							{{Form::close()}}
        						{{-------------------Bank Account Form end-----------------------------------------}}


        						</div>
        					</div>
        				</div>
        			</div>
   {{------------------------------------END NEW SALARY ADD MODALS--------------------------------------}}

@stop



@section('footerjs')


<!-- BEGIN PAGE LEVEL PLUGINS -->
    {{ HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}
    {{ HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
    {{ HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{ HTML::script('assets/admin/pages/scripts/components-pickers.js')}}

<!-- END PAGE LEVEL PLUGINS -->




<script>
        jQuery(document).ready(function() {
           ComponentsPickers.init();
			objetivos();

        });

		function objetivos(){

			$.getJSON("{{ URL::to('admin/destinos/ajax_objetivos/')}}",
					{ destID: $('#destino').val() },
					function(data) {
						var model = $('#objetivo');
						model.empty();
						var selected='';
						var match= {{ $beneficiario->objetivo}}
						$.each(data, function(index, element) {
							model.append("<option value='"+element.id+"'>" + element.objetivo + "</option>");
						});

					});

		}

// Javascript function to update the company info and Bank Info
       function UpdateDetails(id,type){

           var  form_id = '';
           var alert_div = '';

            if(type=='zonificacion')
            {
                form_id     = '#bank_details_form';
                alert_div   =  '#alert_bank'

            }else
            {
                form_id     = '#company_details_form';
                alert_div   =   '#alert_company';
            }
           $(alert_div).html('<div class="alert alert-info"><span class="fa fa-info"></span> Guardando..</div>');
					var url = "{{ route('admin.beneficiarios.update',':id') }}";
					url = url.replace(':id',id);
              $.ajax({
                             type: "PATCH",
                             url : url,
                             dataType: 'json',
                             data: $(form_id).serialize()

                     }).done( function( response ) {
                         $(alert_div).html('');
                         if(response.status == "success")
                         {
                               $(alert_div).html('<div class="alert alert-success alert-dismissable"><button class="close" data-close="alert"></button><span class="fa fa-check"></span> '+response.msg+'</div>');

                         }else if(response.status == "error")
                         {
							 var arr = response.msg;
							 var alert ='';
							 $.each(arr, function(index, value)
							 {
								 if (value.length != 0)
								 {
									alert += '<p><span class="fa fa-warning"></span> '+ value+ '</p>';

								 }
							 });

							 $(alert_div).append('<div class="alert alert-danger alert-dismissable"><button class="close" data-close="alert"></button> '+alert+'</div>');
                         }
                     });
       }

function del(id,type)
		{

            var alert_div   =   '#alert_company';
			$('#deleteModal').appendTo("body").modal('show');
			$('#info').html('Eliminar  <strong>'+type+'</strong> Donacion??.');
			$("#delete").click(function()
			{
				var url = "{{ route('admin.salary.destroy',':id') }}";
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
							$('#deleteModal').modal('hide');
							$('#salary'+id).remove();
							$(alert_div).html('<div class="alert alert-success alert-dismissable"><button class="close" data-close="alert"></button><span class="fa fa-check"></span> '+response.msg+'</div>');
					 }
				 });
			})

			}

	function remove_exit()
	{
		if($("input[name=status]:checked").val() == "active"){
			$("input[name=exit_date]").val("");
		}
	}


	$("input[name=exit_date]").change(function () {
	  $("input[name=status]").bootstrapSwitch('state',false);

	});
    </script>

@if(Session::get('successDocuments'))
    {{--Move to bottom of page if success comes from documents--}}
    <script>
            $("html, body").animate({ scrollTop: $(document).height() }, 2000);
    </script>
 @endif

@stop

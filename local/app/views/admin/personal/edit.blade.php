@extends('admin.adminlayouts.adminlayout')
@section('head')
	<!-- BEGIN PAGE LEVEL STYLES -->
	{{HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}
	{{HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}
	<!-- END PAGE LEVEL STYLES -->
@stop
@section('mainarea')
<!-- BEGIN PAGE HEADER-->
    <h3 class="page-title" xmlns="http://www.w3.org/1999/html">
        Detalles de la Persona
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('admin.personal.index')}}">Personas</a>
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
        				<div class="col-md-12 col-sm-12">
        					<div class="portlet box purple-wisteria">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-calendar"></i>Detalles de las Personas
        							</div>
        							<div class="actions">

        								<a href="javascript:;"  onclick="$('#personal_details_form').submit();" data-loading-text="Guardando..."  class="demo-loading-btn btn btn-sm btn-default ">
        								<i class="fa fa-save" ></i> Guardar </a>
        							</div>
        						</div>


        						<div class="portlet-body">


                                {{--------------------Personal Info Form--------------------------------------------}}

        							{{Form::open(['method' => 'PATCH','route'=> ['admin.personal.update', $personal->personalID],'class'   =>  'form-horizontal','id'  =>  'personal_details_form','files'=>true])}}
        							<input type="hidden" name="updateType" class="form-control" value="personalInfo">

                                     @if(Session::get('successPersonal'))
                                            <div class="alert alert-success"><i class="fa fa-check"></i> {{ Session::get('successPersonal') }}</div>
                                     @endif


                                      @if (Session::get('errorPersonal'))

                                             <div class="alert alert-danger alert-dismissable ">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                 @foreach (Session::get('errorPersonal') as $error)
                                                     <p><strong><i class="fa fa-warning"></i></strong> {{ $error }}</p>
                                                 @endforeach
                                             </div>
                                      @endif




        								<div class="form-body">
                            <div class="form-group ">
        										<label class="control-label col-md-3">Foto</label>
        										<div class="col-md-9">
        											<div class="fileinput fileinput-new" data-provides="fileinput">
        												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
        												 {{HTML::image("/profileImages/{$personal->fotoPersonal}",'ProfileImage')}}
                                                         <input type="hidden" name="hiddenImage" value="{{$personal->fotoPersonal}}">
        												</div>
        												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
        												</div>
        												<div>
        													<span class="btn default btn-file">
        													<span class="fileinput-new">
        													Sellecionar imagen </span>
        													<span class="fileinput-exists">
        													Cambiar </span>
        													<input type="file" name="profileImage">
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
        											<input type="text" name="nombres" class="form-control" value="{{$personal->nombres}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Apellidos</label>
        										<div class="col-md-9">
        											<input type="text" name="apellidos" class="form-control" value="{{$personal->apellidos}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="control-label col-md-3">Fecha de Nacimiento</label>
        										<div class="col-md-3">
        											<div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
        												<input type="text" class="form-control" name="fechanac" readonly value="@if(empty($personal->fechanac))@else{{date('d-m-Y',strtotime($personal->fechanac))}}@endif" >
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

        												<option value="hombre" @if($personal->genero=='Hombre') selected @endif>Hombre</option>
        												<option value="mujer"  @if($personal->genero=='Mujer') selected @endif>Mujer</option>
        												<option value="otros"  @if($personal->genero=='Otros') selected @endif>Otros</option>
        											</select>
        										</div>
        									</div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tipo de Persona</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="genero">

                                                        <option value="hombre" @if($personal->tipoPersonal=='Hombre') selected @endif>Hombre</option>
                                                        <option value="mujer"  @if($personal->tipoPersonal=='Mujer') selected @endif>Mujer</option>
                                                        <option value="otros"  @if($personal->tipoPersonal=='Otros') selected @endif>Otros</option>
                                                    </select>
                                                </div>
                                            </div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Telefono</label>
        										<div class="col-md-9">
        											<input type="text" name="telefono" class="form-control" value="{{$personal->telefono}}">
        										</div>
        									</div>
        									<h4><strong>Cuenta de la Persona</strong></h4>
        									<div class="form-group">
                                                    <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="email" class="form-control" value="{{$personal->email}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Password</label>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="password" value="{{$personal->password}}">
                                                        <input type="text" name="password" class="form-control">
                                                    </div>
                                                </div>
        								</div>
        							{{Form::close()}}
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="clearfix">


                         {{-------------DELETE MODAL CALLING------------}}
                            @include('admin.common.delete')
                        {{---------------DELETE MODAL CALLING END--------}}

{{------------------------------------NEW SALARY ADD MODALS--------------------------------}}


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
            dept();

        });
// Javascript function to update the company info and Bank Info
       function UpdateDetails(id,type){

           var  form_id = '';
           var alert_div = '';

            if(type=='bank')
            {
                form_id     = '#bank_details_form';
                alert_div   =  '#alert_bank'

            }else
            {
                form_id     = '#company_details_form';
                alert_div   =   '#alert_company';
            }
           $(alert_div).html('<div class="alert alert-info"><span class="fa fa-info"></span> Submitting..</div>');
					var url = "{{ route('admin.employees.update',':id') }}";
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
			$('#info').html('Are you sure ! You want to delete <strong>'+type+'</strong> Salary??.');
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

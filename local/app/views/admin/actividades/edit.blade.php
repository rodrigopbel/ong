@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style("assets/global/plugins/bootstrap-select/bootstrap-select.min.css")}}
    {{HTML::style("assets/global/plugins/select2/select2.css")}}
    {{HTML::style("assets/global/plugins/jquery-multi-select/css/multi-select.css")}}
    {{HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}
    {{HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}
    <!-- BEGIN THEME STYLES -->
@stop


@section('mainarea')

			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<i class="fa fa-edit"></i> Editar
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ route('admin.actividades.index') }}">Actividades </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""> Editar Actividad</a>
					</li>
				</ul>
			
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->

                    <div id="load">
                                   {{--INLCUDE ERROR MESSAGE BOX--}}
                                   @include('admin.common.error')
                                   {{--END ERROR MESSAGE BOX--}}
                      </div>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Editar Actividad
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body form">
						<!------------------------ BEGIN FORM---------------------->
						{{ Form::model($actividad, ['method' => 'PATCH', 'route' => ['admin.actividades.update', $actividad->id],'class'=>'form-horizontal form-bordered']) }}

                                    <div class="form-body">


                                        <div class="form-group">
                                            <label class="control-label col-md-3">Fecha de Actividad</label>
                                            <div class="col-md-3">
                                                <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                    <input type="text" class="form-control" name="fechaAct" readonly value="@if(empty($actividad->fechaAct))@else{{date('d-m-Y',strtotime($actividad->fechaAct))}}@endif" >
        												<span class="input-group-btn">
        												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
        												</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Descripcion: </label>
                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="descripcion"  value="{{ $actividad->descripcion }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Lugar: </label>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="lugar"  value="{{ $actividad->lugar }}">
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
                       <!------------------------- END FORM ----------------------->

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
                    {{HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}
                    {{HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
                    {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
                    {{HTML::script('assets/admin/pages/scripts/components-pickers.js')}}
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
@stop
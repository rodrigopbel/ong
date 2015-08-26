@extends('admin.adminlayouts.adminlayout')
@section('head')
	<!-- BEGIN PAGE LEVEL STYLES -->
	{{HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}
	{{HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}
	<!-- END PAGE LEVEL STYLES -->
@stop
@section('mainarea')
<!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
    <span class="fa fa-plus"></span>Nuevo Personal
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('admin.personal.index')}}">Personales</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Nuevo</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 form-group text-right">
            <span id="load_notification"></span>
                 <input  type="checkbox"  onchange="ToggleEmailNotification('employee_add');return false;" class="make-switch" name="employee_add" @if($setting->employee_add==1)checked	@endif data-on-color="success" data-on-text="Si"data-off-text="No" data-off-color="danger">
                <strong>Notificaciones de Email</strong><br>
        </div>
     </div>
    {{--INLCUDE ERROR MESSAGE BOX--}}
     @include('admin.common.error')
     {{--END ERROR MESSAGE BOX--}}
    <hr>
    <div class="clearfix">
    </div>
    {{Form::open(array('route'=>"admin.personal.store",'class'=>'form-horizontal','method'=>'POST','files' => true))}}
    <div class="row ">
        <div class="col-md-6 col-sm-6">
            <div class="portlet box purple-wisteria">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-calendar"></i>Datos Generales
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="form-group ">
                            <label class="control-label col-md-3">Foto</label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                            <span class="btn default btn-file">
                                            <span class="fileinput-new">
                                            Seleccionar Imagen </span>
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
                                        NOTA! </span> Tamano de Imagen (872px x 724px)
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nombres <span class="required">* </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nombres" placeholder="Nombres de la Persona" value="{{ Input::old('nombres') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Apellidos</label>
                                <div class="col-md-9">
                                     <input type="text" class="form-control" name="apellidos" placeholder="Apellidos de la Persona"value="{{ Input::old('apellidos') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Fecha de Nacimiento</label>
                                <div class="col-md-3">
                                    <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                        <input type="text" class="form-control" name="fechanac" readonly value="">
                                        <span class="input-group-btn">
                                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Genero</label>
                            <div class="col-md-9">
                                {{ Form::select('genero', array('hombre' => 'Hombre', 'mujer' => 'Mujer', 'otros' => 'Otros'), Input::old('genero'),array('class'=>'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tipo de Persona</label>
                            <div class="col-md-9">

                                    {{ Form::select('tipoPersonal', array('aportantes' => 'Aportantes', 'administrador' => 'Administrador', 'voluntario' => 'Voluntario'), Input::old('tipoPersonal'),array('class'=>'form-control')) }}

                            </div>
                        </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Telefono</label>
                                <div class="col-md-9">
                                     <input type="text" class="form-control" name="mobileNumber" placeholder="Telefono" value="">
                                </div>
                            </div>

                        <h4><strong>Cuenta de Beneficiario</strong></h4>
                            <div class="form-group">
                                    <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contrasena<span class="required">* </span></label>
                                    <div class="col-md-9">
                                        <input type="hidden" name="oldpassword">
                                        <input type="text" name="password" class="form-control" value="">
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
                        <i class="fa fa-calendar"></i> Datos Especiales
                    </div>

                </div>
                <div class="portlet-body">

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIT / CI</label>
                            <input type="text" class="form-control" name="montosolicitado" placeholder="Monto Solicitado" value="{{ Input::old('nitci') }}">
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ocupacion</label>
                            <div class="col-md-9">
                                {{ Form::select('ocupacion', array('ninguno' => 'Ninguno', 'estudiante' => 'Estudiante', 'uni' => 'Universitario/a','profesional' => 'Profesional'), Input::old('ocupacion'),array('class'=>'form-control')) }}
                            </div>
                        </div>
                    </div>
                    {{--<div class="form-body">--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-3 control-label">Ocupacion</label>--}}
                            {{--<div class="col-md-9">--}}
                                {{--{{ Form::select('ocupacion', array('ninguno' => 'Ninguno', 'papa' => 'Papa', 'mama' => 'Mama','tio' => 'Tio/a','hermano' => 'Hermano/a','otrofamiliar' =>'Otro Familiar'), Input::old('genero'),array('class'=>'form-control')) }}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>

            <div class="portlet box red-sunglo">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-calendar"></i>Zonificacion
                    </div>

                </div>
                <div class="portlet-body">

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Departamento</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="departamento" placeholder="Departamento" value="{{Input::old('departamento')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Provincia</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="provincia" placeholder="Provincia" value="{{Input::old('provincia')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Localidad</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="localidad" placeholder="Localidad" value="{{Input::old('localidad')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Canton</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="canton" placeholder="Canton" value="{{Input::old('canton')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Zona</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="zona" placeholder="Zona" value="{{Input::old('zona')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nota</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="otros" rows="3">{{Input::old('otros')}}</textarea>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <div class="clearfix">
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                            <i class="fa fa-plus"></i>	Guardar
                      </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</div>
</form

@stop



@section('footerjs')


<!-- BEGIN PAGE LEVEL PLUGINS -->
    {{HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}
    {{HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
    {{HTML::script('assets/admin/pages/scripts/components-pickers.js')}}
<!-- END PAGE LEVEL PLUGINS -->


@stop

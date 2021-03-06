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
        <span class="fa fa-plus"></span> Nuevo Beneficiario
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('admin.beneficiarios.index')}}">Beneficiarios</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Nuevo</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->

    @if(count($destinos)==0)
        <div class="note note-warning">
            {{Lang::get('messages.noDest')}}
        </div>
    @else
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 form-group text-right">

                <span id="load_notification"></span>
                <strong>Notificaciones</strong><br>
                <input type="checkbox" onchange="ToggleEmailNotification('ben_add');return false;"
                       class="make-switch" name="ben_add" @if($setting->ben_add==1)checked
                       @endif data-on-color="success" data-on-text="Si" data-off-text="No"
                       data-off-color="danger" required>
            </div>
        </div>

        {{--INLCUDE ERROR MESSAGE BOX--}}
        @include('admin.common.error')
        {{--END ERROR MESSAGE BOX--}}
        <hr>
        <div class="clearfix">
        </div>
        {{Form::open(array('route'=>"admin.beneficiarios.store",'class'=>'form-horizontal','method'=>'POST','files' => true))}}
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
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                 alt=""/>

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
        													<span class="btn default btn-file">
        													<span class="fileinput-new">
        													Seleccionar Imagen </span>
        													<span class="fileinput-exists">
        													Cambiar </span>
        													 <input type="file" name="foto">
        													</span>
                                            <a href="#" class="btn red fileinput-exists"
                                               data-dismiss="fileinput">
                                                Eliminar </a>
                                        </div>
                                    </div>
                                    <div class="clearfix margin-top-10">
                                                        <span class="label label-danger">
                                                        NOTA! </span> Tamano de Imagen (872px x
                                        724px)

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nombres <span
                                            class="required">* </span></label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nombres"
                                           placeholder="Nombres del Beneficiario"
                                           value="{{ Input::old('nombres') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Apellidos</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="apellidos"
                                           placeholder="Apellidos del Beneficiario"
                                           value="{{ Input::old('apellidos') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Fecha de Nacimiento</label>

                                <div class="col-md-3">
                                    <div class="input-group input-medium date date-picker"
                                         data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                        <input type="text" class="form-control" name="fechanac"
                                               readonly value="{{ Input::old('fechanac') }}">
        												<span class="input-group-btn">
        												<button class="btn default" type="button"><i
                                                                    class="fa fa-calendar"></i>
                                                        </button>
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
                                <label class="col-md-3 control-label">Telefono</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="telefono"
                                           placeholder="Telefono" value="{{Input::old('telefono')}}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Direccion Actual</label>

                                <div class="col-md-9">
                                    <textarea class="form-control" name="direccion"
                                              rows="3">{{Input::old('direccion')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Direccion Permanente</label>

                                <div class="col-md-9">
                                    <textarea class="form-control" name="direccionperm"
                                              rows="3">{{Input::old('direccionperm')}}</textarea>
                                </div>
                            </div>

                            {{--<h4><strong>Cuenta de Beneficiario</strong></h4>--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="col-md-3 control-label">Email<span class="required">* </span></label>--}}
                            {{--<div class="col-md-9">--}}
                            {{--<input type="text" name="email" class="form-control" value="{{ Input::old('email') }}">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="col-md-3 control-label">Contrasena<span class="required">* </span></label>--}}
                            {{--<div class="col-md-9">--}}
                            {{--<input type="hidden" name="oldpassword">--}}
                            {{--<input type="text" name="password" class="form-control" value="{{ Input::old('password') }}">--}}
                            {{--</div>--}}
                            {{--</div>--}}

                        </div>

                    </div>
                </div>
                <div class="portlet box purple-wisteria">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i>Documentos Personales
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-2">CN</label>

                                <div class="col-md-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large">
                                            <div class="form-control uneditable-input"
                                                 data-trigger="fileinput">
                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
															</span>
                                            </div>
														<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new">
														Seleccionar Archivo </span>
														<span class="fileinput-exists">
														Cambiar </span>
														<input type="file" name="certnac">
														</span>
                                            <a href="#"
                                               class="input-group-addon btn red fileinput-exists"
                                               data-dismiss="fileinput">
                                                Eliminar </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Croquis</label>

                                <div class="col-md-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large">
                                            <div class="form-control uneditable-input"
                                                 data-trigger="fileinput">
                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
															</span>
                                            </div>
														<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new">
														Seleccionar Archivo </span>
														<span class="fileinput-exists">
														Cambiar </span>
														<input type="file" name="croquis">
														</span>
                                            <a href="#"
                                               class="input-group-addon btn red fileinput-exists"
                                               data-dismiss="fileinput">
                                                Eliminar </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">CI</label>

                                <div class="col-md-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large">
                                            <div class="form-control uneditable-input"
                                                 data-trigger="fileinput">
                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
															</span>
                                            </div>
														<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new">
														Seleccionar Archivo</span>
														<span class="fileinput-exists">
														Cambiar </span>
														<input type="file" name="CIprueba">
														</span>
                                            <a href="#"
                                               class="input-group-addon btn red fileinput-exists"
                                               data-dismiss="fileinput">
                                                Eliminar </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div >
                    <div class="portlet box red-sunglo">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Detalles de el/los Responsable/s
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="alert_bank"></div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Cedula de Identidad</label>

                                    <div class="col-md-9">
                                        <input type="text" name="nitcit" class="form-control"
                                               value="{{Input::old('nitcit')}}">
                                        {{ Form::select('nitcit2', array('LP' => 'LP', 'Or' => 'Or', 'Po' => 'Po', 'Cbba' => 'Cbba', 'Chuq' => 'Chuq', 'Tj' => 'Tj', 'Pnd' => 'Pnd', 'Ben' => 'Ben', 'Scz' => 'Scz'), Input::old('nitcit2'),array('class'=>'form-control')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nombres</label>

                                    <div class="col-md-9">
                                        <input type="text" name="nombresReponsable" class="form-control"
                                               value="{{Input::old('nombresReponsable')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Apellido</label>

                                    <div class="col-md-9">
                                        <input type="text" name="apellidosResponsable"
                                               class="form-control"
                                               value="{{Input::old('apellidosResponsable')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ocupacion</label>

                                    <div class="col-md-9">
                                        <input type="text" name="ocupacionResponsable"
                                               class="form-control"
                                               value="{{Input::old('ocupacionResponsable')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Parentesco</label>

                                    <div class="col-md-9">
                                        {{ Form::select('parentesco', array('Ninguno'=>'Ninguno','Papa / Mama' => 'Papa / Mama', 'Tio / Tia' => 'Tio / Tia', 'Hermano / Hermana' => 'Hermano / Hermana','OtroFamiliar / OtroFamiliar' => 'OtroFamiliar / OtroFamiliar'), Input::old('parentesco'),array('class'=>'form-control')) }}
                                    </div>
                                </div>
                            </div>

                            {{-------------------Bank Account Form end-----------------------------------------}}


                        </div>
                    </div>


                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" data-loading-text="Submitting..."
                                        class="demo-loading-btn btn green">
                                    <i class="fa fa-plus"></i> Guardar
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="portlet box red-sunglo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i> Detalles de la Donacion
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Caso #<span
                                            class="required">* </span></label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="beneficiarioID"
                                           placeholder="Caso #"
                                           value="{{Input::old('beneficiarioID')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Destino</label>

                                <div class="col-md-9">
                                    {{ Form::select('destino', $destinos,null,['class' => 'form-control select2me','id'=>'destino','onchange'=>'objetivos();return false;']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Objetivo</label>

                                <div class="col-md-9">

                                    <select class="select2me form-control" name="objetivo"
                                            id="objetivo" required>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Fecha de Solicitud</label>

                                <div class="col-md-3">
                                    <div class="input-group input-medium date date-picker"
                                         data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                        <input type="text" class="form-control" name="fechaing"
                                               readonly value="{{Input::old('fechaing')}}">
        												<span class="input-group-btn">
        												<button class="btn default" type="button"><i
                                                                    class="fa fa-calendar"></i>
                                                        </button>
        												</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Monto Solicitado</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="montosolicitado"
                                           placeholder="Monto Solicitado"
                                           value="{{ Input::old('montosolicitado') }}">
                                </div>
                            </div>
                        </div>

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
                                    {{--<input type="text" class="form-control" name="departamento" placeholder="Departamento" value="{{Input::old('departamento')}}">--}}
                                    {{ Form::select('departamento', array('la_paz' => 'La Paz', 'oruro' => 'Oruro', 'potosi' => 'Potosi', 'cochabamba' => 'Cochabamba', 'chuquisaca' => 'Chuquisaca', 'tarija' => 'Tarija', 'pando' => 'Pando', 'beni' => 'Beni', 'santa_cruz' => 'Santa Cruz'), Input::old('departamento'),array('class'=>'form-control', 'name' => "departamento",'id'=>'departamento','onchange'=>'provincias();return false;')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Provincia</label>
                                <div class="col-md-9">
                                    <select class="select2me form-control" name="provincia" value="{{Input::old('provincia')}}"
                                            id="provincia" required>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Localidad</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="localidad"
                                           placeholder="Localidad"
                                           value="{{Input::old('localidad')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Canton</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="canton"
                                           placeholder="Canton" value="{{Input::old('canton')}}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Zona</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="zona"
                                           placeholder="Zona" value="{{Input::old('zona')}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Nota</label>

                                <div class="col-md-9">
                                    <textarea class="form-control" name="otros"
                                              rows="3">{{Input::old('otros')}}</textarea>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="portlet box purple-wisteria">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i>Otros Documentos
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-2">Perfil</label>

                                <div class="col-md-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large">
                                            <div class="form-control uneditable-input"
                                                 data-trigger="fileinput">
                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
															</span>
                                            </div>
														<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new">
														Seleccionar Archivo </span>
														<span class="fileinput-exists">
														Cambiar </span>
														<input type="file" name="perfil">
														</span>
                                            <a href="#"
                                               class="input-group-addon btn red fileinput-exists"
                                               data-dismiss="fileinput">
                                                Eliminar </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Diagnostico</label>

                                <div class="col-md-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large">
                                            <div class="form-control uneditable-input"
                                                 data-trigger="fileinput">
                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
															</span>
                                            </div>
														<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new">
														Seleccionar Archivo </span>
														<span class="fileinput-exists">
														Cambiar </span>
														<input type="file" name="solicitud">
														</span>
                                            <a href="#"
                                               class="input-group-addon btn red fileinput-exists"
                                               data-dismiss="fileinput">
                                                Eliminar </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet box red-sunglo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i>Detalles del Diagnostico
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="alert_bank"></div>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">ID Diagnostico (Numero de la
                                    Factura/recibo Para la identificacion)</label>

                                <div class="col-md-9">
                                    <input type="text" name="iddiag" class="form-control"
                                           value="{{Input::old('iddiag')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Diagnostico</label>

                                <div class="col-md-9">
                                    <input type="text" name="diagnostico" class="form-control"
                                           value="{{Input::old('diagnostico')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Fecha de Diagnostico</label>

                                <div class="col-md-3">
                                    <div class="input-group input-medium date date-picker"
                                         data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                        <input type="text" class="form-control" name="fechadiag"
                                               readonly value="{{Input::old('fechadiag')}}">
        												<span class="input-group-btn">
        												<button class="btn default" type="button"><i
                                                                    class="fa fa-calendar"></i>
                                                        </button>
        												</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tratamiento</label>

                                <div class="col-md-9">
                                    <input type="text" name="tratamiento" class="form-control"
                                           value="{{Input::old('tratamiento')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Razon</label>

                                <div class="col-md-9">
                                    <input type="text" name="razon" class="form-control"
                                           value="{{Input::old('razon')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Duracion</label>

                                <div class="col-md-9">
                                    <input type="text" name="duracion" class="form-control"
                                           value="{{Input::old('duracion')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Referencia</label>

                                <div class="col-md-9">
                                    <input type="text" name="referencia" class="form-control"
                                           value="{{Input::old('referencia')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Lugar</label>

                                <div class="col-md-9">
                                    <input type="text" name="lugar" class="form-control"
                                           value="{{Input::old('lugar')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
        </div>
        {{---------------Documents------------------}}
        <div class="row ">
            <div class="col-md-6 col-sm-6">

            </div>
            <div class="col-md-6 col-sm-6">

            </div>
            {{--<div class="col-md-6 col-sm-6">--}}
                {{--<div class="portlet box red-sunglo">--}}
                    {{--<div class="portlet-title">--}}
                        {{--<div class="caption">--}}
                            {{--<i class="fa fa-calendar"></i>Detalles de el/los Responsable/s--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="portlet-body">--}}
                        {{--<div id="alert_bank"></div>--}}
                        {{--<div class="form-body">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label">Cedula de Identidad</label>--}}

                                {{--<div class="col-md-9">--}}
                                    {{--<input type="text" name="nitcit" class="form-control"--}}
                                           {{--value="{{Input::old('nitcit')}}">--}}
                                    {{--{{ Form::select('nitcit2', array('LP' => 'LP', 'Or' => 'Or', 'Po' => 'Po', 'Cbba' => 'Cbba', 'Chuq' => 'Chuq', 'Tj' => 'Tj', 'Pnd' => 'Pnd', 'Ben' => 'Ben', 'Scz' => 'Scz'), Input::old('nitcit2'),array('class'=>'form-control')) }}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label">Nombres</label>--}}

                                {{--<div class="col-md-9">--}}
                                    {{--<input type="text" name="nombresReponsable" class="form-control"--}}
                                           {{--value="{{Input::old('nombresReponsable')}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label">Apellido</label>--}}

                                {{--<div class="col-md-9">--}}
                                    {{--<input type="text" name="apellidosResponsable"--}}
                                           {{--class="form-control"--}}
                                           {{--value="{{Input::old('apellidosResponsable')}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label">Ocupacion</label>--}}

                                {{--<div class="col-md-9">--}}
                                    {{--<input type="text" name="ocupacionResponsable"--}}
                                           {{--class="form-control"--}}
                                           {{--value="{{Input::old('ocupacionResponsable')}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label">Parentesco</label>--}}

                                {{--<div class="col-md-9">--}}
                                    {{--{{ Form::select('parentesco', array('Ninguno'=>'Ninguno','Papa / Mama' => 'Papa / Mama', 'Tio / Tia' => 'Tio / Tia', 'Hermano / Hermana' => 'Hermano / Hermana','OtroFamiliar / OtroFamiliar' => 'OtroFamiliar / OtroFamiliar'), Input::old('parentesco'),array('class'=>'form-control')) }}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{-------------------Bank Account Form end-----------------------------------------}}


                    {{--</div>--}}
                {{--</div>--}}


            {{--</div>--}}
            <div class="clearfix">
            </div>


        </div>
        </form>
    @endif
    <hr>

@stop



@section('footerjs')


    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}
    {{HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
    {{HTML::script('assets/admin/pages/scripts/components-pickers.js')}}
    <!-- END PAGE LEVEL PLUGINS -->




    <script>
        jQuery(document).ready(function () {

            ComponentsPickers.init();
            objetivos();


        });
        function objetivos() {
            $.getJSON("{{ URL::to('admin/destinos/ajax_objetivos/')}}",
                    {destID: $('#destino').val()},
                    function (data) {
                        var model = $('#objetivo');
                        model.empty();
                        $.each(data, function (index, element) {
                            model.append("<option value='" + element.id + "'>" + element.objetivo + "</option>");
                        });

                    });

        }

        function provincias() {
            var provOruro = [
                {
                    id : "prov1",
                    provincia : "provincia de oruro"
                },
                {
                    id : "prov2",
                    provincia : "provincia de oruro2"
                },
                {
                    id : "prov3",
                    provincia : "provincia de oruro3"
                }
            ];
            /*                "prov" => "Abel Iturralde",
             "prov" => "Franz Tamayo",
             "prov" => "Pacajes",
             "prov" => "Larecaja",
             "prov" => "Inquisivi",
             "prov" => "Sud Yungas",
             "prov" => "Ingavi",
             "prov" => "Muñecas",
             "prov" => "Pedro Domingo Murillo",
             "prov" => "Aroma",
             "prov" => "Caranavi",
             "prov" => "Jose ramon Loayza",
             "prov" => "Bautista Saavedra",
             "prov" => "Eliodoro Camacho",
             "prov" => "Omasuyos",
             "prov" => "General Jose Manuel Pando",
             "prov" => "Gualberto Villarroel",
             "prov" => "Nor Yungas",
             "prov" => "Los Andes",
             "prov" => "Manco Kapac"
            * */
            var provLaPaz = [
                {
                    id : "Abel Iturralde",
                    provincia : "Abel Iturralde"
                },
                {
                    id : "Franz Tamayo",
                    provincia : "Franz Tamayo"
                },
                {
                    id : "Pacajes",
                    provincia : "Pacajes"
                }
            ];
            console.log("entro aca");
            switch($('#departamento').val()){
                case 'oruro':
                    var model = $('#provincia');
                    model.empty();
                    $.each(provOruro, function (index, element) {
                        model.append("<option value='" + element.id + "'>" + element.provincia + "</option>");
                    });
                    break;
                case 'la_paz':
                    var model = $('#provincia');
                    model.empty();
                    $.each(provLaPaz, function (index, element) {
                        model.append("<option value='" + element.id + "'>" + element.provincia + "</option>");
                    });
                    break;
            }


            {{--$.getJSON("{{URL::to('admin/beneficiarios/ajax_provincias')}}",--}}
                    {{--{deptID: $('#departamento').val()},--}}
                    {{--function (data) {--}}
                        {{--console.log("datos de llegada", data);--}}
                        {{--var model = $('#provincia');--}}
                        {{--model.empty();--}}
                        {{--$.each(data, function (index, element) {--}}
                            {{--model.append("<option value='" + element.id + "'>" + element.objetivo + "</option>");--}}
                        {{--});--}}
                    {{--});--}}
        }

    </script>
@stop

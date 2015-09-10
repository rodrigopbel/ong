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
        Detalles del Beneficiario
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
                <a href="">Editar </a>

            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
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
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombres<span class="required">* </span></label>

                            <div class="col-md-9">
                                <label class="col-md-3 control-label">{{$beneficiario[0]->nombres}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Apellidos</label>

                            <div class="col-md-9">
                                <input type="text" name="apellidos" class="form-control"
                                       value="{{$beneficiario[0]->apellidos}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fecha de Nacimiento</label>

                            <div class="col-md-3">
                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy"
                                     data-date-viewmode="years">
                                    <input type="text" class="form-control" name="date_of_birth" readonly
                                           value="@if(empty($beneficiario[0]->fechanac))@else{{date('d-m-Y',strtotime($beneficiario[0]->fechanac))}}@endif">
        												<span class="input-group-btn">
        												<button class="btn default" type="button"><i
                                                                    class="fa fa-calendar"></i></button>
        												</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Genero</label>

                            <div class="col-md-9">
                                <select class="form-control" name="genero">

                                    <option value="hombre" @if($beneficiario[0]->genero=='hombre') selected @endif>Varon
                                    </option>
                                    <option value="mujer"  @if($beneficiario[0]->genero=='mujer') selected @endif>Mujer
                                    </option>
                                    <option value="otros"  @if($beneficiario[0]->genero=='otros') selected @endif>Otros
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Telefono</label>

                            <div class="col-md-9">
                                <input type="text" name="telefono" class="form-control"
                                       value="{{$beneficiario[0]->telefono}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Direccion Actual</label>

                            <div class="col-md-9">
                                <textarea name="direccion" class="form-control"
                                          rows="3">{{$beneficiario[0]->direccion}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Direccion Permanente</label>

                            <div class="col-md-9">
                                <textarea name="direccionperm" class="form-control"
                                          rows="3">{{$beneficiario[0]->direccionperm}}</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Email<span class="required">* </span></label>

                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control" value="{{$beneficiario[0]->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password</label>

                            <div class="col-md-9">
                                <input type="hidden" name="oldpassword" value="{{$beneficiario[0]->password}}">
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                    </div>

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
@stop

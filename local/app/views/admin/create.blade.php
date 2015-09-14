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
        <span class="fa fa-plus"></span>Nuevo Administrador
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
            <strong>Notificaciones</strong><br>
            {{--<input  type="checkbox"  onchange="ToggleEmailNotification('ben_add');return false;" class="make-switch" name="ben_add" @if($setting->ben_add==1)checked	@endif data-on-color="success" data-on-text="Si"data-off-text="No" data-off-color="danger">--}}
        </div>
    </div>
    {{--INLCUDE ERROR MESSAGE BOX--}}
    @include('admin.common.error')
    {{--END ERROR MESSAGE BOX--}}
    <hr>
    <div class="clearfix">
    </div>
    {{Form::open(array('route'=>"admin.dashboard.store",'class'=>'form-horizontal','method'=>'POST','files' => true))}}
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
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombres <span class="required">* </span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nombreAdmin" placeholder="Nombres de la Persona" value="{{ Input::old('nombres') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Apellidos</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="apellidoAdmin" placeholder="Apellidos de la Persona"value="{{ Input::old('apellidos') }}">
                            </div>
                        </div>
                        <h4><strong>Cuenta de Beneficiario</strong></h4>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                            <div class="col-md-9">
                                <input type="text" name="emailAdmin" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Contrasena<span class="required">* </span></label>
                            <div class="col-md-9">
                                <input type="hidden" name="oldpassword">
                                <input type="password" name="passwordAdmin" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" data-loading-text="Guardando..." class="demo-loading-btn btn green">
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
    {{Form::close()}}

@stop



@section('footerjs')


    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}
    {{HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
    {{HTML::script('assets/admin/pages/scripts/components-pickers.js')}}
    <!-- END PAGE LEVEL PLUGINS -->


@stop

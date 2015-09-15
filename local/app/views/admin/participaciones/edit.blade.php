@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style("assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css")}}
    {{HTML::style("assets/global/plugins/bootstrap-datepicker/css/datepicker3.css")}}
    <!-- BEGIN THEME STYLES -->
@stop
@section('mainarea')
    {{--{{dd("hola  atodos")}};--}}

    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Participantes en Actividad
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('admin.dashboard.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('admin.participaciones.index') }}">Participaciones</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            {{--INLCUDE ERROR MESSAGE BOX--}}
            @include('admin.common.error')
            {{--END ERROR MESSAGE BOX--}}

            <div class="row">


                <hr>
                <div class="portlet box blue">

                    <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                        {{Form::open(array('route'=>"admin.participaciones.store",'class'=>'form-horizontal'))}}


                        <div class="form-body">
                            {{$actividad->id }} - {{$actividad->created_at}} - {{$actividad->descripcion}}
                            <div class="form-group">

                                <label class="col-md-1 control-group">Voluntario ID</label>
                                <label class="col-md-2 control-group">Nombre</label>
                                <label class="col-md-2 control-group">Estado </label>

                            </div>

                            @foreach($voluntarios as $vol)
                                <div class="form-group">
                                    <label class="col-md-1 control-group">{{$vol->personalID}} </label>
                                    <label class="col-md-2 control-group">{{$vol->nombres}} {{$vol->apellidos}} </label>

                                    <div class="col-md-2">
                                        <input type="checkbox" id="checkbox{{$vol->personalID}}"
                                               onchange="showHide('{{$vol->personalID}}');return false;"
                                               class="make-switch" name="checkbox[{{$vol->personalID}}]"
                                               checked data-on-color="success" data-on-text="P" data-off-text="A"
                                               data-off-color="danger">
                                        <input type="hidden" name="participantes[]" value="{{$vol->personalID}}">
                                    </div>


                                </div>
                            @endforeach

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" data-loading-text="Submitting..."
                                                class="demo-loading-btn btn green"><i class="fa fa-edit"></i> Guardar
                                            Participantes
                                        </button>

                                    </div>
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
            <!-- END PAGE CONTENT-->



            @stop

            @section('footerjs')

                <!-- BEGIN PAGE LEVEL PLUGINS -->
                {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
                {{HTML::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js")}}
                {{HTML::script("assets/admin/pages/scripts/components-pickers.js")}}

                <!-- END PAGE LEVEL PLUGINS -->
@stop
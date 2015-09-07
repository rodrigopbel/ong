<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Voluntario | Registro </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <!-- BEGIN  STYLES -->
    {{ HTML::style("assets/global/plugins/font-awesome/css/font-awesome.min.css") }}
    {{ HTML::style("assets/global/plugins/bootstrap/css/bootstrap.min.css") }}
    {{ HTML::style("assets/admin/pages/css/login-soft.css") }}
    {{ HTML::style("assets/global/css/components.css") }}
    {{ HTML::style("assets/admin/layout/css/layout.css") }}
    {{ HTML::style("assets/admin/layout/css/themes/darkblue.css") }}
    <!-- END STYLES -->


</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="javacript:;">
        {{HTML::image("assets/admin/layout/img/logo-big.png",'Logo',array('class'=>'logo-default','height'=>'30px','width'=>'117px'))}}
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    {{ Form::open(array('url' => '','class' =>'login-form')) }}

    <h3 class="form-title">Nuevo Voluntario</h3>
    <div id="alert">

    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Nombres</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombres" name="nombres"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Apellidos</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Apellidos" name="apellidos"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Cedula de Identidad</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Cedula de Identidad" name="ci"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Telefono</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Telefono" name="telefono"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email"/>
        </div>
    </div>
    <div class="form-actions">

        <button type="submit" class="btn blue pull-right" id="submitbutton" onclick="login();return false;">
            Registrarse <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>

    {{Form::close()}}
    <!-- END LOGIN FORM -->


</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    {{date('Y')}} &copy; Fundacion UniFranz
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{{HTML::script('assets/global/plugins/respond.min.js')}}
{{HTML::script('assets/global/plugins/excanvas.min.js')}}
<![endif]-->
{{ HTML::script("assets/global/plugins/jquery.min.js")}}
{{ HTML::script("assets/global/plugins/bootstrap/js/bootstrap.min.js") }}
{{ HTML::script("assets/global/plugins/backstretch/jquery.backstretch.min.js") }}
{{ HTML::script("assets/global/scripts/metronic.js") }}
{{ HTML::script("assets/admin/layout/scripts/demo.js") }}

<!-- END PAGE LEVEL SCRIPTS -->

<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components

        // init background slide images
        $.backstretch([
                    "{{ URL::asset('assets/admin/pages/media/bg/1.jpg') }}",
                    "{{ URL::asset('assets/admin/pages/media/bg/2.jpg') }}",
                    "{{ URL::asset('assets/admin/pages/media/bg/3.jpg') }}",
                    "{{ URL::asset('assets/admin/pages/media/bg/4.jpg') }}"
                ], {
                    fade: 1000,
                    duration: 8000
                }
        );
    });
</script>


<script>
    function login(){

        $('#alert').html('<div class="alert alert-info">Verificando..</div>');
        $("#submitbutton").prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "  {{ URL::to('/voluntarios/register') }} ",
            dataType: 'json',
            data: $('.login-form').serialize()
        }).done( function( response ) {

            if(response.status == "success"){
                $('#alert').html('<div class="alert alert-success"><span class="fa fa-success"></span>'+response.msg+'</div>');
                window.location.href= "{{ URL::to('/admin/dashboard/') }}";

            }else if(response.status == "error"){
                $("#submitbutton").prop('disabled', false);
                $('#alert').html('<div class="alert alert-danger"><span class="fa fa-warning"></span> '+response.msg+'</div>');
            }
        });
    }

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
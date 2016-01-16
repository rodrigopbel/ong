<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>{{$setting->website}} - {{$pageTitle}} </title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- CSS Global Compulsory -->
        {{ HTML::style('front_assets/plugins/bootstrap/css/bootstrap.min.css') }}
        {{ HTML::style('front_assets/css/style.css')}}
        <!-- CSS Implementing Plugins -->

        {{ HTML::style('front_assets/plugins/font-awesome/css/font-awesome.min.css') }}
        {{ HTML::style('front_assets/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css') }}

        {{ HTML::style('front_assets/plugins/scrollbar/src/perfect-scrollbar.css') }}
        {{ HTML::style('front_assets/plugins/fullcalendar/fullcalendar.css') }}
        {{ HTML::style('front_assets/plugins/fullcalendar/fullcalendar.print.css',array('media' => 'print')) }}


        <!-- CSS Page Style -->
        {{ HTML::style('front_assets/css/pages/profile.css') }}



        <!-- CSS Theme -->
        {{ HTML::style('front_assets/css/theme-colors/default.css') }}

        <!-- CSS Customization -->
        {{ HTML::style('front_assets/css/custom.css') }}
        @yield('head')

</head>

<body>
<div class="wrapper">
    <!--=== Header ===-->
    <div class="header">
        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::to('dashboard')}}">
                    {{HTML::image("assets/admin/layout/img/{$setting->logo}",'Logo',array('class'=>'logo-default','id'=>'logo-header','height'=>'22px','width'=>'86px'))}}


                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">

                        <!-- Home -->
                        <li class="{{$homeActive or ''}}">
                            <a href="{{ URL::to('dashboard')}}">
                                Inicio
                            </a>
                        </li>
                        <!-- End Home -->

						<!-- Leave -->
                        {{--<li class="dropdown {{$leaveActive or ''}}">--}}
                            {{--<a href="" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"  >--}}
                                {{--Leave--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="" data-toggle="modal" data-target=".apply_modal">Apply Leave</a></li>--}}
                                {{--<li><a href="{{route('front.leave')}}">My Leave</a></li>--}}
                              {{----}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        <!-- End Leave -->
						<!-- My Account -->
                        <li class="dropdown">
                            <a href="" href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                               Mi Cuenta
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="" data-toggle="modal" data-target=".change_password_modal" id="change_password_link">Cambiar Contraseña</a></li>
                                <!-- Logout -->
                                @if(Auth::personales()->check())
                                <li>
                                    <a href="{{route('front.logout')}}">
                                        Salir
                                    </a>

                                </li>
                                @endif
                                <!-- End Logout -->

                            </ul>
                        </li>
                        <!-- End Leave -->

                    </ul>
                </div><!--/navbar-collapse-->
            </div>
        </div>
        <!-- End Navbar -->
    </div>
    <!--=== End Header ===-->

    <!--=== Profile ===-->
    <div class="profile container content">
            	<div class="row">
                        <!--Left Sidebar-->
                        <div class="col-md-3 md-margin-bottom-40">
                          {{HTML::image("/personalImages/{$personal->fotoPersonal}",'foto',['class'=>"img-responsive profile-img margin-bottom-20",'style'=>'border:1px solid #ddd;margin:0 auto'])}}
                            {{--<img class="img-responsive profile-img margin-bottom-20" src="front_assets/img/team/5.jpg" alt="">--}}
            				<p>
            				<h3 style="text-align: center">{{ $personal->nombres . " ". $personal->apellidos }}</h3>
            				{{--<h6 style="text-align: center">{{$personal->getObjetivo->destinos->destino}}</h6>--}}
            				{{--<h6 style="text-align: center;background: rgb(235, 235, 235);padding: 10px;"><strong>En Solicitud hace : </strong>{{$personal->duracionVinculacion($personal->personalID)}}</h6>--}}
            				</p>
                            <hr>
            				<div class="service-block-v3 service-block-u">
            						<!-- STAT -->
            							<div class="row profile-stat">
            								<div class="col-md-6 col-sm-6 col-xs-6" data-toggle="tooltip" data-placement="bottom" >
                                                <div class="uppercase profile-stat-title">
                                                    {{count($personal->getayudas)}}
                                                </div>
                                                <div class="uppercase profile-stat-text">
                                                    Ayudas
                                                </div>

            								</div>
            								<div class="col-md-6 col-sm-6 col-xs-6" data-toggle="tooltip" data-placement="bottom" >
                                                <div class="uppercase profile-stat-title">
                                                    {{count($personal->getdonaciones)}}
                                                </div>
                                                <div class="uppercase profile-stat-text">
                                                    Donaciones
                                                </div>
                                            </div>
            								{{--<div class="col-md-4 col-sm-4 col-xs-6" data-toggle="tooltip" data-placement="bottom" >--}}
                                                {{--<div class="uppercase profile-stat-title">--}}
                                                    {{--{{$attendance_count}}--}}
                                                {{--</div>--}}
                                                {{--<div class="uppercase profile-stat-text">--}}
                                                    {{--Solicitudes--}}
                                                {{--</div>--}}
            								{{--</div>--}}
            							</div>
            							<!-- END STAT -->
                            </div>


                            <!--Notification-->
                     {{--@if(count($current_month_birthdays)>0)--}}
                            {{--<div class="panel-heading-v2 overflow-h">--}}
                                {{--<h2 class="heading-xs pull-left"><i class="fa fa-birthday-cake"></i> Birthdays</h2>--}}
                            {{--</div>--}}
                            {{--<ul id="scrollbar5" class="list-unstyled contentHolder margin-bottom-20" style="height: auto">--}}
                            {{--@foreach($current_month_birthdays as $birthday)--}}
                                {{--<li class="notification">--}}
                                 {{--{{HTML::image("/profileImages/{$birthday->profileImage}",'ProfileImage',['class'=>"rounded-x"])}}--}}

                                    {{--<div class="overflow-h">--}}
                                        {{--<span><strong>{{$birthday->fullName}}</strong> has birthday on</span>--}}
                                        {{--<strong>{{date('d F',strtotime($birthday->date_of_birth))}}</strong>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                             {{--@endforeach--}}

                            {{--</ul>--}}
                      {{--@endif--}}
                            <!--End Notification-->


                            <div class="margin-bottom-50"></div>
                        </div>
                        <!--End Left Sidebar-->

                        {{--------------------Main Area----------------}}
                               @yield('mainarea')
                        {{---------------Main Area End here------------}}


                    </div><!--/end row-->


    </div>
    <!--=== End Profile ===-->

    <!--=== Footer Version 1 ===-->
    <div class="footer-v1">

        <div class="copyright">
            <div class="container">
                <div class="row">
				<div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p style="text-align: center;">
                            {{date('Y')}} &copy; {{$setting->website}}

                        </p>
                    </div>

                    <!-- Social Links -->
                    <div class="col-md-4">

                    </div>
                    <!-- End Social Links -->
                </div>
            </div>
        </div><!--/copyright-->
    </div>
    <!--=== End Footer Version 1 ===-->


{{--------------------------Apply Leave  MODALS-----------------------------}}


{{------------------------Apply Leave MODALS-------------------------}}


{{--------------------------Change Password  MODALS-----------------------------}}

            <div class="modal fade change_password_modal in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                             <h4  class="modal-title">
                                 Cambiar Contraseña
                                 </h4>
                        </div>
                        <div class="modal-body" id="change_password_modal_body">
							{{--Load with Ajax call--}}

                        </div>
                    </div>
                </div>
            </div>
{{------------------------Change Password  MODALS-------------------------}}



</div><!--/wrapper-->


<!-- JS Global Compulsory -->
{{HTML::script('front_assets/plugins/jquery/jquery.min.js')}}
{{HTML::script('front_assets/plugins/jquery/jquery-migrate.min.js')}}
{{HTML::script('front_assets/plugins/bootstrap/js/bootstrap.min.js')}}

<!-- JS Implementing Plugins -->
{{HTML::script('front_assets/plugins/back-to-top.js')}}

<!-- Scrollbar -->
{{HTML::script('front_assets/plugins/scrollbar/src/jquery.mousewheel.js')}}
{{HTML::script('front_assets/plugins/scrollbar/src/perfect-scrollbar.js')}}
<!-- JS Customization -->
{{HTML::script('front_assets//plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js')}}
{{HTML::script('front_assets/plugins/sky-forms/version-2.0.1/js/jquery.form.min.js')}}
<!-- JS Page Level -->
{{HTML::script('front_assets/plugins/lib/moment.min.js')}}
{{HTML::script('front_assets/plugins/fullcalendar/fullcalendar.min.js')}}

<script>
    jQuery(document).ready(function ($) {
        "use strict";
        $('.contentHolder').perfectScrollbar();



    });
</script>
@yield('footerjs')

<script>
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<!--[if lt IE 9]>
    {{HTML::script('front_assets/plugins/respond.js')}}
    {{HTML::script('front_assets/plugins/html5shiv.js')}}
<![endif]-->
<script>
// Show change password modal body
		$('#change_password_link').click(function(){

			$('#change_password_modal_body').css("padding", "100px");
			$('#change_password_modal_body').html('{{HTML::image('front_assets/img/loading-spinner-blue.gif')}}');
			$('#change_password_modal_body').attr('class','text-center');

			$.ajax({
            			    type: 'POST',
            			    url: "{{route('front.change_password_modal')}}",

            			    data: {

            			    },
            			    success: function(response) {

            			    	$('#change_password_modal_body').css("padding", "0px");
            			    	$('#change_password_modal_body').removeClass('text-center');
            			    	$('#change_password_modal_body').html(response);
            			    },

            			    error: function(xhr, textStatus, thrownError) {
								$('#change_password_modal_body').html('<div class="alert alert-danger">Error Fetching data</div>');
            			    }
            			});

			});


		 function change_password()
		 {
			$("#submitbutton").prop('disabled', true);

			$('#error').html('{{HTML::image('front_assets/img/loading-spinner-blue.gif')}}');
			$('#error').attr('class','text-center');
			$.ajax({
				type:'POST',
				url:'{{route('front.change_password')}}',
				dataType: 'json',
				data: $('#change_password_form').serialize()
			}).done(function(response)
			{
				if(response.status=='success')
				{
					$('.field').hide();
					$('#error').html('<div class="alert alert-success"><span class="fa fa-check"></span> '+response.msg+'</div>');
					setTimeout(function () {
                              $('.change_password_modal').modal('hide');
                            }, 2000);

				}else if(response.status == "error")
							 {

								 var arr = response.msg;
								 var alert='';
								$('#error').attr('class','');
								 $("#submitbutton").prop('disabled', false);

								 $.each(arr, function(index, value)
								 {
									 if (value.length != 0)
									 {
										 alert += '<p><span class="fa fa-warning"></span> '+ value+ '</p>';

									 }
								 });

								 $('#error').html('<div class="alert alert-danger alert-dismissable">'+alert+'</div>');

							 }

			});


		 }
</script>
</body>
</html>	
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
     <title>500</title>


    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    {{HTML::style('front_assets/plugins/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('front_assets/css/style.css')}}
    {{HTML::style('front_assets/plugins/line-icons/line-icons.css')}}
    {{HTML::style('front_assets/plugins/font-awesome/css/font-awesome.min.css')}}
    {{HTML::style('front_assets/css/pages/page_error3_404.css')}}
    {{HTML::style('front_assets/css/theme-colors/default.css')}}
    {{HTML::style('front_assets/css/custom.css')}}


</head> 

<body>

    <!--=== Error V3 ===-->
    <div class="container content">     
        <!-- Error Block -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="error-v3">
                    <h2>500</h2>
                    <p>Lo sentimos, la página que estás buscando no se pudo encontrar!</p>
                </div>
            </div>
        </div>
        <!-- End Error Block -->

        <!-- Begin Service Block V2 -->
        <div class="row service-block-v2">
            

            <div class="col-md-12">
                <div class="service-block-in service-or">
                    <div class="service-bg"></div>
                    <i class="icon-directions"></i>
                    <h4>Posible causa del problema</h4>
                    <p>La página solicitada no se pudo encontrar. Sin embargo, el recurso solicitado puede estar disponible de nuevo en el futuro.</p>
                    <a class="btn-u btn-brd btn-u-light" href="{{ route('dashboard.index') }}">Volver a la página principal</a>
                </div>
            </div>  
            
            
        </div>    
        <!-- End Service Block V2 -->
    </div>  
    <!--=== End Error-V3 ===-->

    <!--=== Sticky Footer ===-->
    <div class="container sticky-footer">
        <p class="copyright-space">
            {{date('Y')}} &copy; {{$setting->website}}
        </p>  
    </div>
    <!--=== End Sticky-Footer ===-->

<!-- JS Global Compulsory -->
   {{HTML::script('front_assets/plugins/jquery/jquery.min.js')}}
   {{HTML::script('front_assets/plugins/jquery/jquery-migrate.min.js')}}
   {{HTML::script('front_assets/plugins/bootstrap/js/bootstrap.min.js')}}
   {{HTML::script('front_assets/plugins/back-to-top.js')}}
   {{HTML::script('front_assets/plugins/back-to-top.js')}}
   {{HTML::script('front_assets/plugins/backstretch/jquery.backstretch.min.js')}}



<script type="text/javascript">
    $.backstretch([
    '{{URL::asset("front_assets/img/blur/img1.jpg")}}'

      ])
</script>
<!-- JS Customization -->
 {{HTML::script('front_assets/js/custom.js')}}
 {{HTML::script('front_assets/js/app.js')}}

<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();      
    });
</script>
<!--[if lt IE 9]>
    <script src="front_assets/plugins/respond.js"></script>
    <script src="front_assets/plugins/html5shiv.js"></script>
    <script src="front_assets/js/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html> 
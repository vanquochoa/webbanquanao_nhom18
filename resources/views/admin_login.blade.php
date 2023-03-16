<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    {{-- css admin --}}
    <link href="{{ asset('backend/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('backend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/jqvmap.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/minimal.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/monthly.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    {{-- js admin --}}
    <link href="{{ asset('backend/js/bootstrap.js') }}" rel="stylesheet">
    <link href="{{ asset('backend/js/app.js') }}" rel="stylesheet">

    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng nhập Admin</h2>
            <form action="{{ URL::to('/admin-dashboard') }}" method="POST">
                @if ($errors->loginErrors->first())
                    <div class="error_message panel panel-danger">                       
                        @foreach ($errors->loginErrors->all() as $error)
                            <div class="panel-body item_message text-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                {{ csrf_field() }}
                <input type="email" class="ggg" name="admin_email" placeholder="E-MAIL" required="">
                <input type="password" class="ggg" name="admin_password" placeholder="PASSWORD" required="">
                
                <div class="clearfix"></div>
                <input type="submit" value="Đăng nhập" name="login">
            </form>
            
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="js/jquery.scrollTo.js"></script>
</body>

</html>

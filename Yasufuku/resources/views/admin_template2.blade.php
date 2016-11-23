<!DOCTYPE html>
<html>
<head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <title>Production Machine Reporting System</title>
       <!-- Tell the browser to be responsive to screen width -->
       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       <!-- Bootstrap 3.3.5 -->
       <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.0/bootstrap/css/bootstrap.min.css') }}">
       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
       <!-- Ionicons -->
       <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
       <!-- Theme style -->
       <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.0/dist/css/AdminLTE.min.css') }}">
       <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.0/dist/css/skins/_all-skins.min.css') }}">
       <!-- iCheck -->
       <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.0/plugins/iCheck/flat/blue.css') }}">
       <!-- Morris chart -->
       <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.0/plugins/morris/morris.css') }}">
       <!-- jvectormap -->
       <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
       <!-- Date Picker -->
       <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.0/plugins/datepicker/datepicker3.css') }}">
       <!-- Daterange picker -->
       <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.0/plugins/daterangepicker/daterangepicker-bs3.css') }}">
       <!-- bootstrap wysihtml5 - text editor -->
       <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.0/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

       <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
       <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
       <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
       <![endif]-->
</head>
<body class="skin-blue layout-top-nav">
       <div class="wrapper">
              @php
              //preparation
              $prod_plans = false;
              $prod_actual = false;
              $prod_cycle = false;
              $path = explode("/", Request::path());
              $title = 'Dashboard';
              if ($path[0]=='prod_plans') {
                     $prod_plans = true;
                     $title = 'Production Plans';
              } else if ($path[0]=='prod_actual') {
                     $prod_actual = true;
                     $title = 'Production Actual';
              }else if ($path[0]=='prod_cycle') {
                     $prod_cycle = true;
                     $title = 'Production Cycle';
              }
              @endphp
              <header class="main-header">
                     <!-- Logo -->
                     {{-- <a href="/" class="logo">
                     <!-- mini logo for sidebar mini 50x50 pixels -->
                     <span class="logo-mini">PMRS</span>
                     <!-- logo for regular state and mobile devices -->
                     <span class="logo-lg"><b>Yasufuku</b> PMRS</span>
              </a> --}}
              <!-- Header Navbar: style can be found in header.less -->
              <nav class="navbar navbar-static-top">
                     <!-- Sidebar toggle button-->
                     {{-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                     <span class="sr-only">Toggle navigation</span>
              </a> --}}
              <div class="container">
                     <div class="navbar-header">
                            <a href="/" class="navbar-brand">
                                   <!-- mini logo for sidebar mini 50x50 pixels -->
                                   <span class="logo-mini">PMRS</span>
                                   <!-- logo for regular state and mobile devices -->
                                   <span class="logo-lg"><b>Yasufuku</b> PMRS</span>
                            </a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                   <i class="fa fa-bars"></i>
                            </button>
                     </div>
                     <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                   <li class="{{ $prod_plans ? 'active' : '' }}"><a href="/prod_plans"><i class="fa fa-circle{{ $prod_plans ? '' : '-o' }}"></i> Production Plans</a></li>
                                   <li class="{{ $prod_actual ? 'active' : '' }}"><a href="/prod_actual"><i class="fa fa-circle{{ $prod_actual ? '' : '-o' }}"></i> Production Actual</a></li>
                                   <li class="{{ $prod_cycle ? 'active' : '' }}"><a href="/prod_cycle"><i class="fa fa-circle{{ $prod_cycle ? '' : '-o' }}"></i> Production Cycle</a></li>
                            </ul>
                     </div>
                     <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                   <li class="dropdown user user-menu">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                 <img src="{{ asset('AdminLTE-2.3.0/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                                                 <span class="hidden-xs">Alexander Pierce</span>
                                          </a>
                                          <ul class="dropdown-menu">
                                                 <!-- User image -->
                                                 <li class="user-header">
                                                        <img src="{{ asset('AdminLTE-2.3.0/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                                        <p>
                                                               Administrator - PPIC Controller
                                                               <small>Login Since : 14:00 AM</small>
                                                        </p>
                                                 </li>
                                                 <!-- Menu Footer-->
                                                 <li class="user-footer">
                                                        <div class="pull-left">
                                                               <a href="#" class="btn btn-default btn-flat">Profile</a>
                                                        </div>
                                                        <div class="pull-right">
                                                               <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                                        </div>
                                                 </li>
                                          </ul>
                                   </li>
                            </ul>
                     </div>
              </div>
       </nav>
</header>

{{-- <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
<li class="header">MAIN NAVIGATION</li>
<li class="{{ $prod_plans ? 'active' : '' }}"><a href="/prod_plans"><i class="fa fa-circle{{ $prod_plans ? '' : '-o' }}"></i> Production Plans</a></li>
<li class="{{ $prod_actual ? 'active' : '' }}"><a href="/prod_actual"><i class="fa fa-circle{{ $prod_actual ? '' : '-o' }}"></i> Production Actual</a></li>
<li class="{{ $prod_cycle ? 'active' : '' }}"><a href="/prod_cycle"><i class="fa fa-circle{{ $prod_cycle ? '' : '-o' }}"></i> Production Cycle</a></li>
</ul>
</section>
<!-- /.sidebar -->
</aside> --}}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 864px;">
       <div class="container">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                     <h1>
                            {{$title}}
                            {{-- <small>Control panel</small> --}}
                     </h1>
                     <ol class="breadcrumb">
                            <li><a href="/"><i class="fa fa-dashboard"></i> Home Yasufuku</a></li>
                            <li><a href="/{{$path[0]}}">{{$title}}</a></li>
                            @if (count($path)>1)
                                   @for ($b=1; $b < count($path); $b++)
                                          <li class="active" > {{$path[$b]}} </li>
                                   @endfor
                            @endif
                     </ol>

                     <hr/>
                     @yield('content')

              </section>
       </div>
</div>
<!-- Main content -->
<footer class="main-footer">
       <div class="pull-right hidden-xs">
              <b>Prototype</b> V1
       </div>
       <strong>Copyright &copy; 2016 <a href=#>JMT Indonesia</a>.</strong> All rights reserved.
</footer>

</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('AdminLTE-2.3.0/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('AdminLTE-2.3.0/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE-2.3.0/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE-2.3.0/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('AdminLTE-2.3.0/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('AdminLTE-2.3.0/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('AdminLTE-2.3.0/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('AdminLTE-2.3.0/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('AdminLTE-2.3.0/plugins/fastclick/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-2.3.0/dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE-2.3.0/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE-2.3.0/dist/js/demo.js') }}"></script>
</body>
</html>

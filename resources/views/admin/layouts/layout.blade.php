<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin {{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css">
@stack('styles')
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="/adminlte/dist/css/skins/skin-black.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>D</b>OC</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Doc</b>Cloud</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a id="clicka" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span id="numbermsg" class="label label-success"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li id="textinfo" class="header"></li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li  id="messages"><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li id="viewall"></li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->

                    <!-- Tasks Menu -->

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                            <!-- The user image in the navbar-->

                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span id="profilee" class="hidden-xs">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header" id="profilee2">
                                <img src="/storage/{{\Illuminate\Support\Facades\Auth::user()->profilephoto}}" class="img-circle" alt="User Image">
                                <p>
                                    {{ auth()->user()->name }} {{ auth()->user()->roles->first()->name }}
                                    <small>Desde :{{ auth()->user()->created_at->format('d/m/Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="justify-content-center">
                                    <form action="{{ route('logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div>
                                            <button class="btn btn-default btn-flat btn-block">
                                                Cerrar Sesión
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/storage/{{\Illuminate\Support\Facades\Auth::user()->profilephoto}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ auth()->user()->name.' '.auth()->user()->lastname }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">

            </span>
                </div>
            </form>
            <!-- /.search form -->



            <!-- /.sidebar-menu -->
            @include('admin.partials.nav')
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        @yield('header')
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            @if (session()->has('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif

            @if (session()->has('flash'))
                <div class="alert alert-success">
                    {{ session('flash') }}
                </div>
            @endif

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->

    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->


@unless(request()->is('admin/documents/*'))
    @include('admin.documents.create')
@endunless




<script>

    $(document).ready(function(){

        $.ajax({
            type: 'GET',
            url: '/header/info/message',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",


            },
            beforeSend: function() {
                //alert('Fetching....');
            },
            success: function(data) {

                return data;

            },
            error: function() {
                //alert('Error');
            },
            complete: function(data) {

                if(data.responseJSON.length != 0 ){
                    $("#alert").show();
                }
                $('#messages').empty();
                $('#viewall').append("<a class=\"nav-link text-center\" href=\"/admin/messages/index\"> Ir a bandeja de entrada</a>");
                $('#textinfo').append("Tienes "+data.responseJSON.length + " mensajes sin leer");
                $('#numbermsg').append(data.responseJSON.length);

                for (var j = 0; j  < data.responseJSON.length ; j++) {



                    $("#messages").append("<a href=\"/admin/messages/read/"+ data.responseJSON[j].id + '/' + data.responseJSON[j].from + "\"> \n" +
                        "                    <div class=\"pull-left\">\n" +
                        "                    <!-- User Image -->\n" +
                        "                    <img src=\"/storage/"+ data.responseJSON[j].user.profilephoto + "\" alt=\"user\" class=\"img-circle\">\n" +
                        "                    </div>\n" +
                        "                    <!-- Message title and timestamp -->\n" +
                        "                    <h4>\n" + data.responseJSON[j].user.name +' '+ data.responseJSON[j].user.lastname +
                        "                </h4>\n" +
                        "                <!-- The message -->\n" +
                        "                <p>"+ data.responseJSON[j].subject + "</p>\n" +
                        "                </a>");
                }

            }
        });
    });

    $('#clicka').click(function(){

        $.ajax({
            type: 'GET',
            url: '/header/info/message',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",


            },
            beforeSend: function() {
                //alert('Fetching....');
            },
            success: function(data) {

                return data;

            },
            error: function() {
                //alert('Error');
            },
            complete: function(data) {
                $('#viewall').empty();
                $('#textinfo').empty();
                $("#messages").empty();
                $('#numbermsg').empty();

                if(data.responseJSON.length != 0 ){
                    $("#alert").show();
                }
                $('#numbermsg').append(data.responseJSON.length);
                $('#messages').empty();
                $('#viewall').append("<a class=\"nav-link text-center\" href=\"/admin/messages/index\"> Ir a bandeja de entrada</a>");
                $('#textinfo').append("Tienes "+data.responseJSON.length + " mensajes sin leer");

                for (var j = 0; j  < data.responseJSON.length ; j++) {



                    $("#messages").append("<a href=\"/admin/messages/read/"+ data.responseJSON[j].id + '/' + data.responseJSON[j].from + "\"> \n" +
                        "                    <div class=\"pull-left\">\n" +
                        "                    <!-- User Image -->\n" +
                        "                    <img src=\"/storage/"+ data.responseJSON[j].user.profilephoto + "\" alt=\"user\" class=\"img-circle\">\n" +
                        "                    </div>\n" +
                        "                    <!-- Message title and timestamp -->\n" +
                        "                    <h4>\n" + data.responseJSON[j].user.name +' '+ data.responseJSON[j].user.lastname +
                        "                </h4>\n" +
                        "                <!-- The message -->\n" +
                        "                <p>"+ data.responseJSON[j].subject + "</p>\n" +
                        "                </a>");
                }

            }
        });
    });
</script>

@stack('scripts')


</body>
</html>
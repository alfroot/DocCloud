<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="/ElaAdmin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="/ElaAdmin/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="/ElaAdmin/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="/ElaAdmin/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="/ElaAdmin/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/ElaAdmin/css/helper.css" rel="stylesheet">
    <link href="/ElaAdmin/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <div class="header">
        @include('home.partials.header')
    </div>
    <!-- End header header -->
    <!-- Left Sidebar  -->
    <div class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
        @include('home.partials.nav')
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </div>
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        @yield('migaspan')
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
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

        </div>


            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="/ElaAdmin/js/lib/jquery/jquery.min.js"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="/ElaAdmin/js/lib/bootstrap/js/popper.min.js"></script>
<script src="/ElaAdmin/js/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="/ElaAdmin/js/lib/form-validation/jquery.validate.min.js"></script>
<script src="/ElaAdmin/js/lib/form-validation/jquery.validate.unobtrusive.min.js"></script>
<script src="/ElaAdmin/js/lib/jquery.nicescroll/jquery.nicescroll.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/ElaAdmin/js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="/ElaAdmin/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="/ElaAdmin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->


<!-- Amchart -->
<script src="/ElaAdmin/js/scripts.js"></script>
<script src="/ElaAdmin/js/lib/morris-chart/raphael-min.js"></script>
<script src="/ElaAdmin/js/lib/morris-chart/morris.js"></script>
<script src="/ElaAdmin/js/lib/morris-chart/dashboard1-init.js"></script>


<script src="/ElaAdmin/js/lib/calendar-2/moment.latest.min.js"></script>
<!-- scripit init-->
<script src="/ElaAdmin/js/lib/calendar-2/semantic.ui.min.js"></script>
<!-- scripit init-->
<script src="/ElaAdmin/js/lib/calendar-2/prism.min.js"></script>
<!-- scripit init-->
<script src="/ElaAdmin/js/lib/calendar-2/pignose.calendar.min.js"></script>
<!-- scripit init-->
<script src="/ElaAdmin/js/lib/calendar-2/pignose.init.js"></script>

<script src="/ElaAdmin/js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="/ElaAdmin/js/lib/owl-carousel/owl.carousel-init.js"></script>
<!-- scripit init-->





@stack('scripts')

</body>

</html>
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

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap Core CSS -->

    <link href="/ElaAdmin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    @stack('styles')
    <link href="/ElaAdmin/bower_components/drift/dist/drift-basic.css" rel="stylesheet">
    <link href="/ElaAdmin/bower_components/drift/dist/drift-basic.min.css" rel="stylesheet">
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
                <div class="alert alert-primary">
                    {{ session('flash') }}
                </div>
            @endif

            @yield('content')

        </div>


            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        {{--<footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>--}}
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
{{--//<script src="/ElaAdmin/bower_components/drift/dist/Drift.min.js"></script>--}}
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

<script src="/ElaAdmin/js/lib/form-validation/jquery.validate.min.js"></script>
<script src="/ElaAdmin/js/lib/form-validation/jquery.validate-init.js"></script>



<script>

    $(document).ready(function(){

        $.ajax({
            type: 'GET',
            url: '/header/info',
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

                $('#profilee').append("<img alt=\"...\" src=\"/storage/"+ data.responseJSON[0] +"\" class=\"rounded-circle\" style=\"width: 45px; height: 45px;\">");


            }
        });
    });
</script>

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

                $('#viewall').append("<a class=\"nav-link text-center\" href=\"/messages/index\"> <strong>Ir a bandeja de entrada</strong> <i class=\"fa fa-angle-right\"></i> </a>");
                $('#textinfo').append("Tienes "+data.responseJSON.length + " mensajes sin leer");

                for (var j = 0; j  < data.responseJSON.length ; j++) {

                    $("#messages").append("<a href=\"/messages/read/"+ data.responseJSON[j].id + '/' + data.responseJSON[j].from + "\"> \n" +
                        "                                    <div class=\"user-img\"> <img src=\"/storage/"+ data.responseJSON[j].user.profilephoto + "\" alt=\"user\" class=\"img-circle\"> <span class=\"profile-status online pull-right\"></span> </div>\n" +
                        "                                    <div class=\"mail-contnet\">\n" +
                        "                                        <h5>"+ data.responseJSON[j].user.name +' '+ data.responseJSON[j].user.lastname +"</h5> <span class=\"mail-desc\">"+ data.responseJSON[j].subject + "</span> <span class=\"time\">"+ data.responseJSON[j].user.name + "</span>\n" +
                        "                                    </div>\n" +
                        "                                </a>");
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

                if(data.responseJSON.length != 0 ){
                    $("#alert").show();
                }

                $('#viewall').append("<a class=\"nav-link text-center\" href=\"/messages/index\"> <strong>Ir a bandeja de entrada</strong> <i class=\"fa fa-angle-right\"></i> </a>");
                $('#textinfo').append("Tienes "+data.responseJSON.length + " mensajes sin leer");

                for (var j = 0; j  < data.responseJSON.length ; j++) {

                    $("#messages").append("<a href=\"/messages/read/"+ data.responseJSON[j].id + '/' + data.responseJSON[j].from + "\"> \n" +
                        "                                    <div class=\"user-img\"> <img src=\"/storage/"+ data.responseJSON[j].user.profilephoto + "\" alt=\"user\" class=\"img-circle\"> <span class=\"profile-status online pull-right\"></span> </div>\n" +
                        "                                    <div class=\"mail-contnet\">\n" +
                        "                                        <h5>"+ data.responseJSON[j].user.name +' '+ data.responseJSON[j].user.lastname +"</h5> <span class=\"mail-desc\">"+ data.responseJSON[j].subject + "</span> <span class=\"time\">"+ data.responseJSON[j].user.name + "</span>\n" +
                        "                                    </div>\n" +
                        "                                </a>");
                }

            }
        });
    });
</script>
@stack('scripts')






</body>

</html>
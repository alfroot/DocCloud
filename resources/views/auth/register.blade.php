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

    <title>Registro {{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="/ElaAdmin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/ElaAdmin/css/helper.css" rel="stylesheet">
    <link href="/ElaAdmin/css/style.css" rel="stylesheet">
    <link rel="stylesheet"  href="/ElaAdmin/css/background.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>

    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="bg">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->


<div class="wallpaper-ad"> </div>
<div id="main-wrapper">

    <div class="unix-login ">
        <div class="container h-auto">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-conten justify-content-center card">
                        <div class="login-form">
                            <h4><img src="/ElaAdmin/images/doccloudblack.png" style="width: 100px; height: 100px;"></h4>
                            <h4>Register</h4>
                            <form method="POST" action="{{ route('register') }}">

                        @csrf

                        <div class="form-group">
                            <label></label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre de Usuario">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus placeholder="Apellido">

                            @if ($errors->has('lastname'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>


                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="password-confirm" >Confirm Password</label>


                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="check"> Acepto los terminos y condiciones
                            </label>
                        </div>
                        <button type="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Registro</button>
                        <div class="register-link m-t-10 text-center">
                            <p>¿Ya tienes una cuenta? <a href="{{route('login')}}"> Logueate</a></p>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="/ElaAdmin/js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/ElaAdmin/js/lib/bootstrap/js/popper.min.js"></script>
<script src="/ElaAdmin/js/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/ElaAdmin/js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="/ElaAdmin/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="/ElaAdmin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="/ElaAdmin/js/custom.min.js"></script>

</body>

</html>



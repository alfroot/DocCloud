<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link media="all" type="text/css" rel="stylesheet" href="css/estilos.css">
    @stack('styles')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
</head>
<body id="top">

<!-- Header -->
<header id="header" class="skel-layers-fixed">
    <h1><a href="#">{{ config('app.name', 'Laravel') }}</a></h1>
    @include('layouts.compontents.navbar')
</header>

@yield('banner')

@yield('content')


<!-- Footer -->
<footer id="footer">
    <div class="container">
        <div class="row double">
            <div class="6u">
                <div class="row collapse-at-2">
                    <div class="6u">
                        <h3>Accumsan</h3>
                        <ul class="alt">
                            <li><a href="#">Nascetur nunc varius</a></li>
                            <li><a href="#">Vis faucibus sed tempor</a></li>
                            <li><a href="#">Massa amet lobortis vel</a></li>
                            <li><a href="#">Nascetur nunc varius</a></li>
                        </ul>
                    </div>
                    <div class="6u">
                        <h3>Faucibus</h3>
                        <ul class="alt">
                            <li><a href="#">Nascetur nunc varius</a></li>
                            <li><a href="#">Vis faucibus sed tempor</a></li>
                            <li><a href="#">Massa amet lobortis vel</a></li>
                            <li><a href="#">Nascetur nunc varius</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="6u">
                <h2>Aliquam Interdum</h2>
                <p>Blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan justo aliquet.</p>
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                </ul>
            </div>
        </div>
        <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li>
            <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
            <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
        </ul>
    </div>
</footer>
@stack('scripts')
</body>
</html>


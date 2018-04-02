<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
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
    <nav id="nav">
        <ul>

            @if (Route::has('login'))

                    @auth
                    <li><a href="{{ url('/home') }}" class="button special">Home</a></li>
                    <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <li><a href=""><button  type="submit"  class="button special">Salir</button></a></li>
                    </form>

                    @else
                        <li><a href="{{ route('login') }}" class="button special">Login</a></li>
                        <li><a href="{{ route('register') }}" class="button special">Registro</a></li>
                    @endauth

            @endif

        </ul>
    </nav>
</header>

<!-- Banner -->
<section id="banner">
    <div class="inner">
        <h2>{{ config('app.name', 'Laravel') }}</h2>
        <p>Web para..</p>
        <ul class="actions">
            @if (Route::has('login'))

                @auth
                    <li><a href="{{ url('/home') }}" class="button big special">Home</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="button big special">Login</a></li>
                @endauth

            @endif

            <li><a href="#elements" class="button big alt">Learn More</a></li>
        </ul>
    </div>
</section>

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

</body>
</html>
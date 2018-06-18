        <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="/gryscale/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/gryscale/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link href="/gryscale/css/grayscale.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"></a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="navbar-nav ml_auto">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Intro Header -->
<header class="masthead">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="brand-heading">{{ config('app.name', 'Laravel') }}</h1>
                    <p class="intro-text"></p>
                    <a href="#about" class="btn btn-circle js-scroll-trigger">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section id="about" class="content-section text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>SOBRE {{ config('app.name', 'Laravel') }}</h2>
                <p>DocCloud es el proyecto de fin de grado de Alfonso Pozo, en el se trata de abordar y demostrar los conocimientos aprendidos durante el curso de DAW. La aplicación consiste en una red social de intercambio publico y gratuito o compra de documentos, todos estos pueden ser descargados o tener almacenados en la nube.</p>
                <p>La idea de negocio consiste en la monetización de documentos, al monetizar un archivo DocCloud se queda con el 30% de los beneficios de un documento por gestión y almacenaje. El otro 70% es la propiedad intelectual e ira destinada al usuario.</p>
                <p>Al mismo tiempo DocCloud es una red social, en la que podemos disfrutar de un timeline,  comunicación con otros usuarios e interacciones.</p>

            <p></p>
            </div>
        </div>
    </div>
</section>

<!-- Download Section -->
<section id="download" class="download-section content-section text-center">
    <div class="container">
        <div class="col-lg-8 mx-auto">
            <h2></h2>
            <p></p>

        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="content-section text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>Contacto</h2>
                <p>Puedes ver mi proyecto en GitLab</p>
                <ul class="list-inline banner-social-buttons">
                    <li class="list-inline-item">
                        <a href="https://twitter.com/alfonsotrozo" class="btn btn-default btn-lg">
                            <i class="fa fa-twitter fa-fw"></i>
                            <span class="network-name">Twitter</span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://gitlab.com/alfonsopozo/DocCloud" class="btn btn-default btn-lg">
                            <i class="fa fa-gitlab fa-fw"></i>
                            <span class="network-name">GitLab</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->


<!-- Footer -->
<footer>
    <div class="container text-center">
        <p>Copyright &copy; DocCloud 2018</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/gryscale/vendor/jquery/jquery.min.js"></script>
<script src="/gryscale/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/gryscale/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->


<!-- Custom scripts for this template -->
<script src="/gryscale/js/grayscale.min.js"></script>

</body>

</html>

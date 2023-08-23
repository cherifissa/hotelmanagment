<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="keywords"
        content="réservations d'hôtel, réservation en ligne, réservation d'hébergement, voyage, hospitalité">
    <meta name="description"
        content="Profitez d'un service pratique et sans tracas pour vos réservations d'hôtel grâce à notre service de réservation en ligne. Parcourez et réservez un large choix d'hébergements pour répondre à vos besoins de voyage. Découvrez une hospitalité exceptionnelle et rendez votre expérience de voyage inoubliable.">
    <meta name="author" content="cherifissa36">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}" media="screen">

</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="/"><img src="images/logo.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-13 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav ">
                                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                        <a class="nav-link" href="/">Accueil</a>
                                    </li>
                                    <li class="nav-item {{ request()->is('about*') ? 'active' : '' }}">
                                        <a class="nav-link" href="/about">À PROPOS</a>
                                    </li>
                                    <div
                                        class="nav-item dropdown {{ request()->is('blog*', 'chambre*', 'gallery*') ? 'active' : '' }}">
                                        <button class="nav-link dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Nos services
                                        </button>
                                        <ul class="dropdown-menu text-light ">
                                            <li>
                                                <a class="dropdown-item" href="/chambre">Nos Chambres</a>
                                            </li>

                                            <li><a class="dropdown-item" href="/gallery">Galerie</a></li>
                                            <li><a class="dropdown-item" href="/blog">Blog</a></li>
                                        </ul>
                                    </div>

                                    <li class="nav-item {{ request()->is('contact*') ? 'active' : '' }}">
                                        <a class="nav-link" href="/contact">CONTACTEZ-NOUS</a>
                                    </li>

                                    <div class="nav-item dropdown">
                                        <button class="nav-link dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user"></i>
                                        </button>
                                        <ul class="dropdown-menu text-light">

                                            @if (session()->has('client'))
                                                <li>
                                                    <a class="dropdown-item" href="/profile">profile</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="/dasboard">Dashboard</a>
                                                </li>

                                                <li><a class="dropdown-item" href="/commentaire">Laisser un
                                                        commentaire</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('disconnect', session('client')) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger dropdown-item"><i
                                                                class="fas fa-sign-out-alt color-danger"></i>
                                                            Deconnecter</button>
                                                    </form>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="dropdown-item" href="/login">Connecter</a>
                                                </li>
                                                <li><a class="dropdown-item" href="/signin">Créer un compte</a></li>
                                            @endif

                                        </ul>
                                    </div>

                                </ul>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->

    @yield('contente')

    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class=" col-md-4">
                        <h3>Contactez Nous</h3>
                        <ul class="conta">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> Addresse
                            </li>
                            <li><i class="fa fa-mobile" aria-hidden="true"></i> +228 70056985
                            </li>
                            <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#">
                                    cherifissa36@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Liens du Menu</h3>
                        <ul class="link_menu">
                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Accueil</a></li>
                            <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="about"> À Propos</a>
                            </li>
                            <li class="{{ request()->is('chambre') ? 'active' : '' }}"><a href="chambre">Nos
                                    Chambres</a>
                            </li>
                            <li class="{{ request()->is('gallery') ? 'active' : '' }}"><a href="gallery">Gallerie</a>
                            </li>
                            <li class="{{ request()->is('blog') ? 'active' : '' }}"><a href="blog">Blog</a></li>
                            <li class="{{ request()->is('/contact') ? 'active' : '' }}"><a
                                    href="contact">Contactez-nous</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>newsletters</h3>
                        <form class="bottom_form">
                            <input class="enter" placeholder="Entrer votre Email" type="email" name="email">
                            <button class="sub_btn">s'abonner</button>
                        </form>
                        <ul class="social_icon">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">

                            <p>
                                &copy; 2023 Tous les droits sont réservés. Concu par <a
                                    href="https://github.com/cherifissa">
                                    Cherif</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>

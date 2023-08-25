<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre')</title>
    <link rel="shortcut icon" href="{{ asset('dist/img/AdminLTELogo.png') }}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('fonts/fontfamilly.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="{{ asset('js/sweetalert.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

</head>

<body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->

            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="d-flex align-items-center ml-2 mt-3">

                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </div>
                </li>
                @php
                    $url = Route::current()->uri;
                    $segments = explode('/', $url);
                    $firstSegment = $segments[0];
                    
                    if ($firstSegment == 'admin') {
                        $prefix = 'admin';
                    } else {
                        $prefix = 'recept';
                    }
                @endphp

                <li class="nav-item">
                    <a class="nav-link {{ request()->is("$prefix") ? 'active' : '' }}" aria-current="page"
                        href="{{ '/' . $prefix }}">
                        <div class="d-flex align-items-center"> <i class="nav-icon fas fa-home"></i>
                            <p class="ml-2 mt-3">Accueil</p>
                        </div>
                    </a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is($prefix . '/chambre_categories') ? 'active' : '' }} "
                        href="{{ '/' . $prefix . '/chambre_categories' }}">
                        <div class="d-flex align-items-center">
                            <i class="nav-icon fa fa-bookmark"></i>
                            <p class="ml-2 mt-3">Categories de Chambre</p>
                        </div>
                    </a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is($prefix . '/chambres*') ? 'active' : '' }} "
                        href="{{ '/' . $prefix . '/chambres' }}">
                        <div class="d-flex align-items-center"><i class="nav-icon fas fa-house-user"></i>
                            <p class="ml-2 mt-3">Chambres</p>
                        </div>
                    </a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is($prefix . '/clients*') ? 'active' : '' }} "
                        href="{{ '/' . $prefix . '/clients' }}">
                        <div class="d-flex align-items-center"> <i class="nav-icon fas fa-users"></i>
                            <p class="ml-2 mt-3">Clients</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is($prefix . '/reservations*') ? 'active' : '' }} "
                        href="{{ '/' . $prefix . '/reservations' }}">
                        <div class="d-flex align-items-center"> <i class="nav-icon fa fa-receipt"></i>
                            <p class="ml-2 mt-3">Reservations</p>
                        </div>
                    </a>
                </li>
                @if ($prefix == 'admin')
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link {{ request()->is('admin/admins*') ? 'active' : '' }} "
                            href="{{ '/' . $prefix . '/admins' }}">
                            <div class="d-flex align-items-center"><i class="nav-icon fas fa-users"></i>
                                <p class="ml-2 mt-3">Utilisateurs</p>
                            </div>
                        </a>
                    </li>
                @endif
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is($prefix . '/messages') ? 'active' : '' }} "
                        href="{{ '/' . $prefix . '/messages' }}">
                        <div class="d-flex align-items-center">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p class="ml-2 mt-3">Messages</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is($prefix . '/commentaires') ? 'active' : '' }} "
                        href="{{ '/' . $prefix . '/commentaires' }}">
                        <div class="d-flex align-items-center">
                            <i class="nav-icon fa fa-comment"></i>
                            <p class="ml-2 mt-3">Commentaires</p>
                        </div>
                    </a>
                </li>
                @if ($prefix == 'admin')
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link {{ request()->is('admin/statistiques') ? 'active' : '' }} "
                            href="/admin/statistiques">
                            <div class="d-flex align-items-center">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p class="ml-2 mt-3">Statistiques</p>
                            </div>
                        </a>
                    </li>
                @endif

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item ">
                    @if ($prefix == 'admin')
                        <form action="{{ route('disconnect', session('admin')) }}" method="post">@csrf
                            <button type="submit" class="btn btn-danger"><i
                                    class="fas fa-sign-out-alt"></i></button>
                        </form>
                    @else
                        <form action="{{ route('disconnect', session('recept')) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i
                                    class="fas fa-sign-out-alt"></i></button>
                        </form>
                    @endif
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-dark elevation-2">
            <!-- Brand Logo -->
            <a href="{{ '/' . $prefix }}" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link  {{ request()->is('*/chambres*') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-house-user"></i>
                                <p>
                                    Chambres
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    @if ($prefix == 'recept')
                                        <a href="{{ route('chambrerecept') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liste des chambres</p>
                                        </a>
                                    @else
                                        <a href="{{ route('chambres.index') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liste des chambres</p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('chambres.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Crée une chambre</p>
                                    </a>
                                    @endif
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#"
                                class="nav-link  {{ request()->is($prefix . '/clients*') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Clients
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ '/' . $prefix . '/clients' }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des clients</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ '/' . $prefix . '/users/create' }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Crée une client</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link  {{ request()->is($prefix . '/reservations*') ? 'active' : '' }} ">
                                <i class="nav-icon fa fa-receipt"></i>
                                <p>
                                    Reservations
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('reservations.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des reservations</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('reservations.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Crée une reservation</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if ($prefix == 'admin')
                            <li class="nav-item">
                                <a href="#"
                                    class="nav-link  {{ request()->is('admin/admins*') ? 'active' : '' }} ">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Utilisateurs
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item">
                                        <a href="{{ '/' . $prefix . '/admins' }}" class="nav-link  ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Liste des utilisateur</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ '/' . $prefix . '/users/create' }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crée un utilisateur</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link  {{ request()->is($prefix . '/demandes') ? 'active' : '' }} ">
                                <i class="nav-icon fa fa-bookmark"></i>
                                <p>
                                    Demandes de réservation
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ '/' . $prefix . '/demandes' }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des Demandes de réservation</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link  {{ request()->is($prefix . '/messages*') ? 'active' : '' }} ">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                    Messages
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ '/' . $prefix . '/messages' }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des messages</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @if ($prefix == 'admin')
                        <ul class="nav nav-bottom nav-sidebar flex-column" data-widget="treeview" role="menu">

                            <li class="nav-item mt-auto">
                                <a href="{{ url('admin/statistiques') }}"
                                    class="nav-link  {{ request()->is($prefix . '/statistiques*') ? 'active' : '' }} ">
                                    <i class="nav-icon fas fa-chart-bar"></i>
                                    <p>Statistiques</p>
                                </a>
                            </li>
                        </ul>
                    @endif
                    <ul class="nav nav-bottom nav-sidebar flex-column" data-widget="treeview" role="menu">

                        <li class="nav-item mt-auto">
                            <a href="{{ '/' . $prefix . '/profile' }}"
                                class="nav-link  {{ request()->is($prefix . '/profile*') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('name')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                                <li class="breadcrumb-item active">{{ Route::currentRouteName() }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">

                @yield('content')

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">

        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 <a href="">Cherif</a>.</strong> Tous les droits sont réservés.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.js') }}"></script>

    <!-- Bootstrap JS -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('dist/js/multiselect.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/highchart.js') }}"></script>
    <script src="{{ asset('js/accessibility.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/jspdf.umd.min.js') }}"></script>
    <script src="{{ asset('js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('js/html2pdf.min.js') }}"></script>

</body>

</html>

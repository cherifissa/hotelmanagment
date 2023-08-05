<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre')</title>
    <link rel="shortcut icon" href="{{ asset('dist/img/AdminLTELogo.png') }}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('fonts/fontfamilly.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <script src="{{ asset('js/sweetalert.js') }}"></script>

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
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                        <div class="d-flex align-items-center"> <i class="nav-icon fas fa-home"></i>
                            <p class="ml-2 mt-3">Accueil</p>
                        </div>
                    </a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is('admin/chambres*') ? 'active' : '' }} " href="/admin/chambres">
                        <div class="d-flex align-items-center"><i class="nav-icon fas fa-house-user"></i>
                            <p class="ml-2 mt-3">Chambres</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is('admin/clients*') ? 'active' : '' }} " href="/admin/clients">
                        <div class="d-flex align-items-center"> <i class="nav-icon fas fa-users"></i>
                            <p class="ml-2 mt-3">Clients</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is('admin/reservations*') ? 'active' : '' }} "
                        href="/admin/reservations">
                        <div class="d-flex align-items-center"> <i class="nav-icon fa fa-receipt"></i>
                            <p class="ml-2 mt-3">Reservations</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is('admin/admins*') ? 'active' : '' }} " href="/admin/admins">
                        <div class="d-flex align-items-center"><i class="nav-icon fas fa-users"></i>
                            <p class="ml-2 mt-3">Utilisateurs</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is('admin/demandes') ? 'active' : '' }} " href="/admin/demandes">
                        <div class="d-flex align-items-center">
                            <i class="nav-icon fa fa-bookmark"></i>
                            <p class="ml-2 mt-3">Demandes de réservation</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link {{ request()->is('admin/messages') ? 'active' : '' }} " href="/admin/messages">
                        <div class="d-flex align-items-center">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p class="ml-2 mt-3">Messages</p>
                        </div>
                    </a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item ">
                    <form action="{{ route('disconnect') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('profile.index') }}" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link  {{ request()->is('admin/chambres*') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-house-user"></i>
                                <p>
                                    Chambres
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
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
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#"
                                class="nav-link  {{ request()->is('admin/clients*') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Clients
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('clients.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des clients</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Crée une client</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link  {{ request()->is('admin/reservations*') ? 'active' : '' }} ">
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
                                    <a href="{{ route('admins.index') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des utilisateur</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Crée un utilisateur</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link  {{ request()->is('admin/demandes') ? 'active' : '' }} ">
                                <i class="nav-icon fa fa-bookmark"></i>
                                <p>
                                    Demandes de réservation
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('messages.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des Demandes de réservation</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link  {{ request()->is('admin/messages*') ? 'active' : '' }} ">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                    Messages
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('messages.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des messages</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-bottom nav-sidebar flex-column" data-widget="treeview" role="menu">

                        <li class="nav-item mt-auto">
                            <a href="{{ route('profile.index') }}"
                                class="nav-link  {{ request()->is('admin/profile*') ? 'active' : '' }} ">
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
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>

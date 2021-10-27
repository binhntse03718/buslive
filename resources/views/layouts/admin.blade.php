<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | BusLive</title>

  <!-- Core Css -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <link rel="stylesheet" href="{{ URL::to('plugins/fontawesome-free/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ URL::to('css/admin/adminlte.min.css') }}" />
  <!-- /Core Css -->

  <!-- Core JS -->
  <script src="{{ URL::to('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::to('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::to('plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ URL::to('js/admin/adminlte.min.js') }}"></script>
  <script src="{{ URL::to('plugins/angular/js/angularjs.min.js') }}"></script>
  <!-- /Core JS -->

  <!-- Page JS -->
  <script src="/js/admin/main.js"></script>
  <!-- /Page JS -->

  <link rel="icon" href="{{ URL::to('img/icon.png') }}">

</head>

<body class="hold-transition sidebar-mini" ng-app="adminApp">
  <div class="wrapper" ng-controller="switchCtrl">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="user-panel d-flex">
            <div class="image">
              <img src="{{ URL::to('img/icon.png') }}" class="img-circle elevation-2">
            </div>
            <div class="info">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/profile">Profile</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="dropdown-item">{{ __('Sign out') }}</button>
                </form>
                </div>
              </li>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="layout.html" class="brand-link">
        <img src="{{ URL::to('img/icon.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BusLive</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar mt-2">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="/admin/dashboard" class="nav-link" id="dashboard">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item menu-open">
              <a href="/admin/employee" class="nav-link" id="employee">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Employee
                </p>
              </a>
            </li>

            <li class="nav-item menu-open">
              <a href="/admin/garages" class="nav-link" id="garages">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Garages
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Page content -->
    <div class="content-wrapper">
      <!-- Header content-->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 ml-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active"></li>
              <p>@{{ nameMenu }}</p>
            </ol>
          </div>
        </div>
      </div>
      <!-- /Header content-->

      <div class="content">
        @yield('content')
      </div>
    </div>
    <!-- /Page content -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 <a href="index.html">BusLive</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>
    <!-- /Main Footer -->

  </div>
</body>

</html>
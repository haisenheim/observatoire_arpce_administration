<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('includes.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 <!-- <div style="background: linear-gradient(to right, #5bbdd6,#FFFFFF,#5bbdd6);" class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('img/logo.png') }}" alt="NyotaShop Manager" height="160" width="160">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" role="button">{{ auth()->user()->name }}/<b>Super Administrateur</b></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">



      <li class="nav-item">
        <p>
            <?php
                $active = \Illuminate\Support\Facades\Session::get('active');
                use Carbon\Carbon;
                $locale = app()->getLocale();
                Carbon::setlocale($locale);
                $date = Carbon::now();
                $translatedDate = $date->translatedFormat('D, j M Y, H:i:s');
                echo($translatedDate);

                 ?>

        </p>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside style="overflow: scroll;" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

      <h3 style="text-align:center; font-weight:600" class="brand-text brand-link">ADMINISTRATION</h3>
      <p style="text-align:center;">
        <a style="color:#fff; font-size:1.4rem;" href="{{ route('logout') }}">Se déconnecter</a>
      </p>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ $active==1?'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DONNEES COLLECTEES
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.entreprises.index') }}" class="nav-link {{ $active==2?'active':'' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                ENTREPRISES
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.rapports.index') }}" class="nav-link {{ $active==3?'active':'' }}">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                RAPPORTS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.textes.index') }}" class="nav-link {{ $active==31?'active':'' }}">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                TEXTES
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.bonnes-pratiques.index') }}" class="nav-link {{ $active==32?'active':'' }}">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                BONNES PRATIQUES
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.articles.index') }}" class="nav-link {{ $active==5?'active':'' }}">
                <i class="nav-icon fas fa-edit"></i>
              <p>
                PUBLICATIONS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ $active==7?'active':'' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                PARAMETRES
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.param.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>INFOS</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.faqs.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faq</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.tags.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mots clefs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.communes.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>COMMUNES</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a style="font-style:italic" href="{{ route('admin.users.index') }}" class="nav-link nav-light {{ $active==6?'active':'' }}">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Comptes utilisateur</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div style="background: #fff" class="content-wrapper">
    <div id="div-flash" class="container">
        @include('includes.flash-message')
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @yield('content-header')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('includes.foot')
</body>
</html>

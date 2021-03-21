<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset ('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('fonts/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset ('fonts/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dist/css/skins/_all-skins.min.css')}}">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg">Laravel Blog<b>Admin</b>LTE</span>
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                     {{ __('Sign out') }}
                    </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                   </form>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset ('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>

          @can('akreditasi.index')  
          <li class="treeview {{ set_active([
          'bab_satu.index','bab_satu.create', 'bab_satu.edit',
          'bab_dua.index','bab_dua.create', 'bab_dua.edit',
          'bab_tiga.index','bab_tiga.create', 'bab_tiga.edit',
          'bab_empat.index','bab_empat.create', 'bab_empat.edit',
          'bab.index', 'bab.create', 'bab.edit', 
          'standar.index', 'standar.create', 'standar.edit',
          'kriteria.index', 'kriteria.create', 'kriteria.edit',
          'elemen.index', 'elemen.create', 'elemen.edit'
          ]) }}">
          <a href="#">
            <i class="fa fa-bookmark"></i>
            <span>Akreditasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{ set_active(['bab_satu.index','bab_satu.create', 'bab_satu.edit']) }}"><a href="{{route('bab_satu.index')}}">BAB 1</a></li>
              <li class="{{ set_active(['bab_dua.index','bab_dua.create', 'bab_dua.edit']) }}"><a href="{{route('bab_dua.index')}}">BAB 2</a></li>
              <li class="{{ set_active(['bab_tiga.index','bab_tiga.create', 'bab_tiga.edit']) }}"><a href="{{route('bab_tiga.index')}}">BAB 3</a></li>
              <li class="{{ set_active(['bab_empat.index','bab_empat.create', 'bab_empat.edit']) }}"><a href="{{route('bab_empat.index')}}">BAB 4</a></li>
              @can('struktur.index')  
              <li class="treeview {{ set_active([
                'bab.index','bab.create', 'bab.edit',
                'standar.index', 'standar.create', 'standar.edit',
                'kriteria.index', 'kriteria.create', 'kriteria.edit',
                'elemen.index', 'elemen.create', 'elemen.edit']) }}">
                <a href="#">
                  <i class="fa fa-bookmark"></i>
                  <span>Struktur Akreditasi</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="{{ set_active(['bab.index', 'bab.create', 'bab.edit']) }}"><a href="{{ route('bab.index') }}">BAB </a></li>
                  <li class="{{ set_active(['standar.index', 'standar.create', 'standar.edit']) }}"><a href="{{ route('standar.index') }}">Standart</a></li>
                  <li class="{{ set_active(['kriteria.index', 'kriteria.create', 'kriteria.edit']) }}"><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
                  <li class="{{ set_active(['elemen.index', 'elemen.create', 'elemen.edit']) }}"><a href="{{ route('elemen.index') }}">Elemen</a></li>
                  <li><a href="#">Periode Akreditasi</a></li>
                </ul>
              </li>
              @endcan
            </ul>
            </li>
            @endcan
            @can('dokumen.index')
                
              <li class="{{ set_active(['dokumen.index', 'dokumen.create', 'dokumen.edit']) }}"><a href="{{route('dokumen.index')}}"><i class="fa fa-file" aria-hidden="true"></i> Dokumen</a></li>
              @endcan
            @can('programkerja.index')
              
            <li class="treeview {{ set_active(['programkerja.index', 'programkerja.create', 'programkerja.edit',
            'periodeprogramkerja.index', 'periodeprogramkerja.create', 'periodeprogramkerja.edit',
            'tipeprogramkerja.index',
            'statusprogramkerja.index', 'statusprogramkerja.create', 'statusprogramkerja.edit',
            'tipepelaksanaan.index', 'tipepelaksanaan.create', 'tipepelaksanaan.edit',
            'statuspelaksanaan.index', 'statuspelaksanaan.create', 'statuspelaksanaan.edit',
              ]) }}">
                <a href="#">
                  <i class="fa fa-cogs"></i>
                  <span>Program Kerja</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="{{ set_active(['programkerja.index', 'programkerja.create', 'programkerja.edit']) }}"><a href="{{ route('programkerja.index') }}">Program Kerja </a></li>
                  <li><a href="#">Pelaksanaan</a></li>
                  @can('dataproker.index')
                    <li class="treeview {{ set_active([ 'periodeprogramkerja.index', 'periodeprogramkerja.create', 'periodeprogramkerja.edit',
                    'tipeprogramkerja.index',
                    'statusprogramkerja.index', 'statusprogramkerja.create', 'statusprogramkerja.edit',
                    'tipepelaksanaan.index', 'tipepelaksanaan.create', 'tipepelaksanaan.edit',
                    'statuspelaksanaan.index', 'statuspelaksanaan.create', 'statuspelaksanaan.edit']) }}">
                    <a href="#">
                      <i class="fa fa-cogs"></i>
                      <span>Data Proker</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    
                    <ul class="treeview-menu">
                      <li class="{{ set_active(['periodeprogramkerja.index', 'periodeprogramkerja.create', 'periodeprogramkerja.edit']) }}"><a href="{{ route('periodeprogramkerja.index') }}">Periode Program Kerja</a></li>
                      <li class="{{ set_active(['tipeprogramkerja.index']) }}"><a href="{{route('tipeprogramkerja.index')}}"> Tipe Program Kerja</a></li>
                      <li class="{{ set_active(['statusprogramkerja.index', 'statusprogramkerja.create', 'statusprogramkerja.edit']) }}"><a href="{{ route('statusprogramkerja.index') }}">Status Program Kerja</a></li>
                      <li class="{{ set_active(['tipepelaksanaan.index', 'tipepelaksanaan.create', 'tipepelaksanaan.edit']) }}"><a href="{{ route('tipepelaksanaan.index') }}">Tipe Pelaksanaan</a></li>
                      <li class="{{ set_active(['statuspelaksanaan.index', 'statuspelaksanaan.create', 'statuspelaksanaan.edit']) }}"><a href="{{ route('statuspelaksanaan.index') }}">Status Pelaksanaan</a></li>
                    </ul>
                  </li>
                  @endcan
                </ul>
              </li>
              @endcan
              
              @can('rapat.index')
              <li class="{{ set_active(['rapat.index','rapat.create','rapat.edit']) }}"><a href="{{route('rapat.index')}}"><i class="fa fa-wechat"></i>Rapat</a></li>
              @endcan
              @can('users.index')
                
              <li class="treeview {{ set_active(['user.index', 'user.create', 'user.edit']) }}">
                <a href="#">
                  <i class="fa fa-users"></i>
                      <span>Users</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Profile Setting</a></li>
                        <li class="{{ set_active(['user.index', 'user.edit', 'user.create']) }}"><a href="{{ route('user.index') }}">User</a></li>
                        
                      </ul>
                    </li>
                @endcan
                @can('klinik.index')
                  
                <li class="{{ set_active(['klinik.index', 'klinik.edit', 'klinik.create']) }}"><a href="{{route('klinik.index')}}"><i class="fa fa-hospital-o "></i>Klinik</a></li>
                @endcan
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       @yield('page-title')
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><a href="#">Laravel Blog</a></b>
    </div>
    <strong> <a href="#">Laravel Blog</a></strong>
  </footer>
</div>
<script src="{{ asset ('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset ('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset ('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset ('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('dist/js/demo.js')}}"></script>
<script>
  /** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function() {
    return this.href == url;
}).addClass('active');

// for treeview
$('ul.nav-treeview a').filter(function() {
    return this.href == url;
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>
</body>
</html>

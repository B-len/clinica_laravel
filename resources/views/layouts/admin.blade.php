<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    @yield('title')
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{!!asset('adminlte/dist/img/logo.jpg')!!}" type="image/x-icon">

    @yield('style')
  <!-- Font Awesome -->
  {!! Html::style('adminlte/plugins/fontawesome-free/css/all.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('adminlte//plugins/ekko-lightbox/ekko-lightbox.css') !!}

  <!--link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" -->
  <!-- overlayScrollbars -->
  {!! Html::style('adminlte/dist/css/adminlte.min.css') !!}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin-panel')}}" class="nav-link">Inicio</a>
      </li>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('welcome')}}" class="brand-link">
      <img src="{!!asset('adminlte/dist/img/logo.jpg')!!}"
           alt="Logo empresa"
           class="brand-image img-rounded elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Clínica</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          {{-- Clientes--}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('clients.create')}}" class="nav-link">
                  <i class="far fas fa-plus nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('clients.index')}}" class="nav-link">
                    <i class="far fas fa-list nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Sesiones   --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hourglass-start"></i>
              <p>
                Sesiones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('medical-sessions.create')}}" class="nav-link">
                  <i class="far fas fa-plus nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('medical-sessions.index')}}" class="nav-link">
                    <i class="far fas fa-list nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt "></i>
                    <p>
                        Calendario
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('reservations.index')}}" class="nav-link">
                            <i class="far fas fa-eye nav-icon"></i>
                            <p>Ver</p>
                        </a>
                    </li>
                </ul>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              @yield('title')
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Inicio</a></li>
              @yield('breadcrumb')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      @if (session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" >
        {{session('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <!-- Default box -->
      @yield('content')
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

  <footer class="main-footer text-center">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
      <strong>Copyright &copy; </strong>Clínica
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
{!! Html::script('adminlte/plugins/jquery/jquery.min.js') !!}
 {!! Html::script('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')!!}
{!! Html::script('adminlte/plugins/filterizr/jquery.filterizr.min.js') !!}
{!! Html::script('adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js') !!}
{!! Html::script('https://unpkg.com/axios/dist/axios.min.js') !!}
{!! Html::script('https://cdn.jsdelivr.net/npm/sweetalert2@9') !!}
{!! Html::script('js/app.js') !!}
{!! Html::script('adminlte/dist/js/adminlte.min.js') !!}
{!! Html::script('adminlte/dist/js/demo.js') !!}
{!! Html::script('adminlte/plugins/filterizr/jquery.filterizr.min.js') !!}
@yield('scripts')
</body>
</html>

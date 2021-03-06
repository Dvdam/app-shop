<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset ('img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('title', config('app.name'))</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/material-kit.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  @yield('styles')
</head>

<body class="@yield('body-class')">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <!-- Para mostar el nombre de la aplicacionq ue se declaro en el archivo .env -->
        <!-- Imprimimos la variable app name que dealramos anteriormente -->
        <a class="navbar-brand" href="{{ url('/')}}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
<!--           <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Components
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="../index.html" class="dropdown-item">
                <i class="material-icons">layers</i> All Components
              </a>
              <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                <i class="material-icons">content_paste</i> Documentation
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="material-icons">cloud_download</i> Download
            </a>
          </li> -->
      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
          </li>
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ (Auth::user()->name) }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                  @if (auth()->user()->admin)
                  <a class="dropdown-item" href="{{ url('admin/categories') }}">Gestionar Categorías</a>
                  <a class="dropdown-item" href="{{ url('admin/products') }}">Gestionar Productos</a>
                  <a class="dropdown-item" href="{{ url('admin/orders') }}">Gestionar Pedidos</a>
                  @endif
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Cerrar Sesión') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
        </ul>
      </div>
    </div>
  </nav>
  <div class="wrapper">

    @yield('content')

  </div>

  <!--   Core JS Files   -->
  <script src="{{ asset ('js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset ('js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset ('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset ('js/plugins/moment.min.js') }}"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset ('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset ('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for Sharrre btn -->
  <script src="{{ asset ('js/plugins/jquery.sharrre.js') }}" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset ('js/material-kit.js') }}" type="text/javascript"></script>
  <!-- Declaramos una seccion para cargar un archivo js solo para una pagina en particular -->
  @yield('scripts')
</body>

</html>

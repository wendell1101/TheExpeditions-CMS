<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <title>@yield('title') </title>

  <!-- Styles -->
  <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
  <link rel="icon" href="{{ asset('img/favicon.png') }}">

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>


  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

      <div class="navbar-left">
        <button class="navbar-toggler" type="button">&#9776;</button>
        <a class="navbar-brand" href="/">
          <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
          <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
        </a>
      </div>

      <section class="navbar-mobile">
        <span class="navbar-divider d-mobile-none"></span>

        <ul class="nav nav-navbar ml-auto">
          <!-- <li class="nav-item">
              <a class="nav-link" href="#">Demos </a>
            </li> -->
          @guest
          <li class="nav-item">
            <a class="btn btn-xs btn-round btn-success blog-nav-link" href="/login">Login</a>
          </li>
          @else
          <li class="nav-item">
            <a class="btn btn-xs btn-round btn-success blog-nav-link" href="/admin">Go to admin</a>
          </li>

          @endguest

        </ul>
      </section>


    </div>
  </nav><!-- /.navbar -->


  <!-- Header -->
  @yield('header')
  <!-- /.header -->


  <!-- Main Content -->
  @yield('content')


  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row gap-y align-items-center">

        <div class="col-6 col-lg-3">
          <a href="/"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
        </div>

        <div class="col-6 col-lg-3 text-right order-lg-last">
          <div class="social">
            <a class="social-facebook" href="https://www.facebook.com/wendell1101"><i class="fa fa-facebook"></i></a>
            <a class="social-twitter" href="https://twitter.com/wendell1101"><i class="fa fa-twitter"></i></a>
            <a class="social-instagram" href="https://www.instagram.com/wendell_suazo/"><i class="fa fa-instagram"></i></a>
            <a class="social-dribbble" href="https://github.com/wendell1101"><i class="fa fa-github"></i></a>
          </div>
        </div>

        <div class="col-lg-6">
          <p class="text-dark text-center align-items-center">Copyright &copy 2020 -The Expeditions by: Suazo, Wendell</p>
        </div>

      </div>
    </div>
  </footer><!-- /.footer -->


  <!-- Scripts -->
  <script src="{{ asset('js/page.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
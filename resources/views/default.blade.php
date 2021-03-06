<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('sub_title','Clean Blog - Start Bootstrap Theme')</title>



  <!-- Custom fonts for this template -->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{mix('/css/app.css')}}" rel="stylesheet">


</head>

<body>
   @include('sweetalert::alert')
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="/">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ Route::currentRouteName() == 'pages.index' ? 'active' : ''}}">
            <a class="nav-link " href="/">Home</a>
          </li>
          <li class="nav-item  {{ Route::currentRouteName() == 'pages.about' ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('pages.about')}}">About</a>
          </li>
          <li class="nav-item {{ Route::currentRouteName() == 'pages.sample' ? 'active' : ''}}">
            <a class="nav-link" href="post.html">Sample Post</a>
          </li>
          <li class="nav-item {{ Route::currentRouteName() == 'pages.contact' ? 'active' : ''}}">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>

          @auth


          <li class="nav-item {{ Route::currentRouteName() == 'logout' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('logout')}}">logout</a>
          </li>
          @else
           <li class="nav-item {{ Route::currentRouteName() == 'login' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('login')}}">login</a>
          </li>
          @endif

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url(@yield('bg-image', '/img/home-bg.jpg'))">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>@yield('title', 'Clean Blog')</h2>
            <span class="subheading">@yield('sub_title','A Blog Theme by Start Bootstrap')</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
   @yield('content')

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <form class="form-inline justify-content-center mb-4" method="POST" action="{{route('newsletter.store')}}">
           @csrf
           <input class="form-control" type="email" name="mail" placeholder="Votre Email">
           <button class="btn btn-info">S'inscrire</button>
      </form>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/js/clean-blog.min.js"></script>

</body>

</html>

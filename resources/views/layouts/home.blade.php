<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/images/logo-t.png">
    <title>Home</title>
  </head>
  <body>
    <!--back to top button-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Go to Top</button>
    <!--end back to top button-->
    <div class="container-fluid container">
      <header class="row">
        <div class="col-md-4 col-sm-12">
          <div class="logo"><a href="{{ route('home.index') }}"><img class="img-fluid" src="/images/logo.png"/></a></div>
        </div>
        <div class="col-md-8 col-sm-12">
          <div class="banner-slide">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="/images/add-top-banner.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/images/add-top-banner.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/images/add-top-banner.jpg" class="d-block w-100" alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <!--end slide-->
        </div>
      </header>
    </div>
    <div class="container-fluid main-menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Jobs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Candidate</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              @guest
                <li class="nav-item">
                  <a class="nav-link">Login</a>
                </li><li class="nav-item">
                  <a class="nav-link">Register</a>
                </li>
              @else
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ Auth::user()->dashboard() }}"> {{ Auth::user()->name }}</a>
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
              @endif
            </ul>
          </div>
        </nav>
        <!--end nav --> 
      </div>
      <!--end container-->
    </div>
    @yield('content')
    <!--end container fluid-->
    <footer>
      <div class="container-fluid footer-sidebar">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <h3>Service hot line</h3>
              <p>069 412 971</p>
              <p>Operating Hours : Mon-Fri (8:00 am to 5:00 pm)</p>
              <p>Email : jobs@example.com</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <h3>Job Seekers</h3>
              <p>Jobs Search</p>
              <p>Create CV</p>
              <p>Job Alert and Saved Searches</p>
              <p>Questions & Answers</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <h3>Employer</h3>
              <p><a href="{{ route('register.employer') }}">Post a Job</a></p>
              <p>Post an Urgent Job</p>
              <p>CV Search</p>
              <p>Purchase Service Packages</p>
              <p>Questions & Answers</p>
            </div>
          </div>
          <!--end row-->
        </div>
        <!--end container-->
      </div>
      <!--end sidebar-->
      <div class="container-fluid footer-credit">
        <div class="container">
          <div class="row">
            <small>All rights reserved by , Developed by ToucanAsia</small>
          </div>
          <!--end row-->
        </div>
        <!--end container-->
      </div>
      <!--end credit-->
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/script.js?v=1') }}"></script>
  </body>
</html>
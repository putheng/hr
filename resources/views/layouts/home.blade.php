<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/images/logo-t.png">
    @yield('title')
  </head>
  <body>
    <!--back to top button-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Go to Top</button>
    <!--end back to top button-->
    <div class="container-fluid container">
      <header class="row">
        <div class="col-md-4 col-sm-12">
          <div class="logo">
            <a href="{{ route('home.index') }}">
              <img class="img-fluid" src="/images/logo.png"/>
            </a>
          </div>
        </div>
        <div class="col-md-8 col-sm-12">
          @include('ads.one')
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
                <a class="nav-link" href="{{ url('/') }}">{{ __('general.home') }}<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home.about') }}">About</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"
                    href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                  Our Services
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{ route('home.basic') }}" class="dropdown-item">Basic Job</a>
                    <a href="{{ route('home.urgent') }}" class="dropdown-item">Urgent Job</a>
                    <a href="{{ route('home.featured') }}" class="dropdown-item">Featured Employers </a>
                    <a href="{{ route('home.recruitment') }}" class="dropdown-item">Recruitment Agencies</a>
                    <a href="{{ route('home.banner') }}" class="dropdown-item">Banner Advertising</a>
                  </div>
                </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home.tip') }}">Tips</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home.qa') }}">Q & A</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home.contact') }}">Contact Us</a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              @guest
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"
                    href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                  Employer
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{ route('login.employer') }}" class="dropdown-item">Login</a>
                    <a href="{{ route('register.employer') }}" class="dropdown-item">Register</a>
                  </div>
                </li>
              @else
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ Auth::user()->dashboard() }}/setting/profile"> {{ Auth::user()->name }}</a>
                    <a class="dropdown-item" href="{{ Auth::user()->dashboard() }}">Dashboard</a>
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
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"
                    href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ strtoupper(\App::getLocale()) }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="/language/switch/en" class="dropdown-item">En</a>
                    <a href="/language/switch/kh" class="dropdown-item">Kh</a>
                    <a href="/language/switch/ch" class="dropdown-item">ch</a>
                  </div>
                </li>
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
              <h5>Service hot line</h5>
              <p>069 412 971</p>
              <p>Operating Hours : Mon-Fri (8:00 am to 5:00 pm)</p>
              <p>Email : jobs@example.com</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <h5>Job Seekers</h5>
              <p>Jobs Search</p>
              <p>Create CV</p>
              <p>Job Alert and Saved Searches</p>
              <p>Questions & Answers</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <h5>Employer</h5>
              <p><a href="{{ route('register.employer') }}">Post a Job</a></p>
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
            <div class="col-md-12">
              <small>All rights reserved by , Developed by ToucanAsia</small>
              {{-- <div class="pull-right">
                <a href="/language/switch/en">En</a>
                <a href="/language/switch/kh">Kh</a>
                <a href="/language/switch/ch">ch</a>
              </div> --}}
            </div>
          </div>
          <!--end row-->
        </div>
        <!--end container-->
      </div>
      <!--end credit-->
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/script.js?v=2') }}"></script>
  </body>
</html>
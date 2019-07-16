<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
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
                <a class="nav-link" href="{{ route('home.about') }}">{{ __('general.about') }}</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#" id="navbarDropdown"
                  role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  {{ __('general.Services') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a href="{{ route('home.basic') }}" class="dropdown-item">{{ __('general.Basic') }}</a>
                  <a href="{{ route('home.urgent') }}" class="dropdown-item">{{ __('general.Urgent') }}</a>
                  <a href="{{ route('home.featured') }}" class="dropdown-item">{{ __('general.Featured') }} </a>
                  <a href="{{ route('home.recruitment') }}" class="dropdown-item">{{ __('general.Recruitment') }}</a>
                  <a href="{{ route('home.banner') }}" class="dropdown-item">{{ __('general.Banner') }}</a>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#" id="navbarDropdown"
                  role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  {{ __('general.Seekers') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if(auth()->check() && auth()->user()->hasRole('jobseeker'))
                    <a href="/jobseeker/resume/create" class="dropdown-item">{{ __('general.Create') }}</a>
                  @else
                    <a href="/login" class="dropdown-item">{{ __('general.Create') }}</a>
                  @endif
                  <a href="{{ url('/register') }}" class="dropdown-item">{{ __('general.create_account') }}</a>
                  <a href="{{ url('/listings') }}" class="dropdown-item">{{ __('general.Search') }} </a>
                  <a href="{{ route('home.qa') }}" class="dropdown-item">
                    {{ __('general.Questions') }} &
                    {{ __('general.Answers') }}
                  </a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('listing.index') }}">{{ __('general.jobs') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home.contact') }}">{{ __('general.Contact') }}</a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              @guest
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"
                    href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                  {{ __('general.Employer') }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{ route('login.employer') }}" class="dropdown-item">{{ __('general.Login') }}</a>
                    <a href="{{ route('register.employer') }}" class="dropdown-item">{{ __('general.Register') }}</a>
                  </div>
                </li>
              @else
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ __('general.Account') }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ Auth::user()->dashboard() }}"> {{ Auth::user()->name }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('general.Logout') }}
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
                    <a href="/language/switch/en" class="dropdown-item">EN</a>
                    <a href="/language/switch/kh" class="dropdown-item">KH</a>
                    <a href="/language/switch/ch" class="dropdown-item">CH</a>
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
              <h5>{{ __('general.Service') }}</h5>
              <p>069 412 971</p>
              <p>{{ __('general.working_hour') }}</p>
              <p>Email : jobs@example.com</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <h5>{{ __('general.Seekers') }}</h5>
              <p>{{ __('general.Search') }}</p>
              <p>{{ __('general.Create') }}</p>
              <p><a href="{{ route('home.tip') }}">{{ __('general.Tips') }}</a></p>
              <p><a href="{{ route('home.qa') }}">{{ __('general.Questions') }} & {{ __('general.Answers') }}</a></p>
            </div>
            <div class="col-md-4 col-sm-12">
              <h5>{{ __('general.Employer') }}</h5>
              <p><a href="{{ route('register.employer') }}">{{ __('general.Post') }}</a></p>
              <p>{{ __('general.CV') }}</p>
              <p>{{ __('general.Purchase') }}</p>
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
              <small>{{ date('Y') }} All rights reserved</small>
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
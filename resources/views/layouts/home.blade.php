<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hello, world!</title>
  </head>
  <body>
    <!--back to top button-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Go to Top</button>
    <!--end back to top button-->

    <div class="container-fluid container">  
        <header class="row">
          <div class="col-md-4 col-sm-12">
            <div class="logo"><a href="#"><img class="img-fluid" src="/images/logo.png"/></a></div>
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
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul>
            
          </div>
        </nav>
      <!--end nav --> 
      </div>
      <!--end container-->
    </div>
    <div class="container-fluid body-search">
      <div class="container">
        <div class="row">

          <div class="col-md-4 col-sm-12">
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active">
                 <h3>HR Dimension</h3>
              </a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
              <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
              <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
            </div>

          </div>
          <!--left sidebar-->

          <div class="col-md-8 col-sm-12">
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6>Heading 6</h6>
            <img class="w-100" src="/images/add.jpg">
            <p class="pt-5">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>

          </div>
          <!--body content-->

        </div>
        <!--end row-->
      </div>
      <!--end container-->
    </div> 
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
              <p>Post a Job</p>
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
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
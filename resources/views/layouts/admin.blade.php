<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- End Required meta tags -->
		<!-- Begin SEO tag -->
		<title> Dashboard </title>

		<link rel="shortcut icon" href="/images/favicon.ico">
		<!-- End FAVICONS -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		<!-- .app -->
		<div id="app" class="app">
			<!--[if lt IE 10]>
			<div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
			<![endif]-->

			<!-- .app-header -->
			<header class="app-header app-header-dark">
				<!-- .top-bar -->
				<div class="top-bar">
					<!-- .top-bar-brand -->
					<div class="top-bar-brand">
						<a href="index.html">
							<img src="/images/brand-inverse.png" alt="" style="height: 32px;width: auto;">
						</a>
					</div>
					<!-- /.top-bar-brand -->
					<!-- .top-bar-list -->
					<div class="top-bar-list">
						<!-- .top-bar-item -->
						<div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
							<!-- toggle menu -->
							<button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
						</div>
						<!-- /.top-bar-item -->
						<!-- .top-bar-item -->
						<main-search></main-search>
						<!-- /.top-bar-item -->
						<!-- .top-bar-item -->
						<div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
							<!-- .nav -->
							<ul class="header-nav nav">
								<!-- activities -->
								<activities></activities>
								<!-- /activities -->

								<!-- messages -->
								<messages></messages>
								<!-- /messages -->

								<!-- sheets -->
								<sheets></sheets>
								<!-- /sheets -->
							</ul>
							<!-- /.nav -->

							<!-- .btn-account -->
							<user-setting></user-setting>
							<!-- /.btn-account -->

						</div>
						<!-- /.top-bar-item -->
					</div>
					<!-- /.top-bar-list -->
				</div>
				<!-- /.top-bar -->
			</header>
			<!-- /.app-header -->
			<!-- .app-aside -->
			<aside class="app-aside app-aside-expand-md app-aside-light">
				<!-- .aside-content -->
				<div class="aside-content">
					<!-- .aside-header -->
					<left-user-setting></left-user-setting>
					<!-- /.aside-header -->
					<!-- .aside-menu -->
					<div class="aside-menu overflow-hidden">
						<!-- .stacked-menu -->
						<left-menu></left-menu>
						<!-- /.stacked-menu -->
					</div>
					<!-- /.aside-menu -->
					<!-- Footer -->
					<main-footer></main-footer>
					<!-- /footer -->
				</div>
				<!-- /.aside-content -->
			</aside>
			<!-- /.app-aside -->
			<!-- .app-main -->
			<main class="app-main">
				<!-- .wrapper -->
				<div class="wrapper">
					<!-- .page -->
					<div class="page">
						<!-- .page-inner -->
						<div class="page-inner">
							<!-- .page-title-bar -->
							<header class="page-title-bar">
								<!-- page title stuff goes here -->
								<h1 class="page-title"> Page title </h1>
							</header>
							<!-- /.page-title-bar -->
							<!-- .page-section -->
							<div class="page-section">
								<!-- page content goes here -->
								<p> Hello world! </p>
							</div>
							<!-- /.page-section -->
						</div>
						<!-- /.page-inner -->
					</div>
					<!-- /.page -->
				</div>
				<!-- /.wrapper -->
			</main>
			<!-- /.app-main -->
		</div>
		<!-- /.app -->
	    <!-- Scripts -->
	    <script src="{{ asset('js/app.js?v='. time()) }}" defer></script>
	    <script src="{{ asset('js/plugin.js') }}" defer></script>
	</body>
</html>
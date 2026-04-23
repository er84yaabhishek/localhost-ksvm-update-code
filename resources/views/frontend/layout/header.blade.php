<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sriramedu.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Nov 2025 06:18:41 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="YsnfCHjn6ctoFpGa309RoIIIJj99lD2Rh8tjCZEEdZw" />
	<title>KSVM - Education Center</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ public_asset('front/img/ksvm.jpeg') }}">

	<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700%7CMontserrat:400,500,700" rel="stylesheet"
		type="text/css">

	<link href="{{ public_asset('forntend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

	<link href="{{ public_asset('forntend/css/jquery.fancybox.css') }}" rel="stylesheet" type="text/css">
	<!--Main Slider-->
	<link href="{{ public_asset('forntend/css/settings.css') }}" type="text/css" rel="stylesheet" media="screen">
	<link href="{{ public_asset('forntend/css/layers.css') }}" type="text/css" rel="stylesheet" media="screen">
	<link href="{{ public_asset('forntend/css/owl.carousel.css') }}" type="text/css" rel="stylesheet" media="screen">
	<link href="{{ public_asset('forntend/css/style.css') }}" rel="stylesheet">
	<link href="{{ public_asset('forntend/css/header.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ public_asset('forntend/css/footer.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ public_asset('forntend/css/index.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ public_asset('forntend/css/default.css') }}" rel="stylesheet" type="text/css" id="theme-color" />
	<!-- Font Awesome CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<!-- Bootstrap Icons CDN -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<!-- Bootstrap 5 CSS (CDN) -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		/* हल्का कस्टम styling */
		.hero {
			background: #f2eff2;
			border-radius: 12px;
		}

		.tagline {
			font-size: 1.05rem;
			color: #555;
		}
		.title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: #7c1f82;
            margin-bottom: 10px;
        }
	</style>
	
</head>

<body>
	<!--loader-->
	<div id="preloader">
		<div class="sk-circle">
			<div class="sk-circle1 sk-child"></div>
			<div class="sk-circle2 sk-child"></div>
			<div class="sk-circle3 sk-child"></div>
			<div class="sk-circle4 sk-child"></div>
			<div class="sk-circle5 sk-child"></div>
			<div class="sk-circle6 sk-child"></div>
			<div class="sk-circle7 sk-child"></div>
			<div class="sk-circle8 sk-child"></div>
			<div class="sk-circle9 sk-child"></div>
			<div class="sk-circle10 sk-child"></div>
			<div class="sk-circle11 sk-child"></div>
			<div class="sk-circle12 sk-child"></div>
		</div>
	</div>

	<header id="header" class="header header-1">
		<div class="header-top ptb-5" style="background:#333;">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-5 col-xs-12">
						<div class="header-left">

						</div>
					</div>
					<div class="col-md-9 col-sm-7 col-xs-12">
						<div class="header-right-prent d-flex justify-content-end">

							<ul class="header-right" style="color:#fff;">
								<li>
									<i class="fa fa-phone"></i>&nbsp; +91-7084183114, 0512-3531047
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="nav-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="logo">
							<a href="index-2.html">
								<img src="{{ public_asset('front/img/ksvm.jpeg') }}" width="130" height="83"
									alt="Kailas Saraswati Eduction Center">
							</a>
						</div>
						<!-- Phone Menu button -->
						<button id="menu" class="menu hidden-md-up"></button>
					</div>
					<div class="col-md-10 nav-bg">
						<nav class="navigation">
							<ul class="right_menu">
								<li>
									<a href="{{ route('home.index') }}"
										class="{{ Route::is('home.index') ? 'active' : ''}}">Home</a>
								</li>
								<li>
									<a href="{{ route('home.aboutus') }}"
										class="{{ Route::is('home.aboutus') ? 'active' : ''}}">About Us</a>
								</li>
								<li>
									<a href="{{ route('home.courses') }}"
										class="{{ Route::is('home.courses') ? 'active' : ''}}">Courses</a>
								</li>
								<li>
									<a href="{{ route('home.exam') }}"
										class="{{ Route::is('home.exam') ? 'active' : ''}}">Exam</a>
								</li>
								<li>
									<a href="{{ route('home.admissions') }}"
										class="{{ Route::is('home.admissions') ? 'active' : ''}}">Admissions</a>
								</li>
								<li>
									<a href="Javascript:voidmain(0);">Activities</a>
									<ul class="sub-nav">
										<a href="{{ route('home.gallery') }}" class="dropdown-item">Gallery</a>
										<a href="{{ route('home.events') }}" class="dropdown-item">Events</a>
									</ul>
								</li>
								<li>
									<a href="{{ route('home.contact') }}"
										class="{{ Route::is('home.contact') ? 'active' : ''}}">Contact</a>
								</li>

							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
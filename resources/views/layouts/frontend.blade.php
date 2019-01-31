<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Politeknik Pembangunan Pertanian (POLBANGTAN)</title>
		<meta charset="UTF-8">
		<meta name="description" content="Unica University Template">
		<meta name="keywords" content="event, unica, creative, html">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Favicon -->   
		<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}"/>
		<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}"/>
		<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}"/>
		<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}"/>
		<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"/>
	</head>
	<body>
		<!-- Page Preloder -->
		<div id="preloder">
			<div class="loader"></div>
		</div>

		<!-- header section -->
		<header class="header-section">
			<div class="container">
				<!-- logo -->
				<a href="index.html" class="site-logo"><img src="{{ asset('images/logo.png') }}" style="width: 72px; height: auto"></a>
				<strong>PMB POLBANGTAN</strong>
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
				<div class="header-info">
					<div class="hf-item">
						<i class="fa fa-clock-o"></i>
						<p><span>Hubungi Kami:</span>+62 123 4567 890, +62 123 4567 890</p>
					</div>
					<div class="hf-item">
						<i class="fa fa-map-marker"></i>
						<p><span>Alamat Kami:</span>40 Baria Street 133/2, New York City, US</p>
					</div>
				</div>
			</div>
		</header>
		<!-- header section end-->

		<!-- Header section  -->
		<nav class="nav-section">
			<div class="container">
				<div class="nav-right">
					<a href="{{ route('register') }}"><i class="fa fa-edit"></i> Register</a>
					<a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
				</div>
				<ul class="main-menu">
					<li class="active"><a href="{{ url('/') }}">Home</a></li>
					<li><a href="#">Jadwal Pendaftaran</a></li>
					<li><a href="#">Informasi Pendaftaran</a></li>
					<li><a href="#">Brosur PMB 2019/2020</a></li>
					<li><a href="#">Dokumen Persyaratan</a></li>
				</ul>
			</div>
		</nav>
		<!-- Header section end -->

		@yield('content')

		<!-- Footer section -->
		<footer class="footer-section">
			<div class="copyright">
				<div class="container">
					<p>
						Copyright &copy; {{ date('Y') }} All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				</div>		
			</div>
		</footer>
		<!-- Footer section end-->

		<!--====== Javascripts & Jquery ======-->
		<script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.countdown.js') }}"></script>
		<script src="{{ asset('frontend/js/masonry.pkgd.min.js') }}"></script>
		<script src="{{ asset('frontend/js/magnific-popup.min.js') }}"></script>
		<script src="{{ asset('frontend/js/main.js') }}"></script>
	</body>
</html>
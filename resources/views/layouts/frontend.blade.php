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
					<li><a href="#">Pengumuman</a></li>
					<li><a href="#">Brosur PMB 2019/2020</a></li>
				</ul>
			</div>
		</nav>
		<!-- Header section end -->

		@yield('content')

		<!-- Footer section -->
		<footer class="footer-section">
			<!-- <div class="container footer-top">
				<div class="row">
					<div class="col-sm-6 col-lg-3 footer-widget">
						<div class="about-widget">
							<img src="img/logo-light.png" alt="">
							<p>POLBANGTAN</p>
							<div class="social pt-1">
								<a href=""><i class="fa fa-twitter-square"></i></a>
								<a href=""><i class="fa fa-facebook-square"></i></a>
								<a href=""><i class="fa fa-google-plus-square"></i></a>
								<a href=""><i class="fa fa-linkedin-square"></i></a>
								<a href=""><i class="fa fa-rss-square"></i></a>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-3 footer-widget">
						<h6 class="fw-title">USEFUL LINK</h6>
						<div class="dobule-link">
							<ul>
								<li><a href="">Home</a></li>
								<li><a href="">About us</a></li>
								<li><a href="">Services</a></li>
								<li><a href="">Events</a></li>
								<li><a href="">Features</a></li>
							</ul>
							<ul>
								<li><a href="">Policy</a></li>
								<li><a href="">Term</a></li>
								<li><a href="">Help</a></li>
								<li><a href="">FAQs</a></li>
								<li><a href="">Site map</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-6 col-lg-3 footer-widget">
						<h6 class="fw-title">RECENT POST</h6>
						<ul class="recent-post">
							<li>
								<p>Snackable study:How to break <br> up your master's degree</p>
								<span><i class="fa fa-clock-o"></i>24 Mar 2018</span>
							</li>
							<li>
								<p>Open University plans major <br> cuts to number of staff</p>
								<span><i class="fa fa-clock-o"></i>24 Mar 2018</span>
							</li>
						</ul>
					</div>

					<div class="col-sm-6 col-lg-3 footer-widget">
						<h6 class="fw-title">CONTACT</h6>
						<ul class="contact">
							<li><p><i class="fa fa-map-marker"></i> 40 Baria Street 133/2, NewYork City,US</p></li>
							<li><p><i class="fa fa-phone"></i> (+88) 111 555 666</p></li>
							<li><p><i class="fa fa-envelope"></i> infodeercreative@gmail.com</p></li>
							<li><p><i class="fa fa-clock-o"></i> Monday - Friday, 08:00AM - 06:00 PM</p></li>
						</ul>
					</div>
				</div>
			</div> -->
			<!-- copyright -->
			<div class="copyright">
				<div class="container">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy; 2018 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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
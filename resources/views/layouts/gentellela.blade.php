<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name') }}</title>

	<!-- Bootstrap -->
	<link href="{{ asset('gentellela/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="{{ asset('gentellela/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- NProgress -->
	<link href="{{ asset('gentellela/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
	<!-- iCheck -->
	<link href="{{ asset('gentellela/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	<!-- bootstrap-progressbar -->
	<link href="{{ asset('gentellela/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="{{ asset('gentellela/build/css/custom.min.css') }}" rel="stylesheet">
	<link href="{{ asset('gentellela/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('gentellela/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('gentellela/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('gentellela/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">    

	<!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="{{ url('/') }}" class="site_title"><img src="{{ asset('images/logo.png') }}" style="width: 45px; height: auto;" /> <span>POLBANGTAN</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile">
						<div class="profile_pic">
							<img src="{{ asset('gentellela/images/user.png') }}" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Selamat Datang,</span>
							<h2>{{ ucwords(Auth::user()->name) }}</h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>&nbsp;</h3>
							<ul class="nav side-menu">
								<li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Home </a></li>
								@can('master_data')
								<li><a><i class="fa fa-database"></i> Master Data <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										@can('siswa_read')
										<li><a href="{{ route('siswa.index') }}">Data Siswa</a></li>
										@endcan
										@can('user_read')
										{{--<li><a href="#">Data User</a></li>--}}
										@endcan
										@can('jadwal_read')
										{{--<li><a href="#">Jadwal Pendaftaran</a></li>--}}
										@endcan
									</ul>
								</li>
								@endcan
								@can('pendaftaran')
								<li><a><i class="fa fa-tasks"></i> Pendaftaran <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										@can('informasi_siswa')
										<li><a href="{{ route('siswa.show', Auth::user()->person_id) }}">Informasi Siswa</a></li>
										@endcan
										@can('daftar_pmb')
										<li><a href="{{ route('pendaftaran.index') }}">Daftar PMB</a></li>
										@endcan
										@can('verifikasi_dokumen')
										<li><a href="{{ route('verifikasi-dokumen.index') }}">Verifikasi Dokumen</a></li>
										@endcan
										@can('tes_tulis')
										<li><a href="{{ route('tes-tulis.index') }}">Tes Tulis</a></li>
										@endcan
										@can('tes_wawancara')
										<li><a href="{{ route('tes-wawancara.index') }}">Tes Wawancara</a></li>
										@endcan
										@can('tes_kesehatan')
										<li><a href="{{ route('tes-kesehatan.index') }}">Tes Kesehatan</a></li>
										@endcan
										@can('verifikasi_akhir')
										<li><a href="#">Verifikasi Akhir</a></li>
										@endcan
									</ul>
								</li>
								@endcan
								@can('cms')
								{{--<li><a><i class="fa fa-edit"></i> CMS <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="#">Hubungi Kami</a></li>
										<li><a href="#">Informasi Pendaftaran</a></li>
										<li><a href="#">Brosur PMB</a></li>
										<li><a href="#">Dokumen Persyaratan</a></li>
									</ul>
								</li>--}}
								@endcan
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="{{ asset('gentellela/images/user.png') }}" alt="">{{ ucwords(Auth::user()->name) }}
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li>
										<a href="{{ route('profile') }}">Profile</a>
									</li>
									<li>
										<a href="{{ route('logout') }}"
											onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
											<i class="fa fa-sign-out pull-right"></i> Logout
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			@yield('content')
			<!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					&copy; {{ date('Y') }} POLBANGTAN. All Right Reserved. Template by <a href="https://colorlib.com">Colorlib</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<script type="text/javascript" src="{!!asset('js/app.js')!!}"></script>

	<!-- FastClick -->
	<script src="{{ asset('gentellela/vendors/fastclick/lib/fastclick.js') }}"></script>
	<!-- bootstrap-progressbar -->
	<script src="{{ asset('gentellela/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
	<!-- iCheck -->
	<script src="{{ asset('gentellela/vendors/iCheck/icheck.min.js') }}"></script>

	<!-- Custom Theme Scripts -->
	<script src="{{ asset('gentellela/build/js/custom.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('gentellela/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('gentellela/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('gentellela/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>

	<!-- Select2 -->
	<script src="{{ asset('gentellela/vendors/select2/dist/js/select2.full.min.js') }}"></script>

	<!-- DateJS -->
	<script src="{{ asset('gentellela/vendors/DateJS/build/date.js') }}"></script>

    <!-- Sweet Alert -->
	<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('gentellela/vendors/Chart.js/dist/Chart.min.js') }}"></script>

	<!-- Pages Script -->
	@yield('js')
</body>
</html>
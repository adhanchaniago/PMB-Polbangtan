@extends('layouts.frontend')

@section('content')
<!-- Hero section -->
<section class="hero-section">
	<div class="hero-slider owl-carousel">
		<div class="hs-item set-bg" data-setbg="{{ asset('frontend/img/hero-slider/1.png') }}">
			<div class="hs-text">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="hs-subtitle">Politeknik Pembangunan Pertanian (POLBANGTAN)</div>
							<h2 class="hs-title">Penerimaan Mahasiswa Baru 2018/2019</h2>
							<p class="hs-des">Penerimaan Mahasiswa Baru Politeknik Pembangunan Pertanian (POLBANGTAN) Lingkup Kementerian Pertanian Tahun Akademik 2018/2019</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Hero section end -->

<!-- Counter section  -->
<section class="counter-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-6">
				<div class="big-icon">
					<i class="fa fa-graduation-cap"></i>
				</div>
				<div class="counter-content">
					<h2>Pendaftaran Online</h2>
					<p><i class="fa fa-calendar-o"></i>01-12-2018 s/d 31-12-2018</p>
				</div>
			</div>
			<div class="col-lg-5 col-md-6">
				<div class="counter">
					<div class="counter-item"><h4>20</h4>Days</div>
					<div class="counter-item"><h4>08</h4>Hrs</div>
					<div class="counter-item"><h4>40</h4>Mins</div>
					<div class="counter-item"><h4>56</h4>secs</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Counter section end -->

<!-- Services section -->
<section class="service-section spad">
	<div class="container services">
		<div class="section-title text-center">
			<h3>TATA CARA PENDAFTARAN ONLINE</h3>
		</div>
		<div class="row">
			<div class="col-lg-4 col-sm-6 service-item">
				<div class="service-icon">
					<img src="{{ asset('frontend/img/services-icons/1.png') }}" alt="1">
				</div>
				<div class="service-content">
					<h4>Registrasi Akun</h4>
					<p>Klik menu "registrasi" yang terdaftar pada website pmb.pertanian.go.id</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 service-item">
				<div class="service-icon">
					<img src="{{ asset('frontend/img/services-icons/2.png') }}" alt="1">
				</div>
				<div class="service-content">
					<h4>Aktifasi Akun</h4>
					<p>Setelah melakukan pendaftaran silahkan buka email anda dan klik link verifikasi untuk mengaktifkan akun anda</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 service-item">
				<div class="service-icon">
					<img src="{{ asset('frontend/img/services-icons/3.png') }}" alt="1">
				</div>
				<div class="service-content">
					<h4>Melengkapi Data Pribadi</h4>
					<p>Setelah akun anda aktif, anda dapat login untuk melengkapi data pribadi</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 service-item">
				<div class="service-icon">
					<img src="{{ asset('frontend/img/services-icons/4.png') }}" alt="1">
				</div>
				<div class="service-content">
					<h4>Daftar PMB</h4>
					<p>Daftarkan diri anda sesuai jalur pendaftaran (Tugas Belajar, Undangan, Kerjasama, Umum)</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 service-item">
				<div class="service-icon">
					<img src="{{ asset('frontend/img/services-icons/5.png') }}" alt="1">
				</div>
				<div class="service-content">
					<h4>Pilih Institusi & Jurusan</h4>
					<p>Anda dapat memilih 1 Institusi dan 2 Jurusan yang sesuai dengan minat anda</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 service-item">
				<div class="service-icon">
					<img src="{{ asset('frontend/img/services-icons/6.png') }}" alt="1">
				</div>
				<div class="service-content">
					<h4>Cetak Bukti Pendaftaran</h4>
					<p>Setelah proses pendaftaran dan verifikasi berhasil anda dapat mencetak bukti pendaftaran dan mengikuti tes pada tahap selanjutnya</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Services section end -->

<!-- Enroll section -->
<section class="enroll-section spad set-bg" data-setbg="{{ asset('frontend/img/enroll-bg.png') }}">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="section-title text-white">
					<h3>PROSEDUR PMB POLBANGTAN 2018/2019</h3>
					<!-- <p>Get started with us to explore the exciting</p> -->
				</div>
				<div class="enroll-list text-white">
					<div class="enroll-list-item">
						<span>1</span>
						<h5>Daftar PMB Online</h5>
						<p>Lorem ipsum dolor sitdo amet, consectetur dont adipis elit. Vivamus interdum ultrices augue.</p>
					</div>
					<div class="enroll-list-item">
						<span>2</span>
						<h5>Cetak Bukti Pendaftaran</h5>
						<p>Lorem ipsum dolor sitdo amet, consectetur dont adipis elit. Vivamus interdum ultrices augue.</p>
					</div>
					<div class="enroll-list-item">
						<span>3</span>
						<h5>Mengikuti Tes Tulis</h5>
						<p>Lorem ipsum dolor sitdo amet, consectetur dont adipis elit. Vivamus interdum ultrices augue.</p>
					</div>
					<div class="enroll-list-item">
						<span>4</span>
						<h5>Mengikuti Tes Wawancara</h5>
						<p>Lorem ipsum dolor sitdo amet, consectetur dont adipis elit. Vivamus interdum ultrices augue.</p>
					</div>
					<div class="enroll-list-item">
						<span>5</span>
						<h5>Mengikuti Tes Kesehatan</h5>
						<p>Lorem ipsum dolor sitdo amet, consectetur dont adipis elit. Vivamus interdum ultrices augue.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-6 offset-lg-1 p-lg-0 p-4">
				<img src="{{ asset('frontend/img/alur_pmb.png') }}" alt="">
			</div>
		</div>
	</div>
</section>
<!-- Enroll section end -->

<!-- Blog section -->
<section class="blog-section spad">
	<div class="container">
		<div class="section-title text-center">
			<h3>Informasi Terbaru</h3>
			<!-- <p>Get latest breaking news & top stories today</p> -->
		</div>
		<div class="row">
			<div class="col-xl-6">
				<div class="blog-item">
					<div class="blog-thumb set-bg" data-setbg="{{ asset('frontend/img/blog/1.jpg') }}"></div>
					<div class="blog-content">
						<h4>Parents who try to be their children’s best friends</h4>
						<div class="blog-meta">
							<span><i class="fa fa-calendar-o"></i> 24 Mar 2018</span>
							<span><i class="fa fa-user"></i> Owen Wilson</span>
						</div>
						<p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet. Aenean interdus mid vitae sed accumsan...</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="blog-item">
					<div class="blog-thumb set-bg" data-setbg="{{ asset('frontend/img/blog/2.jpg') }}"></div>
					<div class="blog-content">
						<h4>Graduations could be delayed as external examiners</h4>
						<div class="blog-meta">
							<span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
							<span><i class="fa fa-user"></i> Owen Wilson</span>
						</div>
						<p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet. Aenean interdus mid vitae sed accumsan...</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="blog-item">
					<div class="blog-thumb set-bg" data-setbg="{{ asset('frontend/img/blog/3.jpg') }}"></div>
					<div class="blog-content">
						<h4>Private schools adopt a Ucas style application system</h4>
						<div class="blog-meta">
							<span><i class="fa fa-calendar-o"></i> 24 Mar 2018</span>
							<span><i class="fa fa-user"></i> Owen Wilson</span>
						</div>
						<p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet. Aenean interdus mid vitae sed accumsan...</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="blog-item">
					<div class="blog-thumb set-bg" data-setbg="{{ asset('frontend/img/blog/4.jpg') }}"></div>
					<div class="blog-content">
						<h4>Cambridge digs in at the top of university league table</h4>
						<div class="blog-meta">
							<span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
							<span><i class="fa fa-user"></i> Owen Wilson</span>
						</div>
						<p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet. Aenean interdus mid vitae sed accumsan...</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog section -->
@endsection
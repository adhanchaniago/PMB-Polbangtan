@extends('layouts.frontend')

@section('content')
	<!-- Breadcrumb section -->
	<div class="site-breadcrumb">
		<div class="container">
			
		</div>
	</div>
	<!-- Breadcrumb section end -->


	<!-- Blog page section  -->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post-item post-details">
						<img src="{{ route('viewfile') . '?file=' . $post->thumbnail }}" class="post-thumb-full" alt="">
						<div class="post-content">
							<h3><a href="single-blog.html">{{ $post->judul }}</a></h3>
							<div class="post-meta">
								<span><i class="fa fa-calendar-o"></i> {{ date('d M Y', strtotime($post->updated_at)) }}</span>
								<span><i class="fa fa-user"></i> {{ $post->user->name }}</span>
							</div>
							{!! $post->isi !!}
						</div>
					</div>
				</div>

				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<div class="widget">
						<h5 class="widget-title">Informasi Terkini</h5>
						<div class="recent-post-widget">
							@foreach($posts as $key => $value)
							<div class="rp-item">
								<div class="rp-thumb set-bg" data-setbg="{{ route('viewfile') . '?file=' . $value->thumbnail }}"></div>
								<div class="rp-content">
									<h6>{{ $value->judul }}</h6>
									<p><i class="fa fa-clock-o"></i> {{ date('d M Y', strtotime($value->updated_at)) }}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog page section end -->
@endsection
@extends('layouts.frontend')

@section('content')
<section class="contact-page spad pt-0">
	<div class="container">
		<div class="contact-form spad pb-0">
			<div class="section-title text-center">
				<h3>Informasi Pendaftaran</h3>
			</div>
            {!! $informasi !!}
		</div>
	</div>
</section>
@endsection
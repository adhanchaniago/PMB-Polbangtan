@extends('layouts.frontend')

@section('content')
<section class="contact-page spad pt-0">
	<div class="container">
		<div class="contact-form spad pb-0">
			<div class="section-title text-center">
				<h3>Brosur PMB 2019/2020</h3>
			</div>
            <img src="{{ route('viewfile') . '?file=' . $brosur }}" width="100%" height="auto">
		</div>
	</div>
</section>
@endsection
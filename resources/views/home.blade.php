@extends('layouts.gentellela')

@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Beranda</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		@if ( Auth::user()->person_type != '')
			@include('dashboard.' . Auth::user()->person_type)
		@endif
	</div>
</div>
@endsection
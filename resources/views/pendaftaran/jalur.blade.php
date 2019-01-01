@extends('layouts.gentellela')

@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3></h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			@include('pendaftaran.' . $view)
		</div>
	</div>
</div>
@endsection
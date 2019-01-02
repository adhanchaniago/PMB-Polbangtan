@extends('layouts.gentellela')

@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Pendaftaran Mahasiswa Baru</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			@if ( $access )
				@if ( $data === null )
					@include('pendaftaran.create')
				@else
					@if( $data->state == 'start' )
					<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
						<a class="btn btn-app" href="{{ route('pilih-jalur') }}">
							<i class="fa fa-upload"></i> Upload Berkas
						</a>
					</div>
					@endif

					@include('pendaftaran.show')
				@endif
			@else
				@include('pendaftaran.tolak')
			@endif
		</div>
	</div>
</div>
@endsection

@section('js')
	@if( $errors->any() )
		<script type="text/javascript">
			swal("Tidak dapat menyimpan data", "{{ Html::ul($errors->all()) }}", "error");
		</script>
	@endif
	@if( Session::has('error') )
		<script type="text/javascript">
			swal("Pendaftaran Gagal", "{!! Session::get('error') !!}", "error");
		</script>
	@endif
@endsection
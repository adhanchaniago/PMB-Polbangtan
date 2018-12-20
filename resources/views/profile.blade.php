@extends('layouts.gentellela')

@section('content')
<div class="right_col" role="main">
    <div class="row">
      	<div class="col-md-12 col-sm-12 col-xs-12">
      		<div class="row">
      			<div class="col-md-12 col-sm-12 col-xs-12 text-right">
	      			<button class="btn btn-app" onclick="submitform()"><i class="fa fa-save"></i> Simpan</button>
	      		</div>
      		</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Profile</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<form action="{{ route('profile.update', $data->id) }}" id="form_profile" method="post" class="form-horizontal">
								{{ csrf_field() }}

								<input type="hidden" name="_method" value="put">

								<div class="form-group">
									<label class="control-label col-sm-3">Email</label>
									<div class="col-sm-9">
										<input type="email" id="email" class="form-control" value="{{ $data->email }}" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Password</label>
									<div class="col-sm-9">
										<input type="password" id="password" required class="form-control" name="password">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Konfirmasi Password</label>
									<div class="col-sm-9">
										<input type="password" id="password_confirmation" required class="form-control" name="password_confirmation">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
	@if( Session::has('success') )
		<script type="text/javascript">
			swal("Berhasil", "{{ Session::get('success') }}", "success");
		</script>
	@endif
	@if( $errors->any() )
		<script type="text/javascript">
			swal("Tidak dapat menyimpan data", "{{ Html::ul($errors->all()) }}", "error");
		</script>
	@endif

	<script type="text/javascript">
		function submitform() {
			$("#form_profile").submit();
		}
	</script>
@endsection
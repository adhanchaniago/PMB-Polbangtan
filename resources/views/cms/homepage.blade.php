@extends('layouts.gentellela')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
		<form id="form_update" method="post" action="{{ route('cms.store') }}" class="form-horizontal form-label-left">
			{{ csrf_field() }}

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 text-right">
						<button class="btn btn-app"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Pengaturan Konten Homepage</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="dashboard-widget-content">
								<div class="col-md-12 hidden-small">
									<div class="form-group">
		                    			<label class="control-label col-sm-2">Judul</label>
		                    			<div class="col-sm-9">
		                        			<input type="text" id="judul" class="form-control" name="konten[judul]" value="{{ $judul }}">
		                    			</div>
		                			</div>
									<div class="form-group">
		                    			<label class="control-label col-sm-2">Sub Judul</label>
		                    			<div class="col-sm-9">
		                        			<input type="text" id="sub_judul" class="form-control" name="konten[sub-judul]" value="{{ $sub }}">
		                    			</div>
		                			</div>
									<div class="form-group">
		                    			<label class="control-label col-sm-2">Deskripsi</label>
		                    			<div class="col-sm-9">
		                        			<input type="text" id="deskripsi" class="form-control" name="konten[deskripsi]" value="{{ $deskripsi }}">
		                    			</div>
		                			</div>
									<div class="form-group">
		                    			<label class="control-label col-sm-2">Tanggal Countdown</label>
		                    			<div class="col-sm-9">
		                        			<input type="date" id="countdown" class="form-control" name="konten[countdown]" value="{{ $countdown }}">
		                    			</div>
		                			</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Informasi Kontak</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="dashboard-widget-content">
								<div class="col-md-12 hidden-small">
									<div class="form-group">
		                    			<label class="control-label col-sm-2">Alamat</label>
		                    			<div class="col-sm-9">
		                        			<input type="text" id="alamat" class="form-control" name="konten[alamat]" value="{{ $alamat }}">
		                    			</div>
		                			</div>
									<div class="form-group">
		                    			<label class="control-label col-sm-2">No. Telepon</label>
		                    			<div class="col-sm-9">
		                        			<input type="text" id="no_telepon" class="form-control" name="konten[no-telepon]" value="{{ $telepon }}">
		                    			</div>
		                			</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
<!-- /page content -->
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
@endsection
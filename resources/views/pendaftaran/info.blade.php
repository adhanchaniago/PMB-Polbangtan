<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Informasi Pendaftaran</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
            @include('pendaftaran.notifikasi')

			<form id="informasi_pendaftaran" class="form-horizontal form-label-left" action="{{ route('pendaftaran.destroy', $data->id) }}" method="post">
				<input type="hidden" name="_method" value="DELETE">

				{{ @csrf_field() }}

				<div class="form-group">
					<label class="control-label col-sm-2">Jalur Pendaftaran</label>
					<div class="col-sm-9">
						<input type="text" id="nama" class="form-control" value="{{ $data->jalur_label }}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Tanggal Mendaftar</label>
					<div class="col-sm-9">
						<input type="text" id="nama" class="form-control" value="{{ $data->created_at }}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Status</label>
					<div class="col-sm-9">
						<input type="text" id="nama" class="form-control" value="{{ ucwords(str_replace('_', ' ', $data->state)) }}" readonly>
					</div>
				</div>
				@if($data->state == 'start' ||
					$data->state == 'pemilihan_jurusan' ||
					$data->state == 'review_pendaftaran')
				<div class="form-group">
					<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
						<button type="submit" class="btn btn-danger">Batalkan Pendaftaran</button>
					</div>
				</div>
				@endif
			</form>
		</div>
	</div>
</div>
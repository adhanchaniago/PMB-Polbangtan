<form action="{{ route('store-jalur') }}" id="form-umum" method="post" class="form-horizontal" enctype="multipart/form-data">
	{{ csrf_field() }}
	
	<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
		<button type="submit" class="btn btn-app">
			<i class="fa fa-save"></i> Simpan
		</button>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ $title }}</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="form-group">
					<label class="control-label col-sm-5">Formulir Pendaftaran*</label>
					<div class="col-sm-7">
						<input type="file" id="nama" class="form-control" name="formulir_pendaftaran" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengunduh berkas sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form1a.png' }}" target="_blank">Download Berkas</a></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Scan SK PNS*</label>
					<div class="col-sm-7">
						<input type="file" id="nama" class="form-control" name="sk_pns" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengupload SK PNS di sini</a></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Surat Rekomendasi dari Pejabat Yang Berwenang atau Badan Kepegawaian Daerah*</label>
					<div class="col-sm-7">
						<input type="file" id="nama" class="form-control" name="surat_rekomendasi" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengunduh berkas sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form4.png' }}" target="_blank">Download Berkas</a></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Surat Perjanjian Tugas Belajar Dalam Negeri Pegawai Lingkup Pertanian*</label>
					<div class="col-sm-7">
						<input type="file" id="nama" class="form-control" name="surat_perjanjian" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengunduh berkas sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form5.pdf' }}" target="_blank">Download Berkas</a></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Daftar Riwayat Hidup Calon Mahasiswa Tugas Belajar*</label>
					<div class="col-sm-7">
						<input type="file" id="nama" class="form-control" name="riwayat_hidup" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengunduh berkas sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form6.png' }}" target="_blank">Download Berkas</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
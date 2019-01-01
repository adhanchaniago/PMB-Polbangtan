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
						<p>Silahkan mengunduh berkas sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form1b.png' }}" target="_blank">Download Berkas</a></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Surat Rekomendasi atau Usulan Kepala Sekolah*</label>
					<div class="col-sm-7">
						<input type="file" id="nama" class="form-control" name="surat_rekomendasi" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengunduh berkas sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form4.png' }}" target="_blank">Download Berkas</a></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Nilai Rata-Rata Raport*</label>
					<div class="col-sm-3">
						<input type="number" id="rata_rata_ganjil" class="form-control" name="rata_rata_ganjil" required>
					</div>
					<div class="col-sm-3">
						<input type="number" id="rata_rata_genap" class="form-control" name="rata_rata_genap" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Scan Nilai Raport*</label>
					<div class="col-sm-7">
						<input type="file" id="nama" class="form-control" name="raport" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengupload nilai raport di sini</p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Piagam / Sertifikat*</label>
					<div class="col-sm-7">
						<input type="file" id="nama" class="form-control" name="piagam" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengupload piagam /sertifikat di sini. Jika memiliki lebih dari 1 (satu) sertifikat silahkan kumpulkan dalam 1 dokumen pdf</p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Surat Pernyataan Tidak Menikah Selama Pendidikan*</label>
					<div class="col-sm-7">
						<input type="file" id="nama" class="form-control" name="sp_menikah" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengunduh berkas sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form7.png' }}" target="_blank">Download Berkas</a></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-5">Surat Pernyataan Tidak Menuntut Diangkat PNS*</label>
					<div class="col-sm-7">
						<input type="file" id="file" class="form-control" name="sp_pns" accept=".jpg,.jpeg,.png,application/pdf" required>
						<p>Silahkan mengunduh berkas sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form9.png' }}" target="_blank">Download Berkas</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
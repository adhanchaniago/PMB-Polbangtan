<div class="row">
	<div class="col-md-7">
		<div class="x_panel">
			<div class="x_title">
				<h2>Resume Pendaftar</h2>
              	<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-striped table-bordered">
					<tr>
						<td>Nama Siswa</td>
						<td>{{ $data->nama }}</td>
					</tr>
					<tr>
						<td>NISN</td>
						<td>{{ $data->nisn }}</td>
					</tr>
					<tr>
						<td>Sekolah</td>
						<td>{{ $data->nama_sekolah }}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>{{ $data->alamat_sekolah }}</td>
					</tr>
					<tr>
						<td>Tahun Lulus</td>
						<td>{{ $data->tahun_lulus }}</td>
					</tr>
				</table>

				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<td colspan="2">Status Pendaftaran</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Finalisasi</td>
							<td>
								@if ( !$kelengkapan )
									<a href="{{ route('siswa.show', $data->id) }}">Cek kelengkapan data dan berkas dokumen pendaftaran</a>
								@else
									@if ( $state == '' )
										<a href="{{ route('pendaftaran.index') }}">Anda belum mendaftar, silahkan lakukan pendaftaran.</a>
									@else
										{{ $state }}
									@endif
								@endif
							</td>
						</tr>
						<tr>
							<td>Nomor Pendaftaran</td>
							<td>{{ $pendaftaran->no_pendaftaran ?? '-' }}</td>
						</tr>
						@if( $pendaftaran !== null)
						<tr>
							<td colspan="2">
								<a href="{{ route('siswa.kartu') }}" class="btn btn-success" target="_blank">
									Unduh Kartu Peserta
								</a>
							</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="x_panel">
			<div class="x_title">
				<h2>Jadwal Pendaftaran</h2>
              	<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<ul class="list-unstyled timeline">
					@foreach($jadwal as $key => $value)
					<li>
                        <div class="tags">
                        </div>
						<div class="block">
							<div class="block_content">
								<h2 class="title">
									@if ($value->tanggal_awal == $value->tanggal_akhir)
										<a>{{ date('d M Y', strtotime($value->tanggal_awal)) }}</a>
									@else
										<a>{{ date('d M Y', strtotime($value->tanggal_awal)) }} - {{ date('d M Y', strtotime($value->tanggal_akhir)) }}</a>
									@endif
								</h2>
								<p class="excerpt">{{ $value->nama }}</p>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
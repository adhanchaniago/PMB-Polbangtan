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

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Daftar Prestasi</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
					  			<button class="btn btn-success"
					  				data-toggle="modal"
					  				data-target="#modal_add">
					  				<i class="fa fa-plus"></i> Tambah
					  			</button>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="datatable-fixed-header" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Tahun</th>
									<th>Tingkat</th>
									<th>Kepesertaan</th>
									<th>Prestasi</th>
									<th width="120px">Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach( $prestasi as $key => $value )
								<tr>
									<td>{{ $value->nama }}</td>
									<td>{{ $value->tahun }}</td>
									<td>{{ $value->tingkat }}</td>
									<td>{{ $value->kepesertaan }}</td>
									<td>{{ $value->prestasi }}</td>
									<td>
										<form method="post" action="{{ route('prestasi.destroy', $value->id) }}">
											{{ csrf_field() }}

											<input type="hidden" name="_method" value="DELETE">

                            				<button type="button"
                            					class="btn btn-warning"
					  							data-toggle="modal"
					  							data-target="#modal_update"
												data-url="{{ route('prestasi.update', $value->id) }}"
					  							data-id="{{ $value->id }}"
					  							data-bidang="{{ $value->bidang }}"
					  							data-nama="{{ $value->nama }}"
					  							data-tahun="{{ $value->tahun }}"
					  							data-tingkat="{{ $value->tingkat }}"
					  							data-kepesertaan="{{ $value->kepesertaan }}"
					  							data-prestasi="{{ $value->prestasi }}">
				  								<i class="fa fa-pencil"></i>
					  						</button>

					  						<button type="submit" class="btn btn-danger">
					  							<i class="fa fa-trash"></i>
					  						</button>
										</form>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modal_add" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <form action="{{ route('prestasi.store') }}" id="form_add" method="post" class="modal-content">
        	{{ csrf_field() }}

            <div class="modal-header bg-primary-600">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Prestasi</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-3">Bidang Prestasi*</label>
                    <div class="col-sm-9">
                    	<select id="bidang_add" class="form-control" name="bidang">
                    		<option value="Science & Teknologi">Science & Teknologi</option>
                    		<option value="Olah Raga">Olah Raga</option>
                    		<option value="Seni">Seni</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama Prestasi*</label>
                    <div class="col-sm-9">
                    	<input id="nama_add" type="text" class="form-control" name="nama" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tahun*</label>
                    <div class="col-sm-9">
                    	<input id="tahun_add" type="text" class="form-control" name="tahun" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tingkat*</label>
                    <div class="col-sm-9">
                    	<select id="tingkat_add" class="form-control" name="tingkat">
                    		<option value="Sekolah">Sekolah</option>
                    		<option value="Kecamatan">Kecamatan</option>
                    		<option value="Kabupaten">Kabupaten</option>
                    		<option value="Provinsi">Provinsi</option>
                    		<option value="Nasional">Nasional</option>
                    		<option value="Internasional">Internasional</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kepesertaan*</label>
                    <div class="col-sm-9">
                    	<select id="kepesertaan_add" class="form-control" name="kepesertaan">
                    		<option value="Perorangan">Perorangan</option>
                    		<option value="Beregu">Beregu</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Prestasi*</label>
                    <div class="col-sm-9">
                    	<select id="prestasi_add" class="form-control" name="prestasi">
                    		<option value="Juara 1">Juara 1</option>
                    		<option value="Juara 2">Juara 2</option>
                    		<option value="Juara 3">Juara 3</option>
                    		<option value="Harapan 1">Harapan 1</option>
                    		<option value="Harapan 2">Harapan 2</option>
                    	</select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><b><i class="fa fa-close"></i></b> Batal</button>
                <button type="submit" class="btn btn-success"><b><i class="fa fa-save"></i></b> Simpan</button>
            </div>
        </form>
    </div>
</div>

<div id="modal_update" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
		<form action="" id="form_update" method="post" class="modal-content">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="put">

            <div class="modal-header bg-primary-600">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Prestasi</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-3">Bidang Prestasi*</label>
                    <div class="col-sm-9">
                    	<select id="bidang_update" class="form-control" name="bidang">
                    		<option value="Science & Teknologi">Science & Teknologi</option>
                    		<option value="Olah Raga">Olah Raga</option>
                    		<option value="Seni">Seni</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama Prestasi*</label>
                    <div class="col-sm-9">
                    	<input id="nama_update" type="text" class="form-control" name="nama" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tahun*</label>
                    <div class="col-sm-9">
                    	<input id="tahun_update" type="text" class="form-control" name="tahun" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tingkat*</label>
                    <div class="col-sm-9">
                    	<select id="tingkat_update" class="form-control" name="tingkat">
                    		<option value="Sekolah">Sekolah</option>
                    		<option value="Kecamatan">Kecamatan</option>
                    		<option value="Kabupaten">Kabupaten</option>
                    		<option value="Provinsi">Provinsi</option>
                    		<option value="Nasional">Nasional</option>
                    		<option value="Internasional">Internasional</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kepesertaan*</label>
                    <div class="col-sm-9">
                    	<select id="kepesertaan_update" class="form-control" name="kepesertaan">
                    		<option value="Perorangan">Perorangan</option>
                    		<option value="Beregu">Beregu</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Prestasi*</label>
                    <div class="col-sm-9">
                    	<select id="prestasi_update" class="form-control" name="prestasi">
                    		<option value="Juara 1">Juara 1</option>
                    		<option value="Juara 2">Juara 2</option>
                    		<option value="Juara 3">Juara 3</option>
                    		<option value="Harapan 1">Harapan 1</option>
                    		<option value="Harapan 2">Harapan 2</option>
                    	</select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><b><i class="fa fa-close"></i></b> Batal</button>
                <button type="submit" class="btn btn-success"><b><i class="fa fa-save"></i></b> Simpan</button>
            </div>
        </form>
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
		$('#modal_update').on('show.bs.modal', function(e){
			$("#form_update").prop('action', $(e.relatedTarget).data('url'));
			$("#bidang_update").val($(e.relatedTarget).data('bidang'));
			$("#nama_update").val($(e.relatedTarget).data('nama'));
			$("#tahun_update").val($(e.relatedTarget).data('tahun'));
			$("#tingkat_update").val($(e.relatedTarget).data('tingkat'));
			$("#kepesertaan_update").val($(e.relatedTarget).data('kepesertaan'));
			$("#prestasi_update").val($(e.relatedTarget).data('prestasi'));
		});		
	</script>
@endsection
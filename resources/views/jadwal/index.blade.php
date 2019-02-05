@extends('layouts.gentellela')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-right">
					<button
					class="btn btn-app"
					data-toggle="modal"
					data-target="#modal_add">
					<i class="fa fa-plus"></i> Tambah
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Daftar Jadwal</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="dashboard-widget-content">
							<div class="col-md-12 hidden-small">
								<table id="datatable-fixed-header" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Tanggal Awal</th>
											<th>Tanggal Akhir</th>
											<th width="100px">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $key => $value)
										<tr>
											<td>{{ $value->nama }}</td>
											<td>{{ $value->tanggal_awal }}</td>
											<td>{{ $value->tanggal_akhir }}</td>
											<td>
												<a
	  											class="btn btn-default"
												title="Ubah Data"
												data-toggle="modal"
												data-target="#modal_update"
												data-url="{{ route('jadwal.update', $value->id) }}"
												data-nama="{{ $value->nama }}"
												data-awal="{{ $value->tanggal_awal }}"
												data-akhir="{{ $value->tanggal_akhir }}">
													<i class="fa fa-edit"></i>
												</a>
												<a
	  											href="{{ route('jadwal.destroy', $value->id) }}"
	  											class="btn btn-danger helper"
	  											title="Hapus Data"
	  											data-method="delete"
	  											data-id="{{ $value->id }}"
	  											data-token="{{ csrf_token() }}">
	  												<i class="fa fa-trash" ></i>
	  											</a>
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
	</div>
</div>
</div>

<div id="modal_add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<form action="{{ route('jadwal.store') }}" id="form_add" method="post" class="modal-content">
			{{ csrf_field() }}

			<div class="modal-header bg-primary-600">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Jadwal Baru</h4>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Keterangan*</label>
					<div class="col-sm-9">
						<input type="text" id="nama_add" required class="form-control" name="nama" value="{{ old('nama') }}">
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Tanggal Awal*</label>
					<div class="col-sm-9">
						<input type="date" id="tanggal_awal_add" required class="form-control" name="tanggal_awal" value="{{ old('tanggal_awal') }}">
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Tanggal Akhir*</label>
					<div class="col-sm-9">
						<input type="date" id="tanggal_akhir_add" required class="form-control" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><b><i class="fa fa-close"></b></i> Batal</button>
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
				<h4 class="modal-title">Perubahan Jadwal</h4>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Keterangan*</label>
					<div class="col-sm-9">
						<input type="text" id="nama_update" required class="form-control" name="nama">
					</div>
				</div>
				<div class="modal-body form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-3">Tanggal Awal*</label>
						<div class="col-sm-9">
							<input type="date" id="tanggal_awal_update" required class="form-control" name="tanggal_awal">
						</div>
					</div>
				</div>
				<div class="modal-body form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-3">Tanggal Akhir*</label>
						<div class="col-sm-9">
							<input type="date" id="tanggal_akhir_update" required class="form-control" name="tanggal_akhir">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><b><i class="fa fa-close"></b></i> Batal</button>
				<button type="submit" class="btn btn-success"><b><i class="fa fa-save"></i></b> Simpan</button>
			</div>
		</form>
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

</script>
<script>
	$(document).ready(function(){
		$('#datatable-fixed-header').DataTable({
			fixedHeader: true,
			ordering: false
		});
        $.ajax({
            url: "{{ asset('js/helper.js') }}", dataType: "script",
        });
	});

	$('#modal_update').on('show.bs.modal', function(e){
		$("#form_update").prop('action', $(e.relatedTarget).data('url'));
		$("#nama_update").val($(e.relatedTarget).data('nama'));
		$("#tanggal_awal_update").val($(e.relatedTarget).data('awal'));
		$("#tanggal_akhir_update").val($(e.relatedTarget).data('akhir'));
	});

</script>
@endsection
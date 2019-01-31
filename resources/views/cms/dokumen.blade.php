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
						<h2>Daftar Dokumen Persyaratan PMB</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="dashboard-widget-content">
							<div class="col-md-12 hidden-small">
								<table id="datatable-fixed-header" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Nama</th>
											<th width="40px">Lihat</th>
											<th width="40px">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($dokumen as $key => $value)
										<tr>
											<td>{{ $value->dokumen['nama'] }}</td>
											<td><a class="btn btn-default" href="{{ route('viewfile') . '?file=' . $value->dokumen['file'] }}" target="_blank"><i class="fa fa-search"></i></td>
											<td>
												<a
	  											href="{{ route('cms.destroy', $value->id) }}"
	  											class="btn btn-danger helper"
	  											title="Hapus Dokumen"
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
		<form action="{{ route('cms.store') }}" id="form_add" method="post" class="modal-content" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="modal-header bg-primary-600">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload Dokumen</h4>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Nama Dokumen</label>
					<div class="col-sm-9">
						<input type="text" id="nama_add" class="form-control" name="konten[dokumen-pmb][nama]" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">File Dokumen</label>
					<div class="col-sm-9">
						<input type="file" id="file_add" class="form-control" name="konten[dokumen-pmb][file]" required>
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
			fixedHeader: true
		});
        $.ajax({
            url: "{{ asset('js/helper.js') }}", dataType: "script",
        });

		var handleDataTableButtons = function() {
			if ($("#datatable-buttons").length) {
				$("#datatable-buttons").DataTable({
					dom: "Bfrtip",
					buttons: [
					{
						extend: "csv",
						className: "btn-sm"
					},
					{
						extend: "excel",
						className: "btn-sm"
					},
					{
						extend: "pdf",
						className: "btn-sm"
					},
					],
					responsive: true
				});
			}
		};

		TableManageButtons = function() {
			"use strict";
			return {
				init: function() {
					handleDataTableButtons();
				}
			};
		}();

		TableManageButtons.init();
	});
</script>
@endsection
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
						<h2>Daftar User</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="dashboard-widget-content">
							<div class="col-md-12 hidden-small">
								<table id="datatable-fixed-header" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Email</th>
											<th>Institusi</th>
											<th width="60px">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $key => $value)
										<tr>
											<td>{{ $value->nama }}</td>
											<td>{{ $value->user->email }}</td>
											<td>{{ $value->minstitusi->nama }}</td>
											<td>
												<a
	  											class="btn btn-default"
												title="Ubah Data"
												data-toggle="modal"
												data-target="#modal_update"
												data-url="{{ route('pegawai.update', $value->id) }}"
												data-nama="{{ $value->nama }}">
													<i class="fa fa-edit"></i>
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
		<form action="{{ route('pegawai.store') }}" id="form_add" method="post" class="modal-content">
			{{ csrf_field() }}

			<div class="modal-header bg-primary-600">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">User Baru</h4>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Nama*</label>
					<div class="col-sm-9">
						<input type="text" id="nama_add" required class="form-control" name="nama" value="{{ old('name') }}">
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Institusi*</label>
					<div class="col-sm-9">
						<select id="institusi_add" class="form-control" name="institusi">
							@foreach($institusi as $key => $value)
								<option value="{{ $value->id }}">{{ $value->nama }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Email*</label>
					<div class="col-sm-9">
						<input type="email" id="email_add" required class="form-control" name="email" value="{{ old('email') }}">
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Password*</label>
					<div class="col-sm-9">
						<input type="password" id="password_add" required class="form-control" name="password">
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Konfirmasi Password*</label>
					<div class="col-sm-9">
						<input type="password" id="password_confirmation_add" required class="form-control" name="password_confirmation">
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
				<h4 class="modal-title">Perubahan Data User</h4>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Nama*</label>
					<div class="col-sm-9">
						<input type="text" id="nama_update" required class="form-control" name="nama">
					</div>
				</div>
				<div class="modal-body form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-3">Institusi*</label>
						<div class="col-sm-9">
							<select id="institusi_add" class="form-control" name="institusi">
								@foreach($institusi as $key => $value)
									<option value="{{ $value->id }}">{{ $value->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="modal-body form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-3">Email*</label>
						<div class="col-sm-9">
							<input type="email" id="email_add" required class="form-control" name="email">
						</div>
					</div>
				</div>
				<div class="modal-body form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-3">Password*</label>
						<div class="col-sm-9">
							<input type="password" id="password_add" required class="form-control" name="password">
						</div>
					</div>
				</div>
				<div class="modal-body form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-3">Konfirmasi Password*</label>
						<div class="col-sm-9">
							<input type="password" id="password_confirmation_add" required class="form-control" name="password_confirmation">
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

	$('#modal_update').on('show.bs.modal', function(e){
		$("#form_update").prop('action', $(e.relatedTarget).data('url'));
		$("#nama_update").val($(e.relatedTarget).data('nama'));
	});

</script>
<!-- /Doughnut Chart -->
@endsection
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
						<h2>Berita</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="dashboard-widget-content">
							<div class="col-md-12 hidden-small">
								<table id="datatable-fixed-header" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Judul</th>
											<th>Ringkasan</th>
											<th>Last Updated</th>
											<th>State</th>
											<th width="60px">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $key => $value)
										<tr>
											<td>{{ $value->judul }}</td>
											<td>{{ $value->ringkasan }}</td>
											<td>{{ $value->updated_at }}</td>
											<td>{{ $value->state }}</td>
											<td>
												<a
	  											class="btn btn-default"
												title="Ubah Data"
												data-toggle="modal"
												data-target="#modal_update"
												data-url="{{ route('post.update', $value->id) }}"
												data-judul="{{ $value->judul }}"
												data-thumbnail="{{ $value->thumbnail }}"
												data-ringkasan="{{ $value->ringkasan }}"
												data-isi="{{ $value->isi }}"
												data-state="{{ $value->state }}">
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
		<form action="{{ route('post.store') }}" id="form_add" method="post" class="modal-content" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="modal-header bg-primary-600">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Berita Baru</h4>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Judul*</label>
					<div class="col-sm-9">
						<input type="text" id="judul_add" class="form-control" name="judul" value="{{ old('judul') }}" required>
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Thumbnail*</label>
					<div class="col-sm-9">
						<input type="file" id="thumbnail_add" class="form-control" name="thumbnail">
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Ringkasan*</label>
					<div class="col-sm-9">
						<textarea id="ringkasan_add" class="form-control" name="ringkasan" rows="3" required></textarea>
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Isi*</label>
					<div class="col-sm-9">
						<textarea id="isi_add" class="wysiwyg" name="isi" required></textarea>
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">State*</label>
					<div class="col-sm-9">
						<select id="state_add" class="form-control" name="state">
							<option value="draft">Draft</option>
							<option value="publish">Publish</option>
							<option value="deleted">Deleted</option>
						</select>
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
				<h4 class="modal-title">Perubahan Berita</h4>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Judul*</label>
					<div class="col-sm-9">
						<input type="text" id="judul_update" class="form-control" name="judul" required>
					</div>
				</div>
				<div class="modal-body form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-3">Thumbnail*</label>
						<div class="col-sm-9">
							<input type="file" id="thumbnail_update" class="form-control" name="thumbnail">
						</div>
					</div>
				</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Ringkasan*</label>
					<div class="col-sm-9">
						<textarea id="ringkasan_update" class="form-control" name="ringkasan" rows="3" required></textarea>
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">Isi*</label>
					<div class="col-sm-9">
						<textarea id="isi_update" class="wysiwyg" name="isi" required></textarea>
					</div>
				</div>
			</div>
			<div class="modal-body form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-3">State*</label>
					<div class="col-sm-9">
						<select id="state_update" class="form-control" name="state">
							<option value="draft">Draft</option>
							<option value="publish">Publish</option>
							<option value="deleted">Deleted</option>
						</select>
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
	<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>

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

	<script>
		$(document).ready(function(){
			$('#datatable-fixed-header').DataTable({
				fixedHeader: true
			});

	    	$('.wysiwyg').ckeditor({
	    		filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    			filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + $("input[name=_token]").val(),
    			filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
	    		filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + $("input[name=_token]").val()
	    	});
		});

		$('#modal_update').on('show.bs.modal', function(e){
			$("#form_update").prop('action', $(e.relatedTarget).data('url'));
			$("#judul_update").val($(e.relatedTarget).data('judul'));
			// $("#thumbnail_update").val($(e.relatedTarget).data('thumbnail'));
			$("#ringkasan_update").val($(e.relatedTarget).data('ringkasan'));
			$("#isi_update").val($(e.relatedTarget).data('isi'));
			$("#state_update").val($(e.relatedTarget).data('state'));
		});

	</script>
@endsection
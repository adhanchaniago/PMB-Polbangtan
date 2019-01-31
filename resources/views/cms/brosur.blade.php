@extends('layouts.gentellela')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
		<form id="form_update" method="post" action="{{ route('cms.store') }}" class="form-horizontal form-label-left" enctype="multipart/form-data">
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
							<h2>Brosur PMB</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="dashboard-widget-content">
								<div class="col-md-12 hidden-small">
									<div class="form-group">
		                    			<label class="control-label col-sm-2">Upload Brosur</label>
		                    			<div class="col-sm-9">
		                        			<input type="file" id="brosur" class="form-control" name="konten[brosur-pmb]" required>
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
							<h2>Preview Brosur</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="dashboard-widget-content">
								<div class="col-md-12 hidden-small">
									<img src="{{ route('viewfile') . '?file=' . $brosur }}" width="100%" height="auto">
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
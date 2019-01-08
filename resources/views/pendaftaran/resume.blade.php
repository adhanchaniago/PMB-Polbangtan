@extends('layouts.gentellela')

@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Resume Pendaftaran</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Informasi Pendaftaran</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form id="informasi_pendaftaran" class="form-horizontal form-label-left">
							<div class="form-group">
								<label class="control-label col-sm-2">Jalur Pendaftaran</label>
								<div class="col-sm-9">
									<input type="text" id="jalur" class="form-control" value="{{ $pendaftaran->jalur_label }}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Tanggal Mendaftar</label>
								<div class="col-sm-9">
									<input type="text" id="tanggal" class="form-control" value="{{ $pendaftaran->created_at }}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Status</label>
								<div class="col-sm-9">
									<input type="text" id="status" class="form-control" value="{{ ucwords(str_replace('_', ' ', $pendaftaran->state)) }}" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Keterangan</label>
								<div class="col-sm-9">
									<textarea id="keterangan" class="form-control" readonly>
									</textarea>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
	          				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	                			<li role="presentation" class="active">
	                				<a href="#tab_biodata" id="status-tab" role="tab" data-toggle="tab" aria-expanded="true">Biodata Siswa</a>
	                			</li>
	                			<li role="presentation" class="">
	                				<a href="#tab_dokumen" role="tab" id="info-tab" data-toggle="tab" aria-expanded="false">Daftar Dokumen</a>
	                			</li>
	                			<li role="presentation" class="">
	                				<a href="#tab_prestasi" role="tab" id="info-tab" data-toggle="tab" aria-expanded="false">Daftar Prestasi</a>
	                			</li>
							</ul>
	          				<div id="myTabContent" class="tab-content">
	            				<div role="tabpanel" class="tab-pane fade active in" id="tab_biodata" aria-labelledby="status-tab">

	                			</div>
	                			<div role="tabpanel" class="tab-pane fade" id="tab_dokumen" aria-labelledby="info-tab">

	                			</div>
	                			<div role="tabpanel" class="tab-pane fade" id="tab_prestasi" aria-labelledby="info-tab">

	                			</div>
	          				</div>
	        			</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
@endsection
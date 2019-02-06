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
							<h2>Informasi PMB</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="dashboard-widget-content">
								<div class="col-md-12 hidden-small">
									<div class="form-group">
		                    			<div class="col-sm-12">
		                        			<textarea id="wysiwyg" class="wysiwyg" name="konten[informasi-pendaftaran]" required>{!! $informasi !!}</textarea>
		                    			</div>
		                			</div>
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

	<script type="text/javascript">
	    $(document).ready(function(){
	    	$('.wysiwyg').ckeditor({
	    		filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    			filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + $("input[name=_token]").val(),
    			filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
	    		filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + $("input[name=_token]").val()
	    	});

	    	CKEDITOR.editorConfig = function( config ) {
				config.toolbar = [
					{ name: 'document', items: [ 'Source', '-', 'Save', 'Preview', 'Print'] },
					{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
					{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
					'/',
					{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ] },
					{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
					{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
					{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak' ] },
					'/',
					{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
					{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
					{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
					{ name: 'about', items: [ 'About' ] }
				];
			};			
	    });
	</script>
@endsection
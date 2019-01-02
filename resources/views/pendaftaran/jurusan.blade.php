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
			<form action="{{ route('store-jurusan') }}" id="form-umum" method="post" class="form-horizontal">
				{{ csrf_field() }}
				
				<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
					<button type="submit" class="btn btn-app">
						<i class="fa fa-save"></i> Simpan
					</button>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Pemilihan Institusi dan Jurusan</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="form-group">
								<label class="control-label col-sm-2">Institusi</label>
								<div class="col-sm-9">
									<select class="form-control" name="institusi" id="institusi">
									@foreach( $institusi as $key => $value)
										<option value="{{ $value->id }}">{{ $value->nama }}</option>
									@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Jurusan 1</label>
								<div class="col-sm-9">
									<select class="form-control" name="jurusan_1" id="jurusan_1">
									@foreach( $jurusan as $key => $value)
										<option value="{{ $value->id }}">{{ $value->nama }}</option>
									@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Jurusan 2</label>
								<div class="col-sm-9">
									<select class="form-control" name="jurusan_2" id="jurusan_2">
									@foreach( $jurusan as $key => $value)
										<option value="{{ $value->id }}">{{ $value->nama }}</option>
									@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$( "#institusi" ).change(function() {
		var url = "{{ route('institusi.jurusan', 'replace-this') }}";
    	url = url.replace('replace-this', this.value);

  		$.ajax({
            type : 'get',
            url: url,
            success: function(data){
                console.log(data);

            	$('#jurusan_1').find('option').remove().end();
            	$('#jurusan_2').find('option').remove().end();

            	$.each(data, function( index, value ) {
	                var option = $('<option>').attr({
	                    value: value.id,
	                    id: value.id,
	                }).text(value.nama);

	                $('#jurusan_1').append(option);
				});
            	$.each(data, function( index, value ) {
	                var option = $('<option>').attr({
	                    value: value.id,
	                    id: value.id,
	                }).text(value.nama);

	                $('#jurusan_2').append(option);
				});
            }
        });
	});
</script>
@endsection
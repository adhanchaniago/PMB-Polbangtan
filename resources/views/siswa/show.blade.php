@extends('layouts.gentellela')

@section('content')
<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Memeriksa Data NISN</h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%; height: 40px">
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Data Siswa</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			@if (Auth::user()->person_type == 'siswa')
			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
				<button type="button" id="button_edit" class="btn btn-app" onclick="enable_input()">
					<i class="fa fa-edit"></i> Edit
				</button>
				<button type="button" id="button_batal" class="btn btn-app" onclick="disable_input()" style="display: none">
					<i class="fa fa-undo"></i> Batal
				</button>
				<button type="submit" id="button_simpan" class="btn btn-app" onclick="submitform()" disabled="true">
					<i class="fa fa-save"></i> Simpan
				</button>
			</div>
			@endif

			{{ Form::model($data, array('route' => array('siswa.update', $data->id), 'id' => 'form_siswa', 'method' => 'PUT', 'class' => 'form-horizontal form-label-left', 'enctype' => 'multipart/form-data')) }}

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Informasi siswa</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="form-group {{ $errors->has('nisn') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">NISN*</label>
								<div class="col-sm-9">
									{{ Form::text('nisn', Input::old('nisn'), array('id' => 'nisn', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('nisn'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('nisn') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>							
							<div class="form-group">
								<label class="control-label col-sm-2">Nama Lengkap*</label>
								<div class="col-sm-9">
									{{ Form::text('nama', Input::old('nama'), array('id' => 'nama', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('nama'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('nama') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>							
							<div class="form-group {{ $errors->has('alamat') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Alamat*</label>
								<div class="col-sm-9">
									{{ Form::text('alamat', Input::old('alamat'), array('id' => 'alamat', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('alamat'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('alamat') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>							
							<div class="form-group {{ $errors->has('kelurahan') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Kelurahan*</label>
								<div class="col-sm-9">
									{{ Form::text('kelurahan', Input::old('kelurahan'), array('id' => 'kelurahan', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('kelurahan'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('kelurahan') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>							
							<div class="form-group {{ $errors->has('kecamatan') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Kecamatan*</label>
								<div class="col-sm-9">
									{{ Form::text('kecamatan', Input::old('kecamatan'), array('id' => 'kecamatan', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('kecamatan'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('kecamatan') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>							
							<div class="form-group {{ $errors->has('kota') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Kota*</label>
								<div class="col-sm-9">
									{{ Form::text('kota', Input::old('kota'), array('id' => 'kota', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('kota'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('kota') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('provinsi') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Provinsi*</label>
								<div class="col-sm-9">
									{{ Form::text('provinsi', Input::old('provinsi'), array('id' => 'provinsi', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('provinsi'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('provinsi') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Kode Pos</label>
								<div class="col-sm-9">
									{{ Form::text('kode_pos', Input::old('kode_pos'), array('id' => 'kode_pos', 'class' => 'form-control') )}}
								</div>
							</div>							
							<div class="form-group {{ $errors->has('tempat_lahir') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Tempat Lahir*</label>
								<div class="col-sm-9">
									{{ Form::text('tempat_lahir', Input::old('tempat_lahir'), array('id' => 'tempat_lahir', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('tempat_lahir'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('tanggal_lahir') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Tanggal Lahir*</label>
								<div class="col-sm-9">
									{{ Form::date('tanggal_lahir', Input::old('tanggal_lahir'), array('id' => 'tanggal_lahir', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('tanggal_lahir'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Jenis Kelamin*</label>
								<div class="col-sm-9">
									<select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
										<option value="Pria">Pria</option>
										<option value="Wanita">Wanita</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Foto*</label>
								@if ( $data->foto !== null )
								<div class="col-sm-1">
									<a href="{{ route('viewfile') . '?file=' . $data->foto }}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
								</div>
								<div class="col-sm-8">
								@else
								<div class="col-sm-9">
								@endif
									<input type="file" id="foto" class="form-control" name="foto"  accept=".jpg,.jpeg,.png,application/pdf">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">KTP*</label>
								@if ( $data->ktp !== null )
								<div class="col-sm-1">
									<a href="{{ route('viewfile') . '?file=' . $data->ktp }}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
								</div>
								<div class="col-sm-8">
								@else
								<div class="col-sm-9">
								@endif
									<input type="file" id="ktp" class="form-control" name="ktp"  accept=".jpg,.jpeg,.png,application/pdf">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Informasi Pendidikan</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="form-group">
								<label class="control-label col-sm-2">Jenis Sekolah</label>
								<div class="col-sm-9">
									<select id="tipe_sekolah" class="form-control" name="tipe_sekolah">
										@foreach(config('pendidikan.tipe_sekolah') as $key => $value)
											<option value="{{ $value['kode'] }}">{{ $value['label'] }}</option>
										@endforeach
									</select>
								</div>
							</div>							
							<div class="form-group {{ $errors->has('nama_sekolah') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Nama Sekolah*</label>
								<div class="col-sm-9">
									{{ Form::text('nama_sekolah', Input::old('nama_sekolah'), array('id' => 'nama_sekolah', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('nama_sekolah'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('nama_sekolah') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>							
							<div class="form-group {{ $errors->has('alamat_sekolah') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Alamat Sekolah*</label>
								<div class="col-sm-9">
									{{ Form::text('alamat_sekolah', Input::old('alamat_sekolah'), array('id' => 'alamat_sekolah', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('alamat_sekolah'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('alamat_sekolah') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>							
							<div class="form-group">
								<label class="control-label col-sm-2">No. Telepon</label>
								<div class="col-sm-9">
									{{ Form::text('no_telepon_sekolah', Input::old('no_telepon_sekolah'), array('id' => 'no_telepon_sekolah', 'class' => 'form-control') )}}
								</div>
							</div>							
							<div class="form-group">
								<label class="control-label col-sm-2">Jurusan</label>
								<div class="col-sm-9">
									<select id="jurusan" class="form-control" name="jurusan">
										@foreach(config('pendidikan.jurusan.1') as $key => $value)
											<option value="{{ $value['kode'] }}">{{ $value['label'] }}</option>
										@endforeach
									</select>
								</div>
							</div>							
							<div class="form-group {{ $errors->has('no_ijazah') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Nomor Ijazah*</label>
								<div class="col-sm-9">
									{{ Form::text('no_ijazah', Input::old('no_ijazah'), array('id' => 'no_ijazah', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('no_ijazah'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('no_ijazah') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('tahun_lulus') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Tahun Lulus*</label>
								<div class="col-sm-9">
									{{ Form::number('tahun_lulus', Input::old('tahun_lulus'), array('id' => 'tahun_lulus', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('tahun_lulus'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('tahun_lulus') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Ijazah*</label>
								@if ( $data->ijazah !== null )
								<div class="col-sm-1">
									<a href="{{ route('viewfile') . '?file=' . $data->ijazah }}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
								</div>
								<div class="col-sm-8">
								@else
								<div class="col-sm-9">
								@endif
									<input type="file" id="ijazah" class="form-control" name="ijazah" accept=".jpg,.jpeg,.png,application/pdf">
								</div>
							</div>							
						</div>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Informasi Kesehatan</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="form-group {{ $errors->has('tinggi_badan') ? 'bad' : '' }}">
								<label class="control-label col-sm-2">Tinggi Badan*</label>
								<div class="col-sm-9">
									{{ Form::number('tinggi_badan', Input::old('tinggi_badan'), array('id' => 'tinggi_badan', 'class' => 'form-control', 'required' => true) )}}

									@if ($errors->has('tinggi_badan'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('tinggi_badan') }}</strong>
	                                    </span>
	                            	@endif
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Surat Dokter*</label>
								@if ( $data->sk_sehat !== null )
								<div class="col-sm-1">
									<a href="{{ route('viewfile') . '?file=' . $data->sk_sehat }}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
								</div>
								<div class="col-sm-8">
								@else
								<div class="col-sm-9">
								@endif
									<input type="file" id="sk_sehat" class="form-control" name="sk_sehat" accept=".jpg,.jpeg,.png,application/pdf">
									<p>Silahkan mengunduh berkas surat dokter sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form2.png' }}" target="_blank">Download Berkas</a></p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">SP Tidak Hamil*</label>
								@if ( $data->sk_tidak_hamil !== null )
								<div class="col-sm-1">
									<a href="{{ route('viewfile') . '?file=' . $data->sk_tidak_hamil }}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
								</div>
								<div class="col-sm-8">
								@else
								<div class="col-sm-9">
								@endif
									<input type="file" id="sk_tidak_hamil" class="form-control" name="sk_tidak_hamil" accept=".jpg,.jpeg,.png,application/pdf">
									<p>Silahkan mengunduh berkas surat pernyataan tidak hamil sesuai format di sini: <a href="{{ route('viewfile') . '?file=berkas/form8.png' }}" target="_blank">Download Berkas</a></p>
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
		var modalLoading = 
		'<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false role="dialog">\
	        <div class="modal-dialog">\
	            <div class="modal-content">\
	                <div class="modal-header">\
	                    <h4 class="modal-title">Please wait...</h4>\
	                </div>\
	                <div class="modal-body">\
	                    <div class="progress">\
	                      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"\
	                      aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%; height: 40px">\
	                      </div>\
	                    </div>\
	                </div>\
	            </div>\
	        </div>\
	    </div>';

		$(document).ready(function(){
			disable_input();
		});

		function submitform() {
			$("#form_siswa").submit();
		}

		function disable_input() {
			$("#form_siswa :input").prop("disabled", true);
			$("#button_simpan").prop("disabled", true);

			$("#button_edit").show();
			$("#button_batal").hide();
		}

		function enable_input() {
			$("#form_siswa :input").prop("disabled", false);
			$("#button_simpan").prop("disabled", false);

			$("#button_edit").hide();
			$("#button_batal").show();
		}

		$( "#tipe_sekolah" ).change(function() {
			var url = "{{ route('sekolah.jurusan', 'replace-this') }}";
	    	url = url.replace('replace-this', this.value);

	  		$.ajax({
	            type : 'get',
	            url: url,
	            success: function(data){
	                console.log(data);

	            	$('#jurusan').find('option').remove().end();

	            	$.each(data, function( index, value ) {
		                var option = $('<option>').attr({
		                    value: value.kode,
		                    id: value.kode,
		                }).text(value.label);

		                $('#jurusan').append(option);
					});
	            }
	        });
		});

		$("#nisn").blur(function(item) {
			disable_input();
			$("#pleaseWaitDialog").modal("show");

			let value = item.target.value;
			let url = 'http://simdik.bppsdmp.pertanian.go.id/api?key=973b2119fe1d68770086936e1214972d&nisn=' + value;

			$.ajax({
				type: 'GET',
				url: url,
  				contentType: 'text/plain',
			  	xhrFields: {
			    	withCredentials: false
			  	},
			  	headers: {
			  		'Access-Control-Allow-Origin': false
			  	},

  				success: function(response) {
	                console.log(response);
	                $("#pleaseWaitDialog").modal("hide");
	                enable_input();
  				},

  				error: function(error) {
	                console.log(error);
	                $("#pleaseWaitDialog").modal("hide");
	                enable_input();
  				}
			});
		});
	</script>
@endsection
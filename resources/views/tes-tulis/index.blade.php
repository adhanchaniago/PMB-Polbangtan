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

            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                <a class="btn btn-primary" href="{{ route('tes-tulis.pdf') }}" target="_blank">
                    <i class="fa fa-download"></i> Download Daftar Peserta Ujian
                </a>
                <a class="btn btn-success"
                   data-toggle="modal"
                   data-target="#modal_upload">
                    <i class="fa fa-upload"></i> Upload Hasil Ujian
                </a>
            </div>

            <div id="app" class="container">
                <pendaftaran-list
                    url-data-list="{{ $urlDataList }}"
                    title="Daftar Peserta Tes Tulis"
                    show-detail="no"></pendaftaran-list>
            </div>
        </div>
    </div>

    <div id="modal_upload" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form action="{{ route('tes-tulis.store') }}" id="form_upload" method="post" class="modal-content">
                {{ csrf_field() }}

                <div class="modal-header bg-primary-600">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload Hasil Ujian Tulis</h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Hasil Ujian</label>
                        <div class="col-sm-9">
                            <input type="file" id="hasil_ujian_add" required class="form-control" name="hasil_ujian" accept=".xlsx">
                            <a href="{{ route('tes-tulis.xls') }}">Download Data Awal</a>
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
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            var app = new Vue({
                el: '#app',

                data: {},

                mounted() {}
            });
        });
    </script>

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
    @if( Session::has('error') )
        <script type="text/javascript">
            swal("Pendaftaran Gagal", "{!! Session::get('error') !!}", "error");
        </script>
    @endif
@endsection
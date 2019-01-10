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
                <a class="btn btn-success">
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
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

            <div id="app" class="container">
                <pendaftaran-list
                    url-data-list="{{ $urlDataList }}"
                    title="Daftar Pendaftaran"
                    show-detail="yes"></pendaftaran-list>
            </div>
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
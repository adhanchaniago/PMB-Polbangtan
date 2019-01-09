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
                <siswa-list
                    ref="siswaList"
                    url-siswa-list="{{ $urlSiswaList }}"></siswa-list>
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
@endsection
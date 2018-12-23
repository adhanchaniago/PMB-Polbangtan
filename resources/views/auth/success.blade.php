@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>Pendaftaran Berhasil</h4>
                    Selamat, pendaftaran akun anda berhasil. Email yang berisi link aktifasi telah terkirim ke email yang anda daftarkan. Silahkan cek email tersebut lalu klik link aktifasi untuk mengaktifkan akun anda.<br/>
                    <small>Belum menerima link aktifasi? <a href="{{ route('aktifasi.resend') }}">Kirim Ulang</a> link aktifasi.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

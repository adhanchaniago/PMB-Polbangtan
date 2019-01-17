@extends('layouts.frontend')

@section('content')
    <section class="contact-page spad pt-0">
        <div class="container">
            <div class="contact-form spad pb-0">
                <div class="section-title text-center">
                    <h3>Pendaftaran Berhasil</h3>
                </div>
                Selamat, pendaftaran akun anda berhasil. Email yang berisi link aktifasi telah terkirim ke email yang anda daftarkan. Silahkan cek email tersebut lalu klik link aktifasi untuk mengaktifkan akun anda.<br/>
                <small>Belum menerima link aktifasi? <a href="{{ route('aktifasi.resend') }}">Kirim Ulang</a> link aktifasi.</small>
            </div>
        </div>
    </section>
@endsection
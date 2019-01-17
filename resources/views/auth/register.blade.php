@extends('layouts.frontend')

@section('content')
    <section class="contact-page spad pt-0">
        <div class="container">
            <div class="contact-form spad pb-0">
                <div class="section-title text-center">
                    <h3>Pendaftaran Calon Mahasiswa Baru Politeknik Pembangunan Pertanian</h3>
                </div>
                <form class="comment-form --contact" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-lg-12 form-div">
                            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required autofocus>

                            @if ($errors->has('name'))
                                <span class="error-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-lg-12 form-div">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Alamat Email" required>

                            @if ($errors->has('email'))
                                <span class="error-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-lg-6 form-div">
                            <input id="password" type="password" name="password" placeholder="Password" required>

                            @if ($errors->has('password'))
                                <span class="error-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-lg-6 form-div">
                            <input id="password-confirm" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-center">
                                <button type="submit" class="site-btn">Daftar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

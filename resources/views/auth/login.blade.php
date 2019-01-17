@extends('layouts.frontend')

@section('content')
    <section class="contact-page spad pt-0">
        <div class="container">
            <div class="contact-form spad pb-0">
                <div class="section-title text-center">
                    <h3>User Login</h3>
                </div>

                <form class="comment-form --contact" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-lg-12 form-div">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Alamat Email" required autofocus>

                            @if ($errors->has('email'))
                                <span class="error-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="col-lg-12 form-div">
                            <input id="password" type="password" name="password" placeholder="Password" required>

                            @if ($errors->has('email'))
                                <span class="error-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="col-lg-12">
                            <div class="text-center">
                                <button type="submit" class="site-btn">Login</button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa Password?
                                </a>
                                Belum mendapatkan link aktivasi?
                                <a class="btn btn-link" href="{{ route('aktifasi.resend') }}">
                                    Kirim ulang email aktifasi
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
	@if( Session::has('success') )
		<script type="text/javascript">
			swal("Berhasil", "{{ Session::get('success') }}", "success");
		</script>
	@endif
	@if( Session::has('error') )
		<script type="text/javascript">
			swal("Gagal", "{{ Session::get('error') }}", "error");
		</script>
	@endif
@endsection
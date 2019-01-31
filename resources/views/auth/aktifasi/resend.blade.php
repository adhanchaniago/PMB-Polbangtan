@extends('layouts.frontend')

@section('content')
    <section class="contact-page spad pt-0">
        <div class="container">
            <div class="contact-form spad pb-0">
                <div class="section-title text-center">
                    <h3>Kirim Uang Link Aktifasi</h3>
                </div>

            	@if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form class="comment-form --contact" method="POST" action="{{ route('aktifasi.send') }}">
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

                        <div class="col-lg-12">
                            <div class="text-center">
                                <button type="submit" class="site-btn">Kirim Link Aktifasi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

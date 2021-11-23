@extends('layouts.app')

@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>Đăng nhập</h2>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>Trang</li>
                <li>Đăng nhập</li>
            </ul>
        </div>
    </div>
    <div class="page-banner-image wow fadeInRight" data-wow-delay="300ms" data-wow-duration="2000ms">
        <img src="{{ asset('assets/images/page-banner.png') }}" alt="image">
    </div>
</div>


<div class="login-area ptb-100">
    <div class="container">
        <div class="login-form">
            <h2>Đăng nhập</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        class="form-control" placeholder="Địa chỉ email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" class="form-control"
                        placeholder="Mật khẩu">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                        <p>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Nhớ mật khẩu</label>
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                        <a href="{{ route('password.request') }}" class="lost-your-password">Quên mật khẩu?</a>
                        <a href="{{ route('register') }}" class="lost-your-password">Chưa có tài khoản?</a>
                    </div>
                </div>
                <button type="submit" class="default-btn">Đăng nhập</button>
            </form>
        </div>
    </div>
</div>
@endsection
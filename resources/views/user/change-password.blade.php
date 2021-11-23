@extends('layouts.app')
@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>Đổi mật khẩu</h2>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>Trang</li>
                <li>Đổi mật khẩu</li>
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
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <h2>Đổi mật khẩu</h2>
            <form action="{{ route('user.change') }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <input type="password" name="pwd" class="form-control" placeholder="Mật khẩu hiện tại">
                    @error('pwd')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="new_pwd" class="form-control" placeholder="Mật khẩu mới">
                    @error('new_pwd')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_pwd" class="form-control" placeholder="Xác nhận mật khẩu">
                    @error('confirm_pwd')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="default-btn">Cập nhật<span></span></button>
            </form>
        </div>
    </div>
</div>
@endsection
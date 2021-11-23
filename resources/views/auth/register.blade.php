@extends('layouts.app')

@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>Đăng ký</h2>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>Trang</li>
                <li>Đăng ký</li>
            </ul>
        </div>
    </div>
    <div class="page-banner-image wow fadeInRight" data-wow-delay="300ms" data-wow-duration="2000ms">
        <img src="{{ asset('assets/images/page-banner.png') }}" alt="image">
    </div>
</div>


<div class="register-area ptb-100">
    <div class="container">
        <div class="register-form">
            <h2>Đăng ký</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                     name="name" value="{{ old('name') }}" required autocomplete="name" 
                     autofocus class="form-control" placeholder="Họ và tên">
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                </div>
                <div class="form-group">
                    <input tid="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                    name="email" value="{{ old('email') }}" required autocomplete="email" 
                    class="form-control" placeholder="Địa chỉ Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                     name="password" required autocomplete="new-password"
                      class="form-control" placeholder="********">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" 
                    name="password_confirmation" required autocomplete="new-password" 
                    class="form-control" placeholder="********">
                    
                </div>
                <div class="form-group">
                    <input tid="block" type="block" class="form-control @error('block') is-invalid @enderror" 
                    name="block" value="{{ old('block') }}" required autocomplete="block" 
                    class="form-control" placeholder="Số Block">
                    @error('block')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group">
                    <input tid="floor" type="floor" class="form-control @error('floor') is-invalid @enderror" 
                    name="floor" value="{{ old('floor') }}" required autocomplete="floor" 
                    class="form-control" placeholder="Số tầng">
                    @error('floor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group">
                    <input tid="cmnd" type="cmnd" class="form-control @error('cmnd') is-invalid @enderror" 
                    name="cmnd" value="{{ old('cmnd') }}" required autocomplete="cmnd" 
                    class="form-control" placeholder="CMND/ CCCD">
                    @error('cmnd')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group">
                    <input tid="birthday" type="birthday" class="form-control @error('birthday') is-invalid @enderror" 
                    name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" 
                    class="form-control" placeholder="Ngày sinh">
                    @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group">
                    <input tid="gender" type="gender" class="form-control @error('gender') is-invalid @enderror" 
                    name="gender" value="{{ old('gender') }}" required autocomplete="gender" 
                    class="form-control" placeholder="Giới tính">
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="form-group">
                    <input tid="householdbook" type="householdbook" class="form-control @error('householdbook') is-invalid @enderror" 
                    name="householdbook" value="{{ old('householdbook') }}" required autocomplete="householdbook" 
                    class="form-control" placeholder="Hộ khẩu tạm trú">
                    @error('householdbook')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <button type="submit" class="default-btn">Đăng ký <span></span></button>
            </form>
        </div>
    </div>
</div>
@endsection

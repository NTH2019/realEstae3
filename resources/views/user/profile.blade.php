@extends('layouts.app')
@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>Hồ sơ của bạn</h2>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>Trang</li>
                <li>Hồ sơ của bạn</li>
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
            <h2>Thông tin</h2>
            <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <a href="#"><img width="100" src="{{ asset('upload/user') }}/{{ Auth::user()->profile_path }}"
                        alt="{{ Auth::user()->name }}"></a>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Hình ảnh đại diện</label>
                        <input type="file" name="profile_path" class="form-control-file">
                        @error('profile_path')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}" class="form-control">
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="idapartment" value="{{ Auth::user()->idapartment }}" placeholder="Mã căn hộ" class="form-control">
                    @error('idapartment')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="block" value="{{ Auth::user()->block }}" placeholder="Số Block" class="form-control">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="floor" value="{{ Auth::user()->floor }}" placeholder="Số tầng" class="form-control">
                    @error('floor')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="cmnd" value="{{ Auth::user()->cmnd }}" placeholder="CMND/ CCCD" class="form-control">
                    @error('cmnd')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="birthday" value="{{ Auth::user()->birthday }}" placeholder="Ngày sinh" class="form-control">
                    @error('birthday')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="gender" value="{{ Auth::user()->gender }}" placeholder="Giới tính" class="form-control">
                    @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="householdbook" value="{{ Auth::user()->householdbook }}" placeholder="Hộ khẩu tạm trú" class="form-control">
                    @error('householdbook')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="text" name="address" value="{{ Auth::user()->address }}" placeholder="Địa chỉ hiện tại" class="form-control">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
               
                <div class="form-group">
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="Điện thoại" class="form-control">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="facebook" value="{{ Auth::user()->facebook }}" placeholder="Facebook" class="form-control">
                    @error('facebook')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="default-btn">Cập nhật <span></span></button>
            </form>
        </div>
    </div>
</div>
@endsection
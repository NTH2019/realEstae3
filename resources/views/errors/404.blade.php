@extends('layouts.app')

@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>Không tìm thấy</h2>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>Trang</li>
                <li>Lỗi</li>
            </ul>
        </div>
    </div>
    <div class="page-banner-image wow fadeInRight" data-wow-delay="300ms" data-wow-duration="2000ms">
        <img src="{{ asset('assets/images/page-banner.png') }}" alt="image">
    </div>
</div>


<div class="error-area ptb-100">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="error-content">
                    <img src="{{ asset('assets/images/error.png') }}" alt="error">
                    <h3>Lỗi 404 : Không thể thấy tìm trang bạn muốn</h3>
                    <a href="/" class="default-btn">Trang chủ<span></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
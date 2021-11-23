<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <title>Home</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
</head>
@php
    $setting = App\Models\Setting::first();
@endphp
<body>
    <div class="navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('assets/images/black-logo.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('assets/images/black-logo.png') }}" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/properties" class="nav-link {{  Request::is('properties') ? 'active' : ''  }}">
                                    Căn hộ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/news" class="nav-link {{  Request::is('news') ? 'active' : ''  }}">
                                    Tin tức
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/contact" class="nav-link {{  Request::is('contact') ? 'active' : ''  }}">Liên hệ</a>
                            </li>
                        </ul>
                        <div class="others-options d-flex align-items-center">                            
                            <div class="option-item">
                                <a href="{{ route('user.property') }}" class="default-btn">Đăng tin + <span></span></a>
                            </div>
                            <div class="option-item">
                                <div class="user-box">
                                    @if(Route::has('login'))
                                        @auth
                                            @isset (Auth::user()->role->role)                                        
                                                <a href="{{ route('dashboard') }}">
                                                    <i class='bx bxs-dashboard'></i>
                                                </a>
                                            @else
                                                <ul class="navbar-nav m-auto">
                                                    <li class="nav-item">
                                                        <a href="#">
                                                            <i class='bx bxs-dashboard'></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li class="nav-item">
                                                                <a href="{{ route('user.dashboard') }}" class="nav-link">Tổng quan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="{{ route('user.profile') }}" class="nav-link">Hồ sơ</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="{{ route('user.changepwd') }}" class="nav-link">Đổi mật khẩu</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                                                class="nav-link">Đăng xuất</a>
                                                            </li>
                                                            <form action="{{ route('logout') }}" id="logout-form" method="post">
                                                                @csrf
                                                            </form>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            @endisset
                                        @else
                                            <a href="{{ route('login') }}"><i class='bx bxs-user'></i></a>
                                            <a href="{{ route('register') }}"><i class='bx bxs-user-plus'></i></a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="option-inner">
                        <div class="others-options d-flex align-items-center">
                            <div class="option-item">
                                <a href="{{ route('user.property') }}" class="default-btn">Đăng tin + <span></span></a>
                            </div>
                            <div class="option-item">                                
                                <div class="user-box">
                                    @if(Route::has('login'))
                                    @auth
                                        @isset (Auth::user()->role->role)                                        
                                            <a href="{{ route('dashboard') }}">
                                                <i class='bx bxs-dashboard'></i>
                                            </a>
                                        @else
                                            <ul class="navbar-nav m-auto">
                                                <li class="nav-item">
                                                    <a href="#">
                                                        <i class='bx bxs-dashboard'></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="nav-item">
                                                            <a href="{{ route('user.dashboard') }}" class="nav-link">Tổng quan</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="{{ route('user.profile') }}" class="nav-link">Hồ sơ</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="{{ route('user.changepwd') }}" class="nav-link">Đổi mật khẩu</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                                            class="nav-link">Đăng xuất</a>
                                                        </li>
                                                        <form action="{{ route('logout') }}" id="logout-form" method="post">
                                                            @csrf
                                                        </form>
                                                    </ul>
                                                </li>
                                            </ul>
                                        @endisset
                                    @else
                                        <a href="{{ route('login') }}"><i class='bx bxs-user'></i></a>
                                        <a href="{{ route('register') }}"><i class='bx bxs-user-plus'></i></a>
                                    @endif
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('content')


    <footer class="footer-area pt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <div class="widget-logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/images/white-logo.png') }}" alt="image">
                            </a>
                        </div>
                        <p>
                            @if ($setting)                                
                            {{ $setting->description }}
                            @endif
                        </p>
                        @if ($setting) 
                        <ul class="widget-social">
                            <li>
                                <a href="{{ $setting->facebook }}" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="{{ $setting->twitter }}" target="_blank"><i
                                        class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="{{ $setting->instagram }}" target="_blank"><i
                                        class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="{{ $setting->pinterest }}" target="_blank"><i
                                        class='bx bxl-pinterest-alt'></i></a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <h3></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <h3>Links</h3>
                        <ul class="widget-info">
                            <li>
                                <a href="/">Trang chủ</a>
                            </li>
                            <li>
                                <a href="properties">Căn hộ</a>
                            </li>
                            <li>
                                <a href="news">Tin tức</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <h3>Liên hệ</h3>
                        <ul class="widget-info">
                            <li>
                                <i class='bx bxs-map'></i>
                                @if ($setting)
                                {{ $setting->address }}                                    
                                @endif
                            </li>
                            <li>
                                <i class='bx bxs-phone'></i>
                                @if ($setting)                                
                                <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                                @endif
                            </li>
                            <li>
                                <i class='bx bx-envelope'></i>
                                @if ($setting)                                
                                <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-area-content">
                    <p>
                        Copyright © 2021. All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="go-top">
        <i class='bx bx-chevron-up'></i>
    </div>


    <script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
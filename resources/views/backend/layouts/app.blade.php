<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RealEstate Admin Dashboard template, UI kit, Bootstrap 4x">
    <meta name="author" content="Thememakker">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/charts-c3/plugin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('backend/assets/css/color_skins.css') }}"/>
</head>

<body class="theme-purple">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('backend/assets/images/logo.svg') }}" width="48" height="48"
                    alt="Oreo"></div>
            <p>Vui lòng chờ trong giây lát</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Top Bar -->
    <nav class="navbar p-l-5 p-r-5">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="/"><img src="{{ asset('backend/assets/images/logo.svg') }}" width="30"
                            alt="Oreo"><span class="m-l-10">Trang chủ</span></a>
                </div>
            </li>
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
            </li>
            <li class="float-right">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                 class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>
                 <form action="{{ route('logout') }}" id="logout-form" method="post">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <div class="tab-content">
            <div class="tab-pane stretchRight active" id="dashboard">
                <div class="menu">
                    <ul class="list">
                        <li>
                            <div class="user-info">
                                <div class="image"><a href="#"><img src="{{ asset('upload/user') }}/{{ Auth::user()->profile_path }}"
                                            alt="User"></a></div>
                                <div class="detail">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <small></small>
                                </div>
                            </div>
                        </li>
                        <li class="header">Thanh công cụ</li>
                        <li class="active open"><a href="/dashboard">
                            <i class="zmdi zmdi-home"></i><span>Tổng quan</span></a>
                        </li>
                        <li class="open"><a href="{{ route('property.index') }}">
                            <i class="zmdi zmdi-city"></i><span>Căn hộ</span></a>
                        </li>
                        <li class="header">Bài viết</li>
                        <li class="open"><a href="{{ route('category.index') }}">
                            --<span>Danh mục</span></a>
                        </li>
                        <li class="open"><a href="{{ route('tag.index') }}">
                            --<span>Chủ đề</span></a>
                        </li>
                        <li class="open"><a href="{{ route('post.index') }}">
                            --<span>Bài viết</span></a>
                        </li>
                        <li class="header">Cài đặt</li>
                        <li class="open"><a href="{{ route('setting') }}">
                            <i class="zmdi zmdi-settings"></i><span>Thông tin</span></a>
                        </li>
                        <li class="open"><a href="{{ route('admin.profile') }}">
                            <i class="zmdi zmdi-account"></i><span>Hồ sơ</span></a>
                        </li>
                        <li class="open"><a href="{{ route('admin.password') }}">
                            <i class="zmdi zmdi-lock"></i><span>Đổi mật khẩu</span></a>
                        </li>
                        <li class="open"><a href="{{ route('admin.guest') }}">
                            <i class="zmdi zmdi-account"></i><span>Hồ sơ Khánh Hàng</span></a>
                        </li>
                        <li class="open"><a href="{{ route('admin.message') }}">
                            <i class="zmdi zmdi-comment-alt-text"></i><span>Tin nhắn</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <section class="content">
        @yield('content')
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ asset('backend/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/c3.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/jvectormap.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/knob.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/index.js') }}"></script>
    @stack('scripts')
</body>

</html>
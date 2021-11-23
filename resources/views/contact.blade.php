@extends('layouts.app')

@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>Liên hệ</h2>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>Trang</li>
                <li>Liên hệ</li>
            </ul>
        </div>
    </div>
    <div class="page-banner-image wow fadeInRight" data-wow-delay="300ms" data-wow-duration="2000ms">
        <img src="{{ asset('assets/images/page-banner.png') }}" alt="image">
    </div>
</div>


<div class="contact-area ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="contact-form">
                    <div class="title">
                        <h3>Liên hệ với chúng tôi</h3>
                    </div>
                    <form id="contactForm">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                        data-error="Vui lòng nhập tên của bạn">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required
                                        data-error="Vui lòng nhập email của bạn">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="phone" id="phone" required
                                        data-error="Vui lòng nhập số điện thoại của bạn" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Chủ đề</label>
                                    <input type="text" name="subject" id="subject" class="form-control"
                                        required data-error="Vui lòng nhập chủ đề của bạn">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Lời nhắn</label>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="5"
                                        required data-error="Vui lòng nhập lời nhắn của bạn"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <a href="#" id="contact" class="default-btn">Gửi <span></span></a>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if ($setting)
            <div class="col-lg-4 col-md-12">
                <div class="contact-address">
                    <h3>Thông tin của chúng tôi</h3>
                    <p>{{ $setting->desctiption }}</p>
                    <ul class="address-info">
                        <li>
                            <i class='bx bxs-map'></i>
                            {{ $setting->address }}
                        </li>
                        <li>
                            <i class='bx bxs-phone'></i>
                            <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                        </li>
                        <li>
                            <i class='bx bx-envelope'></i>
                            <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click','#contact', function (e) {
                e.preventDefault();
                var name = $('#name').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var subject = $('#subject').val();
                var message = $('#message').val();
                var _token = $('input[name=_token]').val();

                $.ajax({
                    type: "post",
                    url: "contact",
                    data: {
                        name: name,
                        phone: phone,
                        email: email,
                        subject: subject,
                        message: message,
                        _token: _token
                    },
                    dataType: "json",
                    success: function (response) {
                        swal({
                            title: 'Thông báo',
                            text: 'Chúng tôi sẽ sớm liên lạc với bạn !',
                            icon: 'success',
                            button: 'OK'
                        })
                    }
                });
            });
        });
    </script>
@endpush
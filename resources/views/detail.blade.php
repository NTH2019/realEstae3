@extends('layouts.app')

@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>{{ $property->name }}</h2>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>Trang</li>
                <li>{{ $property->name }}</li>
            </ul>
        </div>
    </div>
    <div class="page-banner-image wow fadeInRight" data-wow-delay="300ms" data-wow-duration="2000ms">
        <img src="{{ asset('assets/images/page-banner.png') }}" alt="image">
    </div>
</div>


<div class="property-details-area ptb-100">
    <div class="container">
        <div class="property-details-slides owl-carousel owl-theme">
            @foreach ($images as $item)
            <div class="property-details-image">
                <img src="{{ asset('upload/property') }}/{{ $item->image }}" 
                style="width: 680px !important; height: 520px !important;" alt="{{ $property->name }}">
            </div>                
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="property-details-desc">
                    <div class="details-content">
                        <ul class="tag-list">
                            <li class="tag">{{ $property->purpose }}</li>
                        </ul>
                        <div class="price">{{ number_format($property->price) }} đồng</div>
                        <div class="content">
                            <span>{{ $property->address }}</span>
                            <h3>
                                <a href="#">{{ $property->name }}</a>
                            </h3>
                            <p>{{ $property->type }} <span>({{ $property->area }}/m<sup>2</sup>)</span></p>
                            <ul class="list">
                                <li><i class='bx bx-bed'></i> {{ $property->bed }} Phòng ngủ</li>
                                <li><i class='bx bxs-bath'></i> {{ $property->bath }} Phòng tắm</li>
                            </ul>
                        </div>
                    </div>
                    <div class="details-description">
                        <h3>Mô tả căn hộ</h3>
                        <p>{!! $property->description !!}</p>
                    </div>
                    <div class="details-overview">
                        <h3>Tổng quát</h3>
                        <ul class="overview-list">
                            <li>
                                <i class='bx bxs-home'></i>
                                <p>Loại căn hộ</p>
                                <span>{{ $property->type }}</span>
                            </li>
                            <li>
                                <i class='bx bx-group'></i>
                                <p>Diện tích</p>
                                <span>{{ $property->area }}</span>
                            </li>
                            <li>
                                <i class='bx bxs-bed'></i>
                                <p>Phòng ngủ</p>
                                <span>{{ $property->bed }}</span>
                            </li>
                            <li>
                                <i class='bx bxs-bath'></i>
                                <p>Phòng tắm</p>
                                <span>{{ $property->bath }}</span>
                            </li>
                            <li>
                                <i class='bx bxs-city'></i>
                                <p>Thành phố</p>
                                <span>{{ $property->city }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="details-floor">
                        <h3>Bản thiết kế</h3>
                        <div class="floor-image">
                            <img src="{{ asset('upload/property') }}/{{ $property->floor_plan }}" alt="{{ $property->name }}">
                        </div>
                    </div>
                    <div class="details-video">
                        <h3>Video</h3>
                        <div class="video-image">
                            {!! $video !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <aside class="widget-area">
                    <div class="widget widget_info">
                        <div class="info-box-one">
                            <img src="{{ asset('upload/user') }}/{{ $property->user->profile_path }}" alt="{{ $property->user->name }}">
                            <h3>{{ $property->user->name }}</h3>
                            <span><i class='bx bxs-phone'></i> <a href="tel:{{ $property->user->phone }}">
                                {{ $property->user->phone }}    
                            </a></span>
                        </div>
                        <form>
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" name="user_id" id="user_id"
                                value="{{ $property->user->id }}" class="form-control">
                                <input type="hidden" name="property_id" id="property_id"
                                value="{{ $property->id }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Họ tên</label>
                                <input type="text" name="name" id="name" required class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Điện thoại</label>
                                <input type="text" name="phone" id="phone" required class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Lời nhắn</label>
                                <textarea name="message" id="message" required class="form-control"></textarea>
                            </div>
                            <a href="#" id="sendMessage" class="default-btn">Xác nhận <span></span></a>
                        </form>
                    </div>
                    <div class="widget widget_tag_cloud">
                        <h3 class="widget-title">Chủ đề</h3>
                        <div class="tagcloud">
                            @foreach ($tags as $item)
                            <a href="">{{ $item->name }}</a>                                
                            @endforeach
                        </div>
                    </div>
                    <div class="widget widget_top-properties">
                        <h3 class="widget-title">Căn hộ nổi bật</h3>
                        <div class="top-properties-slides owl-carousel owl-theme">
                            @foreach ($hots as $item)
                            <div class="properties-item-box">
                                <div class="properties-content">
                                    <a href="{{ route('property.detail',['slug' => $item->slug]) }}"><img
                                        src="{{ asset('upload/property') }}/{{ $item->image }}"
                                        style="height: 320px !important;" alt="{{ $item->name }}"></a>
                                    <div class="content-box">
                                        <span>{{ $item->address }}</span>
                                        <h3>
                                            <a href="{{ route('property.detail',['slug' => $item->slug]) }}">
                                                {{ $item->name }}
                                            </a>
                                        </h3>
                                        <p>{{ number_format($item->price) }} đồng</p>
                                        <ul class="featured-list">
                                            <li><i class='bx bx-bed'></i> {{ $item->bed }} Phòng ngủ</li>
                                            <li><i class='bx bxs-bath'></i> {{ $item->bath }} Phòng tắm</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                                
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div> 
@endsection
@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click','a#sendMessage', function (e) {
                e.preventDefault();

                var user_id = $("#user_id").val();
                var property_id = $("#property_id").val();
                var name = $("#name").val();
                var phone = $("#phone").val();
                var message = $("#message").val();
                var _token = $("input[name=_token]").val();

                $.ajax({
                    type: "post",
                    url: "/message/apartment",
                    data: {
                        user_id: user_id,
                        property_id: property_id,
                        name: name,
                        phone: phone,
                        message: message,
                        _token: _token
                    },
                    dataType: "json",
                    success: function (response) {
                        swal({
                            title: "Thông báo",
                            text: "Gửi tin nhắn thành công !",
                            icon: 'success',
                            button: 'OK'
                        })
                    }
                });
            });
        });
    </script>
@endpush
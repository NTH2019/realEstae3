@extends('layouts.app')

@section('content')
<div class="main-slides-area">
    <div class="home-slides owl-carousel owl-theme">
        <div class="single-slides-item"></div>
        <div class="single-slides-item item-bg2"></div>
        <div class="single-slides-item item-bg3"></div>
    </div>
    <div class="main-slides-content">
        <div class="container">
            <div class="content">
                <h1 class="wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1000ms">Sang trọng, thông minh, hiện đại
                    và phong cách </h1>
            </div>
            <div class="tab slides-list-tab wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                <div class="tab_content">
                    <div class="tabs_item">
                        <div class="main-slides-search-form">
                            <form action="{{ route('apartment.search') }}" method="GET">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label><i class='bx bx-search'></i></label>
                                            <input type="text" class="form-control" required name="keyword" placeholder="Nhập từ khóa">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label><i class='bx bxs-map'></i></label>
                                            <div class="select-box">
                                                <select name="city">
                                                    <option value="">Địa điểm</option>
                                                    @foreach ($city as $item)
                                                    <option value="{{ $item->city_slug }}">{{ $item->city }}</option>                                                        
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label><i class='bx bx-home'></i></label>
                                            <div class="select-box">
                                                <select name="type">
                                                    <option value="">Loại căn hộ</option>
                                                    @foreach ($type as $item)
                                                    <option value="{{ $item->type }}">{{ $item->type }}</option>                                                        
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit"><i class='bx bx-search'></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="featured-area-two ptb-100">
    <div class="container">
        <div class="section-title">
            <h3>Căn hộ mới nhất</h3>
        </div>
        <div class="featured-slides owl-carousel owl-theme">
            @foreach ($properties as $item)
            <div class="featured-item with-white-color">
                <div class="featured-image">
                    <a href="{{ route('property.detail',['slug' => $item->slug]) }}"><img src="{{ asset('upload/property') }}/{{ $item->image }}"
                        style="height: 320px !important;" alt="{{ $item->name }}"></a>
                    <div class="price">{{ number_format($item->price) }}/m<sup>2</sup></div>
                </div>
                <div class="featured-top-content">
                    <span>{{ $item->address }}</span>
                    <h3>
                        <a href="{{ route('property.detail',['slug' => $item->slug]) }}">{{ $item->name }}</a>
                    </h3>
                    <p>{{ $item->type }} <span>({{ $item->area }}/m<sup>2</sup> )</span></p>
                    <ul class="featured-list">
                        <li><i class='bx bx-bed'></i> {{ $item->bed }} Phòng ngủ</li>
                        <li><i class='bx bxs-bath'></i> {{ $item->bath }} Phòng tắm</li>
                        <li><i class='bx bxs-city'></i> {{ $item->city }}</li>
                    </ul>
                </div>
                <div class="featured-bottom-content">
                    <div class="featured-btn">
                        <a href="{{ route('property.detail',['slug' => $item->slug]) }}" class="default-btn">Xem chi tiết<span></span></a>
                    </div>
                </div>
            </div>                
            @endforeach
        </div>
        <div class="view-featured-btn">
            <a href="/properties" class="default-btn">Xem tất cả<span></span></a>
        </div>
    </div>
</div>


<div class="neighborhood-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h3>Tìm kiếm theo địa điểm</h3>
        </div>
        <div class="row justify-content-center">
            @foreach ($city as $item)
            <div class="col-lg-4 col-md-6">
                <div class="single-neighborhood-box">
                    <a href="{{ route('property.city',['slug' => $item->city_slug]) }}"><img src="{{ asset('upload/property') }}/{{ $item->image }}"
                        style="height: 320px !important;" alt="{{ $item->city }}"></a>
                    <div class="content">
                        <h3>
                            <a href="{{ route('property.city',['slug' => $item->city_slug]) }}">{{ $item->city }}</a>
                        </h3>
                    </div>
                </div>
            </div>                
            @endforeach
        </div>
        <div class="view-neighborhood-btn">
            <a href="/properties" class="default-btn">Xem tất cả<span></span></a>
        </div>
    </div>
</div>


{{-- <div class="agents-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h3>Explore Feature Agents</h3>
            <p>Proin gravida nibh vel velit auctor aliquet aenean sollicitudin lorem quis bibendum auctor nisi elit
                consequat ipsum nec sagittis sem nibh id elit.</p>
        </div>
        <div class="agents-slides owl-carousel owl-theme">
            <div class="agents-item">
                <div class="agents-image">
                    <a href="property-details.html"><img src="assets/images/agents/agents-1.jpg" alt="image"></a>
                    <ul class="social">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class='bx bxl-facebook'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/?lang=en" target="_blank">
                                <i class='bx bxl-twitter'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class='bx bxl-instagram-alt'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class='bx bxl-pinterest-alt'></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="agents-content">
                    <span>64 1st Avenue, High Street, NZ 1002</span>
                    <h3>
                        <a href="property-details.html">Thomas Jakson</a>
                    </h3>
                    <p>1127 Properties</p>
                    <ul class="rating-list">
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li class="color-gray"><i class='bx bxs-star'></i></li>
                        <li>Average</li>
                    </ul>
                    <div class="message-icon">
                        <a href="contact.html" target="_blank">
                            <i class='bx bx-envelope'></i>
                        </a>
                    </div>
                </div>
                <div class="agents-bottom-content">
                    <p>
                        <i class='bx bxs-phone'></i>
                        <a href="tel:000123456789">+000 123 456 789</a>
                    </p>
                    <div class="agents-btn">
                        <a href="property-details.html" class="default-btn">KNOW DETAILS <span></span></a>
                    </div>
                </div>
            </div>
            <div class="agents-item">
                <div class="agents-image">
                    <a href="property-details.html"><img src="assets/images/agents/agents-2.jpg" alt="image"></a>
                    <ul class="social">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class='bx bxl-facebook'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/?lang=en" target="_blank">
                                <i class='bx bxl-twitter'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class='bx bxl-instagram-alt'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class='bx bxl-pinterest-alt'></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="agents-content">
                    <span>64 1st Avenue, High Street, NZ 1002</span>
                    <h3>
                        <a href="property-details.html">Sinthiya Anvi</a>
                    </h3>
                    <p>1128 Properties</p>
                    <ul class="rating-list">
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li class="color-gray"><i class='bx bxs-star'></i></li>
                        <li>Average</li>
                    </ul>
                    <div class="message-icon">
                        <a href="contact.html" target="_blank">
                            <i class='bx bx-envelope'></i>
                        </a>
                    </div>
                </div>
                <div class="agents-bottom-content">
                    <p>
                        <i class='bx bxs-phone'></i>
                        <a href="tel:000123456789">+000 123 456 789</a>
                    </p>
                    <div class="agents-btn">
                        <a href="property-details.html" class="default-btn">KNOW DETAILS <span></span></a>
                    </div>
                </div>
            </div>
            <div class="agents-item">
                <div class="agents-image">
                    <a href="property-details.html"><img src="assets/images/agents/agents-3.jpg" alt="image"></a>
                    <ul class="social">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class='bx bxl-facebook'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/?lang=en" target="_blank">
                                <i class='bx bxl-twitter'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class='bx bxl-instagram-alt'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class='bx bxl-pinterest-alt'></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="agents-content">
                    <span>64 1st Avenue, High Street, NZ 1002</span>
                    <h3>
                        <a href="property-details.html">Benthon Margulis</a>
                    </h3>
                    <p>1129 Properties</p>
                    <ul class="rating-list">
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li class="color-gray"><i class='bx bxs-star'></i></li>
                        <li>Average</li>
                    </ul>
                    <div class="message-icon">
                        <a href="contact.html" target="_blank">
                            <i class='bx bx-envelope'></i>
                        </a>
                    </div>
                </div>
                <div class="agents-bottom-content">
                    <p>
                        <i class='bx bxs-phone'></i>
                        <a href="tel:000123456789">+000 123 456 789</a>
                    </p>
                    <div class="agents-btn">
                        <a href="property-details.html" class="default-btn">KNOW DETAILS <span></span></a>
                    </div>
                </div>
            </div>
            <div class="agents-item">
                <div class="agents-image">
                    <a href="property-details.html"><img src="assets/images/agents/agents-1.jpg" alt="image"></a>
                    <ul class="social">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class='bx bxl-facebook'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/?lang=en" target="_blank">
                                <i class='bx bxl-twitter'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class='bx bxl-instagram-alt'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class='bx bxl-pinterest-alt'></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="agents-content">
                    <span>64 1st Avenue, High Street, NZ 1002</span>
                    <h3>
                        <a href="property-details.html">Thomas Jakson</a>
                    </h3>
                    <p>1127 Properties</p>
                    <ul class="rating-list">
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li class="color-gray"><i class='bx bxs-star'></i></li>
                        <li>Average</li>
                    </ul>
                    <div class="message-icon">
                        <a href="contact.html" target="_blank">
                            <i class='bx bx-envelope'></i>
                        </a>
                    </div>
                </div>
                <div class="agents-bottom-content">
                    <p>
                        <i class='bx bxs-phone'></i>
                        <a href="tel:000123456789">+000 123 456 789</a>
                    </p>
                    <div class="agents-btn">
                        <a href="property-details.html" class="default-btn">KNOW DETAILS <span></span></a>
                    </div>
                </div>
            </div>
            <div class="agents-item">
                <div class="agents-image">
                    <a href="property-details.html"><img src="assets/images/agents/agents-2.jpg" alt="image"></a>
                    <ul class="social">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class='bx bxl-facebook'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/?lang=en" target="_blank">
                                <i class='bx bxl-twitter'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class='bx bxl-instagram-alt'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class='bx bxl-pinterest-alt'></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="agents-content">
                    <span>64 1st Avenue, High Street, NZ 1002</span>
                    <h3>
                        <a href="property-details.html">Sinthiya Anvi</a>
                    </h3>
                    <p>1128 Properties</p>
                    <ul class="rating-list">
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li class="color-gray"><i class='bx bxs-star'></i></li>
                        <li>Average</li>
                    </ul>
                    <div class="message-icon">
                        <a href="contact.html" target="_blank">
                            <i class='bx bx-envelope'></i>
                        </a>
                    </div>
                </div>
                <div class="agents-bottom-content">
                    <p>
                        <i class='bx bxs-phone'></i>
                        <a href="tel:000123456789">+000 123 456 789</a>
                    </p>
                    <div class="agents-btn">
                        <a href="property-details.html" class="default-btn">KNOW DETAILS <span></span></a>
                    </div>
                </div>
            </div>
            <div class="agents-item">
                <div class="agents-image">
                    <a href="property-details.html"><img src="assets/images/agents/agents-3.jpg" alt="image"></a>
                    <ul class="social">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class='bx bxl-facebook'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/?lang=en" target="_blank">
                                <i class='bx bxl-twitter'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class='bx bxl-instagram-alt'></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class='bx bxl-pinterest-alt'></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="agents-content">
                    <span>64 1st Avenue, High Street, NZ 1002</span>
                    <h3>
                        <a href="property-details.html">Benthon Margulis</a>
                    </h3>
                    <p>1129 Properties</p>
                    <ul class="rating-list">
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li><i class='bx bxs-star'></i></li>
                        <li class="color-gray"><i class='bx bxs-star'></i></li>
                        <li>Average</li>
                    </ul>
                    <div class="message-icon">
                        <a href="contact.html" target="_blank">
                            <i class='bx bx-envelope'></i>
                        </a>
                    </div>
                </div>
                <div class="agents-bottom-content">
                    <p>
                        <i class='bx bxs-phone'></i>
                        <a href="tel:000123456789">+000 123 456 789</a>
                    </p>
                    <div class="agents-btn">
                        <a href="property-details.html" class="default-btn">KNOW DETAILS <span></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="view-agents-btn">
            <a href="agents.html" class="default-btn">VIEW ALL AGENTS <span></span></a>
        </div>
    </div>
</div> --}}


<div class="blog-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h3>Tin tức</h3>
        </div>
        <div class="blog-slides owl-carousel owl-theme">
            @foreach ($posts as $post)
            <div class="blog-item">
                <a href="{{ route('news.detail',['slug' => $post->slug]) }}"><img src="{{ asset('upload/post') }}/{{ $post->image }}" style="height: 320px !important;"
                     alt="{{ $post->name }}"></a>
                <div class="blog-content">
                    <span><a href="{{ route('news.detail',['slug' => $post->slug]) }}">{{ $post->category->name }}</a></span>
                    <h3>
                        <a href="{{ route('news.detail',['slug' => $post->slug]) }}">{{ $post->name }}</a>
                    </h3>
                </div>
                <div class="blog-bottom-content d-flex justify-content-between align-items-center">
                    <div class="blog-author d-flex align-items-center">
                        <img src="assets/images/blog/image-1.jpg" class="rounded-circle" alt="{{ $post->user->name }}">
                        <span><a href="#">{{ $post->user->name }}</a></span>
                    </div>
                    <p><i class='bx bx-calendar'></i>{{ $post->created_at->format('d/m/Y') }}</p>
                </div>
            </div>                
            @endforeach
        </div>
    </div>
</div>
@endsection

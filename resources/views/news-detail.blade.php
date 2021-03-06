@extends('layouts.app')

@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>{{ $post->name }}</h2>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>Trang</li>
                <li>{{ $post->name }}</li>
            </ul>
        </div>
    </div>
    <div class="page-banner-image wow fadeInRight" data-wow-delay="300ms" data-wow-duration="2000ms">
        <img src="{{ asset('assets/images/page-banner.png') }}" alt="{{ $post->name }}">
    </div>
</div>


<div class="blog-details-area ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="blog-details-desc">
                    <div class="article-content">
                        <div class="article-image">
                            <img src="{{ asset('upload/post') }}/{{ $post->image }}"
                            style="width: 680px !important; height: 520px !important;" alt="{{ $post->user->name }}">
                        </div>
                        <ul class="entry-meta">
                            <li>
                                <img src="{{ asset('upload/user') }}/{{ $post->user->profile_path }}"
                                 alt="{{ $post->user->name }}">
                                <a href="#">{{ $post->user->name }}</a>
                            </li>
                            <li>
                                <i class='bx bx-calendar'></i>
                                {{ $post->created_at->format('d/m/Y') }}
                            </li>
                        </ul>
                        <h3>{{ $post->name }}</h3>
                        <p>{!! $post->short_description !!}</p>
                        <div class="quote">
                            <p>{{ $post->quote }}</p>
                        </div>
                        <p>{!! $post->description !!}</p>
                        <div class="article-footer">
                            <div class="article-tags">
                                <h3>Chủ đề</h3>
                                <ul class="tags">
                                    @foreach ($tags as $item)
                                    <li><a href="">{{ $item->tag->name }}</a></li>                                    
                                    @endforeach
                                </ul>
                            </div>
                            <div class="article-share">
                                <h3>Chia sẻ</h3>
                                <ul class="social">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank"><i
                                                class='bx bxl-facebook'></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ Request::url() }}" target="_blank"><i
                                                class='bx bxl-twitter'></i></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}" target="_blank"><i
                                                class='bx bxl-linkedin'></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="article-comments" id="listComment">
                        <h4 id="totalComment">{{ $post->comment_post->count() }} Bình luận</h4>
                        @foreach ($comments as $item)
                            <div class="comments-list">
                                <img src="{{ asset('upload/user/no-image.png') }}" alt="image"> 
                                <h5>{{ $item->name }}</h5>
                                <span>{{ $item->created_at->format('d/m/Y') }}</span>
                                <p>{{ $item->comment }}</p>
                            </div>                            
                        @endforeach
                    </div>
                    <div class="article-leave-comment">
                        <h4>Bình luận bài viết</h4>

                        <form action="{{ route('news.comment') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                @if (!Auth::check())
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Họ tên</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                @endif
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" class="form-control">
                                        <input type="text" name="comment" id="comment" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" id="commentPost" class="default-btn">Bình luận <span></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <aside class="widget-area">
                    <div class="widget widget_search">
                        <h3 class="widget-title">Tìm kiếm</h3>
                        <form class="search-form" action="{{ route('news.search') }}" method="GET">
                            <input type="search" name="search" class="search-field" placeholder="Nhập từ khóa">
                            <button type="submit"><i class='bx bx-search'></i></button>
                        </form>
                    </div>
                    <div class="widget widget_categories">
                        <h3 class="widget-title">Danh mục</h3>
                        <ul>
                            @foreach ($categories as $item)
                            <li><a href="">{{ $item->name }}</a><span>{{ $item->post->count() }}</span></li>                                
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget_fido_posts_thumb">
                        <h3 class="widget-title">Bài viết nổi bật</h3>
                        @foreach ($hots as $item)
                        <article class="item">
                            <a href="{{ route('news.detail',['slug' => $item->slug]) }}" class="thumb">
                                <span class="fullimage cover bg1" role="img"></span>
                            </a>
                            <div class="info">
                                <h4 class="title usmall">
                                    <a href="{{ route('news.detail',['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                </h4>
                                <span><i class='bx bx-calendar'></i> {{ $post->created_at->format('d/m/Y') }}</span>
                            </div>
                        </article>                            
                        @endforeach
                    </div>
                    <div class="widget widget_tag_cloud">
                        <h3 class="widget-title">Chủ đề</h3>
                        <div class="tagcloud">
                            @foreach ($tag_total as $item)
                            <a href="">{{ $item->name }}</a>                                
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
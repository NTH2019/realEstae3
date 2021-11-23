@extends('layouts.app')

@section('content')
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>Tổng quan</h2>
            <ul>
                <li>
                    <a href="i/">Tổng quan</a>
                </li>
                <li>Trang</li>
                <li>Tổng quan</li>
            </ul>
        </div>
    </div>
    <div class="page-banner-image wow fadeInRight" data-wow-delay="300ms" data-wow-duration="2000ms">
        <img src="{{ asset('assets/images/page-banner.png') }}" alt="image">
    </div>
</div>


<div class="agents-area-without-color pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="agents-item bottom-30">
                    <div class="agents-image">
                        <a href="#"><img width="400" src="{{ asset('upload/user') }}/{{ Auth::user()->profile_path }}"
                                alt="{{ Auth::user()->name }}"></a>
                    </div>
                    <div class="agents-content">
                        <h3>
                            <span class="text-dark">Tổng số căn hộ: {{ Auth::user()->property->count() }} căn hộ</span>
                            <span class="text-dark">Tổng số tin nhắn: {{ Auth::user()->message->count() }} tin
                                nhắn</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 title="message">Tin nhắn của bạn</h3>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Điện thoại</th>
                                    <th>Lời nhắn</th>
                                    <th>Căn hộ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>{{ $item->property->name }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $messages->links() }}
                    </div>
                    <div class="col-lg-12">
                        <h3 title="message">Căn hộ của bạn</h3>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên căn hộ</th>
                                    <th>Giá</th>
                                    <th>Lượt xem</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <img src="{{ asset('upload/property') }}/{{ $item->image }}" width="200"
                                            alt="{{ $item->name }}">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($item->price) }} đồng</td>
                                    <td>{{ $item->view }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy',['id' => $item->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"><i class='bx bxs-trash-alt'></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $properties->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
            <h2>Tổng quan
            <small>Xin Chào {{ Auth::user()->name }}</small>
            </h2>
        </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h5 class="mt-0">Căn hộ</h5>
                        </div>
                        <div>
                            <h2 class="mb-0">{{ $properties->count() }}</h2>
                        </div>
                    </div>
                    <span id="linecustom1">2,9,5,5,8,5,4,2,6</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h5 class="mt-0">Bài viết</h5>                    
                        </div>
                        <div>
                            <h2 class="mb-0">{{ $posts->count() }}</h2>
                        </div>
                    </div>
                    <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h5 class="mt-0">Bình luận</h5>
                        </div>
                        <div>
                            <h2 class="mb-0">{{ $comments->count() }}</h2>
                        </div>
                    </div>
                    <span id="linecustom3">1,5,3,6,6,3,6,8,4,2</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <h3>Danh sách đăng ký liên hệ</h3>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Chủ đề</th>
                        <th>Lời nhắn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->subject }}</td>
                        <td>{{ $item->message }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $contacts->links() }}
        </div>
    </div>
</div>
@endsection
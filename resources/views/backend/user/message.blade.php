@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Tin nhắn
            </h2>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Danh sách</strong></h2>
                    <a href="{{ route('category.create') }}" class="btn btn-primary float-right">Thêm mới</a>
                </div>
                <div class="body table-responsive">
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
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Table -->
</div>
@endsection
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
                    <h3 title="message">Tin nhắn </h3>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Số Block</th>
                                    <th>Số tầng</th>
                                    <th>Giới tính</th>
                                    <th>CMND/ CCCD</th>
                                    <th>Ngày sinh</th>
                                    <th>Hộ khẩu thường trú</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email  }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->block }}</td>
                                    <td>{{ $item->floor }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->cmnd }}</td>
                                    <td>{{ $item->birthday }}</td>
                                    <td>{{ $item->householdbook }}</td>
                                    <td>
                                    <form method="post" action="{{route('guest.destroy',$item->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    </td>
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
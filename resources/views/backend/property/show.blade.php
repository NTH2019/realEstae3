@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thông tin căn hộ
            </h2>            
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Thông tin mới căn hộ</strong></h2>                    
                </div>
                <div class="body">
                    <ul class="list-group">
                        <li class="list-group-item">Tên căn hộ: <span class="float-right">{{ $property->name }}</span></li>
                        <li class="list-group-item">Loại căn hộ: <span class="float-right">{{ $property->type }}</span></li>
                        <li class="list-group-item">Mục đích căn hộ: <span class="float-right">{{ $property->purpose }}</span></li>
                        <li class="list-group-item">Giá: <span class="float-right">{{ number_format($property->price) }} đồng</span></li>
                        <li class="list-group-item">Phòng ngủ: <span class="float-right">{{ $property->bed }}</span></li>
                        <li class="list-group-item">Phòng tắm: <span class="float-right">{{ $property->bath }}</span></li>
                        <li class="list-group-item">Video: <span class="float-right">{!! $video !!}</span></li>
                        <li class="list-group-item">Diện tích: <span class="float-right">{{ $property->area }}/m<sup>2</sup></span></li>
                        <li class="list-group-item">Hình ảnh đại diện: <span class="float-right"><img src="{{ asset('upload/property') }}/{{ $property->image }}" width="100" alt="{{ $property->name }}"></span></li>
                        <li class="list-group-item">Hình ảnh chi tiết: <span class="float-right">
                            @foreach ($images as $item)
                                <img src="{{ asset('upload/property') }}/{{ $item->image }}" width="100" alt="{{ $property->name }}">
                            @endforeach    
                        </span></li>
                        <li class="list-group-item">Bản thiết kế: <span class="float-right"><img src="{{ asset('upload/property') }}/{{ $property->floor_plan }}" width="100" alt="{{ $property->name }}"></span></li>
                        <li class="list-group-item">
                            <a class="btn btn-primary" href="{{ route('property.edit',['property' => $property->id]) }}">Cập nhật</a>
                            <a href="{{ route('property.index') }}" class="btn btn-danger">Quay lại</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->
</div>
@endsection
@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thêm căn hộ
            </h2>            
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12">
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Thêm mới căn hộ</strong></h2>
                    <a href="{{ route('property.index') }}" class="btn btn-primary float-right">Quay lại</a>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Tên căn hộ" name="name" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Loại căn hộ: </label>
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="type" id="house" class="with-gap" value="option1">
                                <label for="house">Căn hộ</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="type" id="apartment" class="with-gap" value="option2"
                                    checked="">
                                <label for="apartment">Chung cư</label>
                            </div>
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="purpose">Mục đích: </label>
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="purpose" id="sale" class="with-gap" value="option1" checked="">
                                <label for="sale">Bán</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="purpose" id="rent" class="with-gap" value="option2">
                                <label for="rent">Cho thuê</label>
                            </div>
                            @error('purpose')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <textarea name="description" cols="30" rows="25" id="description" placeholder="Mô tả"
                                class="form-control no-resize" required></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror    
                        </div>
                        <div class="form-group form-float">
                            <input type="number" class="form-control" placeholder="Phòng ngủ" name="bed" required>
                            @error('bed')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="number" class="form-control" placeholder="Phòng tắm" name="bath" required>
                            @error('bath')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="number" class="form-control" placeholder="Giá" name="price" required>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="number" class="form-control" placeholder="Diện tích" name="area" required>
                            @error('area')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Thành phố/ Tỉnh" name="city" required>
                            @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address" required>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Link youtube" name="video">
                            @error('video')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <label for="image">Hình ảnh đại diện</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <label for="images">Hình ảnh chi tiết</label>
                            <input type="file" class="form-control" name="images[]" multiple="multiple">
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <label for="floor_plan">Bản thiết kế</label>
                            <input type="file" class="form-control" name="floor_plan">
                            @error('floor_plan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->
</div>
@endsection
@push('scripts')
<script src="https://cdn.tiny.cloud/1/wl0hy3kumawhadevkqc4e81r6m900s5jbcbx30qu575s6ptk/tinymce/5/tinymce.min.js"
referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description'
    })
</script>
@endpush
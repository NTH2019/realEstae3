@extends('layouts.app')

@section('content')
<div class="page-banner-Diện tích">
    <div class="container">
        <div class="page-banner-content wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">
            <h2>Đăng tin</h2>
            <ul>
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>Trang</li>
                <li>Đăng tin</li>
            </ul>
        </div>
    </div>
    <div class="page-banner-image wow fadeInRight" data-wow-delay="300ms" data-wow-duration="2000ms">
        <img src="{{ asset('assets/images/page-banner.png') }}" alt="image">
    </div>
</div>


<div class="submit-property-area ptb-100">
    <div class="container">
        @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
        <div class="submit-property-form">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Tên căn hộ</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Diện tích</label>
                            <input type="text" name="area" class="form-control">
                            @error('area')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Giá (VND/m<sup>2</sup>)</label>
                            <input type="text" name="price" class="form-control">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Loại căn hộ</label>
                            <select name="type">
                                <option value="">-- Chọn --</option>
                                <option value="house">Căn hộ</option>
                                <option value="apartment">Chung cư</option>
                            </select>
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Mục đích</label>
                            <select name="purpose">
                                <option value="">-- Chọn --</option>
                                <option value="sale">Bán</option>
                                <option value="rent">Cho thuê</option>
                            </select>
                            @error('purpose')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Phòng ngủ</label>
                            <select name="bed">
                                <option value="">-- Chọn --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            @error('bed')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Phòng tắm</label>
                            <select name="bath">
                                <option value="">-- Chọn --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            @error('bath')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Hình ảnh đại diện</label>
                            <input type="file" name="image" class="form-control-file">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Bản thiết kế</label>
                            <input type="file" name="floor_plan" class="form-control-file">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Hình ảnh chi tiết</label>
                            <input type="file" name="images[]" multiple class="form-control-file">
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="form-group">
                            <label>Link youtube</label>
                            <input type="text" name="video" class="form-control">
                            @error('video')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="form-group">
                            <label>Mô tả căn hộ</label>
                            <textarea id="description" rows="35" name="description" class="form-control"></textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <h4>Thông tin địa điểm</h4>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Địa điểm</label>
                            <input type="text" name="address" class="form-control">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Thành phố</label>
                            <input type="text" name="city" class="form-control">
                            @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> 
                </div>
                <button type="submit" class="default-btn">Xác nhận<span></span></button>
            </form>
        </div>
    </div>
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
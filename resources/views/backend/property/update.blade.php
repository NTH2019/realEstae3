@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Cập nhật căn hộ
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
                    <h2><strong>Cập nhật căn hộ</strong></h2>
                    <a href="{{ route('property.index') }}" class="btn btn-primary float-right">Quay lại</a>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{ route('property.update',['property' => $property->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Tên căn hộ" name="name" value="{{ $property->name }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Loại căn hộ: </label>
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="type" id="house" class="with-gap" value="house"
                                @if ($property->type == 'Căn hộ')
                                    checked=""
                                @endif>
                                <label for="house">Căn hộ</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="type" id="apartment" class="with-gap" value="apartment"
                                @if ($property->type == 'Chung cư')
                                    checked=""
                                @endif>
                                <label for="apartment">Chung cư</label>
                            </div>
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="purpose">Mục đích: </label>
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="purpose" id="sale" class="with-gap" value="sale" 
                                @if ($property->purpose == 'Bán')
                                    checked=""
                                @endif>
                                <label for="sale">Bán</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="purpose" id="rent" class="with-gap" value="rent"
                                @if ($property->purpose == 'Cho thuê')
                                    checked=""
                                @endif>
                                <label for="rent">Cho thuê</label>
                            </div>
                            @error('purpose')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <textarea name="description" cols="30" id="description" rows="25" placeholder="Mô tả"
                                class="form-control no-resize" required>{{ $property->description }}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror    
                        </div>
                        <div class="form-group form-float">
                            <input type="number" class="form-control" placeholder="Phòng ngủ" value="{{ $property->bed }}" name="bed" required>
                            @error('bed')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="number" class="form-control" placeholder="Phòng tắm" name="bath" value="{{ $property->bath }}" required>
                            @error('bath')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="number" class="form-control" placeholder="Giá" value="{{ $property->price }}" name="price" required>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="number" class="form-control" placeholder="Diện tích" value="{{ $property->area }}" name="area" required>
                            @error('area')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Thành phố/ Tỉnh" value="{{ $property->city }}" name="city" required>
                            @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Địa chỉ" value="{{ $property->address }}" name="address" required>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Link youtube" value="{{ $property->video }}" name="video">
                            @error('video')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <label for="image">Hình ảnh đại diện</label>
                            <input type="file" class="form-control" name="new_image">
                            @error('new_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @isset($property->image)
                            <img src="{{ asset('upload/property') }}/{{ $property->image }}" width="150" alt="{{ $property->name }}">                                
                            @endisset
                        </div>
                        <div class="form-group form-float">
                            <label for="images">Hình ảnh chi tiết</label>
                            <input type="file" class="form-control" name="new_images[]" multiple="multiple">
                            @error('new_images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @foreach ($images as $item)
                                    <img src="{{ asset('upload/property') }}/{{ $item->image }}" width="150" alt="{{ $property->name }}">                                                                
                            @endforeach
                        </div>
                        <div class="form-group form-float">
                            <label for="new_floor_plan">Bản thiết kế</label>
                            <input type="file" class="form-control" name="new_floor_plan">
                            @error('floor_plan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @isset($property->floor_plan)
                            <img src="{{ asset('upload/property') }}/{{ $property->floor_plan }}" width="150" alt="{{ $property->name }}">                                
                            @endisset
                        </div>
                        <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">Cập nhật</button>
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
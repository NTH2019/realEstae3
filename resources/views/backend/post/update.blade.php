@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Cập nhật bài viết
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
                    <h2><strong>Cập nhật bài viết</strong></h2>
                    <a href="{{ route('post.index') }}" class="btn btn-primary float-right">Quay lại</a>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{ route('post.update',['post' => $post->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Tiêu đề" value="{{ $post->name }}" name="name" required>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <textarea type="text" class="form-control" id="short_description" placeholder="Mô tả ngắn"
                                name="short_description" rows="15">{{ $post->short_description }}</textarea>
                        </div>
                        <div class="form-group form-float">
                            <textarea type="text" class="form-control" name="description" placeholder="Mô tả chi tiết"
                                name="description" rows="25">{{ $post->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Trích dẫn" value="{{ $post->quote }}" name="quote" required>
                            @error('quote')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <select class="form-control show-tick ms search-select" name="category">
                                <option value="{{ $post->category_id }}">{{ $post->category->name }}</option>
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <fieldset>
                            <span>Chủ đề đã chọn: </span>
                            @foreach ($post_tags as $tag)                                   
                                <span class="font-italic">{{ $tag->tag->name }},    </span>
                            @endforeach
                            <p>Chủ đề</p>
                            @foreach ($tags as $tag)                                   
                                <div>
                                    <input type="checkbox" name="new_tags[]" value="{{ $tag->id }}">
                                    <label for="tags">{{ $tag->name }}</label>
                                </div>
                            @endforeach
                            @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </fieldset>
                        <div class="form-group form-float">
                            <label for="image">Hình ảnh</label>
                            <input type="file" class="form-control" name="new_image">
                            <img src="{{ asset('upload/post') }}/{{ $post->image }}" width="150" alt="{{ $post->name }}">
                            @error('image')
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
        selector: '#short_description'
    })
    tinymce.init({
        selector: '#description'
    })
</script>
@endpush
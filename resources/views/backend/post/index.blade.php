@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách danh mục
            </h2>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-12">
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Danh sách</strong></h2>
                    <a href="{{ route('post.create') }}" class="btn btn-primary float-right">Thêm mới</a>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Đường dẫn</th>
                                <th><i class="material-icons">remove_red_eye</i></th>
                                <th> <i class="material-icons">comments</i></th>
                                <th>Cập nhật</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                            <tr id="property{{ $post->id }}">
                                <th scope="row">{{ ++$key }}</th>
                                <td>
                                    <img src="{{ asset('upload/post') }}/{{ $post->image }}" width="150" alt="{{ $post->name }}">
                                </td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->view }}</td>
                                <td>
                                    @if ($post->comment_post)
                                        {{ $post->comment_post->count() }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td> 
                                    <a href="{{ route('post.edit',['post' => $post->id]) }}" class="text-success">
                                        <i class="material-icons">mode_edit</i>
                                    </a> 
                                </td>
                                <td>
                                    <form id="delete-form" action="{{ route('post.destroy',['post' => $post->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link" type="submit"><span class="text-danger"><i class="material-icons">delete</i></span></button>
                                    </form>
                                </td>
                            </tr>                                                        
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Table -->
</div>
@endsection
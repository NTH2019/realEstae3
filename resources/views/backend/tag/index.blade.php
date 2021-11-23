@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách chủ đề
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
                    <a href="{{ route('tag.create') }}" class="btn btn-primary float-right">Thêm mới</a>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên chủ đề</th>
                                <th>Đường dẫn</th>
                                <th>Cập nhật</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $key => $tag)
                            <tr id="property{{ $tag->id }}">
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->slug }}</td>
                                <td> 
                                    <a href="{{ route('tag.edit',['tag' => $tag->id]) }}" class="text-success">
                                        <i class="material-icons">mode_edit</i>
                                    </a> 
                                </td>
                                <td>
                                    <form id="delete-form" action="{{ route('tag.destroy',['tag' => $tag->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link" type="submit"><span class="text-danger"><i class="material-icons">delete</i></span></button>
                                    </form>
                                </td>
                            </tr>                                                        
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Table -->
</div>
@endsection
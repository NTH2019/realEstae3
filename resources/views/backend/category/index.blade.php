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
                    <a href="{{ route('category.create') }}" class="btn btn-primary float-right">Thêm mới</a>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Đường dẫn</th>
                                <th>Cập nhật</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr id="property{{ $category->id }}">
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td> 
                                    <a href="{{ route('category.edit',['category' => $category->id]) }}" class="text-success">
                                        <i class="material-icons">mode_edit</i>
                                    </a> 
                                </td>
                                <td>
                                    <form id="delete-form" action="{{ route('category.destroy',['category' => $category->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link" type="submit"><span class="text-danger"><i class="material-icons">delete</i></span></button>
                                    </form>
                                </td>
                            </tr>                                                        
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Table -->
</div>
@endsection
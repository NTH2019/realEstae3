@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Danh sách căn hộ
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
                    <a href="{{ route('property.create') }}" class="btn btn-primary float-right">Thêm mới</a>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên căn hộ</th>
                                <th>loại</th>
                                <th>Mục đích</th>
                                <th><i class="material-icons">remove_red_eye</i></th>
                                <th> <i class="material-icons">comments</i></th>
                                <th>Hành động</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $key => $property)
                            <tr id="property{{ $property->id }}">
                                <th scope="row">{{ ++$key }}</th>
                                <td>
                                    <img src="{{ asset('upload/property') }}/{{ $property->image }}" width="100" alt="{{ $property->name }}">
                                </td>
                                <td>{{ $property->name }}</td>
                                <td>{{ $property->type }}</td>
                                <td>{{ $property->purpose }}</td>
                                <td>{{ $property->view }}</td>
                                <td>
                                @if ($property->comment_property)
                                    {{ $property->comment_property->count() }}
                                @else
                                    0
                                @endif
                                
                                </td>
                                <td>
                                    <a href="{{ route('property.show',['property' => $property->id]) }}" class="text-primary">
                                        <i class="material-icons">remove_red_eye</i>
                                    </a> 
                                    <a href="{{ route('property.edit',['property' => $property->id]) }}" class="text-success">
                                        <i class="material-icons">mode_edit</i>
                                    </a> 
                                </td>
                                <td>
                                    <form id="delete-form" action="{{ route('property.destroy',['property' => $property->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link" type="submit"><span class="text-danger"><i class="material-icons">delete</i></span></button>
                                    </form>
                                </td>
                            </tr>                                                        
                            @endforeach
                        </tbody>
                    </table>
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Table -->
</div>
@endsection
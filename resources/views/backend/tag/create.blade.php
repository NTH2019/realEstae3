@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thêm chủ đề
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
                    <h2><strong>Thêm mới chủ đề</strong></h2>
                    <a href="{{ route('tag.index') }}" class="btn btn-primary float-right">Quay lại</a>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{ route('tag.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Tên chủ đề" name="name" required>
                            @error('name')
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
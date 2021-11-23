@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thông tin của bạn
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
                    <h2><strong>Thông tin của bạn</strong></h2>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <img src="{{ asset('upload/user') }}/{{ $user->profile_path }}" width="250" alt="{{ $user->name }}">
                            <input type="file" class="form-control" name="profile_path">
                            @error('profile_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" name="facebook" value="{{ $user->facebook }}">
                            @error('facebook')
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
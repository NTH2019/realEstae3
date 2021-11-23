@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Đổi mật khẩu
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
                    <h2><strong>Đổi mật khẩu</strong></h2>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{ route('admin.password.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Mật khẩu hiện tại" name="pwd">
                            @error('pwd')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Mật khẩu mới" name="new_pwd">
                            @error('new_pwd')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Xác nhận mật khẩu" name="confirm_pwd">
                            @error('confirm_pwd')
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
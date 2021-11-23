@extends('backend.layouts.app')

@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Thông tin
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
                    <h2><strong>Thông tin</strong></h2>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{ route('setting.store') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <textarea class="form-control" placeholder="Mô tả" name="description">@if($setting) {{ $setting->description }} @endif</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" value="@if($setting) {{ $setting->email }} @endif" placeholder="Email" name="email" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group form-float">
                            <input type="text" class="form-control" value="@if($setting) {{ $setting->phone }} @endif" name="phone" required>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group form-float">
                            <input type="text" class="form-control" value="@if($setting) {{ $setting->address }} @endif" placeholder="address" name="address" required>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group form-float">
                            <input type="text" class="form-control" value="@if($setting) {{ $setting->facebook }} @endif" name="facebook" required>
                            @error('facebook')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group form-float">
                            <input type="text" class="form-control" value="@if($setting) {{ $setting->twitter }} @endif" name="twitter" required>
                            @error('twitter')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group form-float">
                            <input type="text" class="form-control" value="@if($setting) {{ $setting->instagram }} @endif" name="instagram" required>
                            @error('instagram')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group form-float">
                            <input type="text" class="form-control" value="@if($setting) {{ $setting->pinterest }} @endif" name="pinterest" required>
                            @error('pinterest')
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
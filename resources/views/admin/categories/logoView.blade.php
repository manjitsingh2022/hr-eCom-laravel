@extends('admin.home')

@section('title')
Settings
@endsection

@section('style')
<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        border-bottom: 1px solid #ddd;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>
@endsection

@section('content')
@php
$settings = settings();
@endphp
<div class="card px-5">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            <h1 class="text-center">Logo</h1>
            <form action="{{ route('uploadLogoStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="setting_key">Logo</label>
                        <input type="text" name="setting_key" id="setting_key" class="form-control" value="{{ isset($settings['setting_key']) ? $settings['setting_key'] : 'logo' }}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="setting_value" class="form-control-file">
                        @error('setting_value')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center mb-4 d-grid">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
            </form>
            
            
            
            
        
        
        
    </div>
    </div>
</div>

@endsection

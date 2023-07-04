@extends('admin.home')
@section('title')
Setting Updated
@endsection
@section('style')
<style type="text/css">
    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    label {
        display: flex;
        align-items: center;
        width: 200px;
    }

    input[type="text"],
    input[type="number"],
    select {
        color: black;
    }
</style>
@endsection

@section('content')
<div class="card">


<div class="div_center">
    <h1 class="display-4">Update settings</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                
                    <div class="form-group">
                        <label for="setting_key">Setting Key</label>
                        <input type="text" name="setting_key" id="setting_key" class="form-control" value="{{ $setting->setting_key }}" required>
                    </div>
                
                    @if ($setting->setting_key == 'logo')
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="setting_value" id="logo" class="form-control-file" accept="*" required>
                            <small class="form-text text-muted">Upload a new logo image file if you want to update the logo.</small>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="setting_value">Setting Value</label>
                            <input type="text" name="setting_value" id="setting_value" class="form-control" value="{{ $setting->setting_value }}" required>
                        </div>
                    @endif
                
                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-primary">Update Setting</button>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
</div>
    
</div>
@endsection

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

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ session()->get('message') }}
</div>
@endif

@if (session()->has('errors'))
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="div_center">
    <h1 class="display-4">Update settings</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="setting_key">Setting Key</label>
                        <input type="text" name="setting_key" id="setting_key" class="form-control"
                            value="{{ $setting->setting_key }}">
                    </div>

                    <div class="form-group">
                        <label for="setting_value">Setting Value</label>
                        <input type="text" name="setting_value" id="setting_value" class="form-control"
                            value="{{ $setting->setting_value }}">
                    </div>
<div class="mb-4 text-center mt-4">

    <button type="submit" class="btn btn-primary">Update Setting</button>
</div>
                </form>
            </div>
        </div>
    </div>
</div>
    
</div>
@endsection

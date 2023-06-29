

@extends('admin.home')
@section('style')
<style type="text/css">

</style>
@endsection
@section('content')

@if (session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif


<h1>Settings </h1>


<form action="{{ route('settings.store') }}" method="POST">
  @csrf

 

  <div class="form-group">
    <label for="domain">Setting Key </label>
    <input type="text" name="setting_key" id="domain" class="form-control" required>
  </div>


  <div class="form-group">
    <label for="phone">Setting value</label>
    <input type="text" name="setting_value" id="phone" class="form-control" required>
  </div>

  

  <button type="submit" class="btn btn-primary">Save Settings</button>
</form>





@endsection







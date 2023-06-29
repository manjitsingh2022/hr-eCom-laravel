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
<div class="card px-5 ">

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


<div class="row justify-content-center">
  <div class="col-md-6 mt-4">
      <h1 >Settings</h1>
        <form action="{{ route('settings.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="setting_key">Setting Key</label>
                <input type="text" name="setting_key" id="setting_key" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="setting_value">Setting Value</label>
                <input type="text" name="setting_value" id="setting_value" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>


    <div class="col-md-12 py-4">
      <div class="mt-5 ">
        <h4>Settings List</h4>
      </div>
      <table>
        <thead>
            <tr>
                <th style="background-color: rgb(153, 152, 152);">Key</th>
                <th style="background-color:  rgb(153, 152, 152);">Value</th>
                <th style="background-color: rgb(153, 152, 152); ">Edit</th>
                <th style="background-color: rgb(153, 152, 152); ">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $setting)
            <tr>
                <td>{{ $setting->setting_key }}</td>
                <td>{{ $setting->setting_value }}</td>
                <td> 
                    <a class="nav-link"href="{{ route('settings.edit', $setting->id) }}">
                    <button type="button" class="btn btn-inverse-warning btn-rounded btn-fw btn-sm">Edit</button>
                    </a>
                </td>
                <td> 
                    <form action="{{ route('settings.destroy', $setting->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this setting?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-inverse-danger btn-rounded btn-fw btn-sm">Delete</button>
                    </form>
             </td>
                

                
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>


 
  
</div>
@endsection

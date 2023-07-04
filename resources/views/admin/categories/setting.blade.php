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



<div class="row justify-content-center">
  <div class="col-md-6 mt-4">
      <h1 class="text-center">Settings</h1>
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
          
<div class="text-center">
    <button type="submit" class="btn btn-primary">Save Settings</button>
</div>
      </form>
  </div>


  <div class="col-md-12 py-4">
      <div class="mt-4 text-center">
          <h4 >Settings List</h4>
      </div>
      <table>
          <thead>
              <tr>
                  <th style="background-color: rgb(153, 152, 152);">Key</th>
                  <th style="background-color: rgb(153, 152, 152);">Value</th>
                  <th style="background-color: rgb(153, 152, 152);">Edit</th>
                  <th style="background-color: rgb(153, 152, 152);">Delete</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($settings as $setting)
              <tr>
                  <td>{{ $setting->setting_key }}</td>
                  <td>{{ $setting->setting_value }}</td>
                  <td>
                      <a class="nav-link" href="{{ route('settings.edit', $setting->id) }}">
                          <button type="button" class="btn btn-inverse-warning btn-rounded btn-fw btn-sm">Edit</button>
                      </a>
                  </td>
                  <td>
                      <button type="button" class="btn btn-inverse-danger btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#myConfirmDlg{{ $setting->id }}">
                          Delete
                      </button>
                  </td>

              </tr>

              <div class="modal fade" id="myConfirmDlg{{ $setting->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title " id="exampleModalLongTitle">Confirmation - Delete Setting Item</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              Are you sure you want to delete this setting item?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <form action="{{ route('settings.destroy', $setting->id) }}" method="POST"
                                  >
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
</div>
@endsection

@extends('admin.home')

@section('style')
<style type="text/css">
  .processing-icon {
    display: inline-block;
    position: relative;
  }

  .processing-icon .mdi {
    font-size: 24px;
    color: #e90000;
    /* Adjust the color as needed */
  }


  .switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.switch input {
  display: none;
}

.slider {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: gray;
  border-radius: 20px;
  transition: 0.4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  border-radius: 50%;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: green;
}

input:checked + .slider:before {
  transform: translateX(20px);
}

</style>
@endsection
@section('content')
<div class="card">
  @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
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

  <div class="stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-center">Category Details</h4>
        
        <div class="table-responsive">
          <table class="table table-bordered table-contextual">
            <thead>
              <tr>
                <th>ID</th>
                <th>Parent Category Name</th>
                <th>Category Name</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
             
              <tr>
                  <td>{{ $category->id }}</td>
                  <td>
                      @if ($category->parent_id)
                          {{ $category->parent->category_name }}
                      @endif
                  </td>
                  <td>{{ $category->category_name }}</td>
                  <td>
                      <label class="switch">
                          <input type="checkbox" data-category-id="{{ $category->id }}" data-route="{{ route('admin.category.updateStatus', $category->id) }}" {{ $category->status == 1 ? 'checked' : '' }}>
                          <span class="slider"></span>
                      </label>
                  </td>
              </tr>
              @if ($category->subcategories->count() > 0)
                  @foreach ($category->subcategories as $subcategory)
                      <tr>
                          <td>{{ $subcategory->id }}</td>
                          <td>
                              {{ $category->category_name }}
                          </td>
                          <td>{{ $subcategory->category_name }}</td>
                          <td>
                              <label class="switch">
                                  <input type="checkbox" data-category-id="{{ $subcategory->id }}" data-route="{{ route('admin.category.updateStatus', $subcategory->id) }}" {{ $subcategory->status == 1 ? 'checked' : '' }}>
                                  <span class="slider"></span>
                              </label>
                          </td>
                      </tr>
                  @endforeach
              @endif
          @endforeach
          
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('input[type="checkbox"]').on('change', function() {
      var categoryId = $(this).data('category-id');
      var route = $(this).data('route');
      var status = $(this).is(':checked') ? 1 : 0;

      $.ajax({
        url: route,
        dataType: 'json',
        type: 'PUT',
        data: {
          status: status,
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          console.log(response);
          location.reload(); 
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log(xhr.responseText);
        }
      });
    });
  });
</script>

